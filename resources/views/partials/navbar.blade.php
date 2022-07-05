<header class="flex justify-between inline-block items-center py-5" style="border-bottom: 1px #000 solid; margin-bottom: 20px; padding-bottom: 10px;">
    <a href="{{ auth()->check() ? route('home') : route('welcome') }}" class="text-green-700 font-bold">
        DJAKWORK
    </a>
    <nav>
        <a href="{{ route('jobs.index') }}" class="mr-5 hover:text-green-400 ">{{ __('navigation.our_missions') }}</a>
        @auth
            <livewire:search />
            {{-- <a href="{{ route('jobs.index') }}" class="mr-5 hover:text-green-400">Les missions</a> --}}
            <a href="{{ route('conversations.index') }}" class="mr-5 hover:text-green-400">{{ __('navigation.conversations') }}</a>
            <a href="{{ route('home') }}" class="mr-5 hover:text-green-400">{{ __('navigation.account') }}</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mr-5 hover:text-green-400 ">{{ __('navigation.logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="mr-5 hover:text-green-400">{{ __('navigation.login') }}</a>
            <a href="{{ route('register') }}" class="mr-5 hover:text-green-400">{{ __('navigation.register') }}</a>
        @endauth
    </nav>
</header>
