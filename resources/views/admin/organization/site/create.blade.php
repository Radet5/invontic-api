<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Site') }}
        </h2>
  </x-slot>
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <x-form type="orgSite" action="{{ route('admin.organization.site.store', ['organization' => $organization->id]) }}" />
  </div>
</x-app-layout>