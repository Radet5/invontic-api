<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Organization') }}
        </h2>
  </x-slot>
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <x-form type="organization" action="{{ route('admin.organization.store') }}" />
  </div>
</x-app-layout>