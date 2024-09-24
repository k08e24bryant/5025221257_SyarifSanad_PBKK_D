@props(['active' => false])


<a {{ $attributes->merge(['class' => request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium']) }} href="/" aria-current="{{ request()->is('/') ? 'page' : 'false' }}">
    {{ $slot }}
</a>
