<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Organizations') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex flex-wrap">
            @foreach($organizations as $organization)
                <a href="{{ route('admin.organization.edit', ['organization' => $organization->id]) }}">
                    <div class="w-fit bg-white rounded-lg px-2 py-0 shadow hover:bg-gray-200 cursor-pointer select-none">
                        {{ $organization->name }}
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>