<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Leads') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm mb-3">
        {{-- <div class="card-header">
            {{ __('Leads') }}
        </div> --}}
        <div class="card-body">
            @livewire('obcrm::lead-table')
        </div>
    </div>

</x-app-layout>
