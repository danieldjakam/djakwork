<div x-data="{open: false}" @flash-message.window="open = true">
    <div x-show="open" x-cloak class="border-2 {{ $type ? $colors[$type] : '' }}px-1 py-2 px-3 rounded my-2" >
        {{ $message }}
    </div>
</div>
