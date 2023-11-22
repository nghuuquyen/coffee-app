@extends('components.base-layout')

@section('content')
    <x-logo :has-setting="true" />
    
    @if (isset($navigation))
        {{ $navigation }}
    @endif
    
    @if (isset($slot))
        <main class="max-w-screen-xl m-auto grid grid-cols-1 gap-10 mt-6 lg:p-10 p-4">
            {{ $slot }}
        </main>
    @endif
@endsection

@if (isset($components))
    @section('components')
        {{ $components }}
    @endsection
@endif