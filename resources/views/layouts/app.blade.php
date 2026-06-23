{{-- Passthrough to component --}}
<x-app-layout>
    <x-slot name="title">{{ $title ?? 'FruitIQ – Fruit Inventory System' }}</x-slot>
    {{ $slot }}
    @stack('scripts')
</x-app-layout>
