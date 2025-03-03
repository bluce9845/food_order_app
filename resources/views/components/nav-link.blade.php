@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp


@if (Auth::user()->role === 'admin')
    <a href="{{ route('admin-dashboard') }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
    <a href="{{ route('food-dashboard') }}" {{ $attributes->merge(['class' => $classes]) }}>
        Food
    </a>
@elseif (Auth::user()->role === 'manager')

@elseif (Auth::user()->role === 'chef')

@else
    <a href="{{ route('dashboard') }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@endif
