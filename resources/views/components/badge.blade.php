@props(['status'])

@php
    $colors = [
        'pending' => 'warning',
        'approved' => 'success',
        'rejected' => 'danger',
    ];
@endphp

<x-filament::badge color="{{ $colors[$status] ?? 'gray' }}">
    {{ ucfirst($status) }}
</x-filament::badge>
