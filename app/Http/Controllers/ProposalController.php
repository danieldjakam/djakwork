<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\CoverLetter;
use App\Models\Job;
use App\Models\Message;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{

    public function store(Request $request, Job $job)
    {
        $proposal = Proposal::create([
            'job_id' => $job->id,
            'validated' => false
        ]);

        $coverLetter = CoverLetter::create([
            'proposal_id' => $proposal->id,
            'body' => $request->body
        ]);
        return redirect()->route('jobs.index');
    }


    public function accept(Request $request)
    {
        $proposal = Proposal::findOrFail($request->proposal);
        $proposal->fill(['validated' => true]);

        if ($proposal->isDirty()) {
            $proposal->save();

            $conversation = Conversation::create([
                'sender' => auth()->user()->id,
                'receiver' => $proposal->user->id,
                'job_id' => $proposal->job_id
            ]);

            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'body' => __('conversation.hi') . $proposal->user->name . __("conversation.acceptation") . $proposal->job->title . " \"."
            ]);
        }

        return redirect()->route('jobs.index');
    }
}
