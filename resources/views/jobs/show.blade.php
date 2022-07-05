@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-green-500 mb-5">{{ $job->title }}</h1>
    <p class="px-3 py-5 mb-3 shadow-sm hover:shadow-md duration-200 rounded border border-gray-200">
        {{ $job->description }} <br>
        <span class="text-sm text-gray-600 font-semibold">
        {{ number_format($job->price / 100, 2, ',', ' ') }} €
        </span>
    </p>
    <section x-data="{open: false}">
        <span style="cursor: pointer" @click="open = !open" class="text-green-500 hover:text-green-700 transition ease-in-out mt-3">{{ __('job.submit your candidacy') }}</span>
        <form x-show="open" method="POST" action="{{ route('proposals.store', $job) }}" x-cloak>
            @csrf
            <textarea class="p-3 font-thin w-full max-w-md rounded mt-5 border-2" name="body" rows="10" placeholder="{{ __('job.enter your motivation') }}"></textarea>
            <button type="submit" class="block bg-green-500 text-white hover:bg-green-700 transition ease-in-out duration-500 rounded-md shadow-md px-4 py-2 mt-2">{{ __('job.submit your motivation') }}</button>
        </form>

    </section>
@endsection
