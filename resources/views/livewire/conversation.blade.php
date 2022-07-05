<div>
    <div class="max-w-1/2 w-1/2 mx-auto">
        <h1 class="text-3xl text-green-500 mb-5">
            Mission : {{ $conversation->job->title }}
        </h1>

        @forelse ($conversation->messages as $message)
            <div class="rounded-lg px-3 py-2 mb-2 font-medium {{ $message->user->id === auth()->user()->id ? 'bg-green-500 text-gray-700 ml-auto max-w-1/2 w-1/2' : 'bg-gray-300 text-gray-700 mr-auto max-w-1/2 w-1/2' }}">
                <p class="font-light">
                    {{ $message->user->id === auth()->user()->id ? 'Vous avez dit' : $message->user->name .' a dit' }}
                </p>
                <p>
                    {{ $message->body }}
                </p>
            </div>
        @empty
            <div class="">
                Aucune conversation pour le moment.
            </div>
        @endforelse
        <textarea name="body" wire:keydown.enter.prevent="sendMessage" wire:model="message" class="border rounded px-3 py-2 mt-3 mb-5 shadow-md w-full"></textarea>

    </div>

</div>
