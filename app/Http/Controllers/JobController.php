<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::online()->latest()->get();

        return view('jobs.index', compact('jobs'));
    }

    public function show($id)
    {
        $job = Job::find($id);
        return view('jobs.show', compact('job'));
    }
}
