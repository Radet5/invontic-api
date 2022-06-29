<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Organizations') }}
    </h2>
  </x-slot>
  <x-content-wrapper>
    <x-link-button href="{{ route('admin.organization.create') }}">
      {{ __('Create Organization') }}
    </x-link-button>
    <x-section-body>
      @foreach($organizations as $organization)
        <x-section-link-button href="{{ route('admin.organization.edit', ['organization' => $organization->id]) }}">
            {{ $organization->name }}
        </x-section-link-button>
      @endforeach
    </x-section>
  </x-content-wrapper>
</x-app-layout>