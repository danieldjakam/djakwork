@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-green-500 mb-5">{{ trans_choice(__('conversation.your conversation'), $conversations) }}</h1>
    @forelse ($conversations as $conversation)
        <a href="{{ route('conversations.show', $conversation) }}" class="focus:outline-none">
            <div class="flex items-center justify-between px-3 py-10 mb-3 shadow-md rounded border-2 hover:border-green-300 cursor-pointer">
                <p class="font-semibold">
                    {{ Illuminate\Support\Str::limit($conversation->messages->last()->body, 150) }}
                </p>
                <p class="font-thin text-gray-500">
                    {{ __('conversation.sent by') }} <strong>{{ auth()->user()->id === $conversation->messages->last()->user ->id ? __('conversation.you') : $conversation->messages->last()->user->name }}</strong> {{ __('conversation.they are') }}
                    {{ $conversation->messages->last()->created_at->diffForHumans() }}
                </p>
            </div>
        </a>
    @empty
        <div class="empty">
            {{ __('conversation.no conversation') }}
        </div>
    @endforelse

@endsection
