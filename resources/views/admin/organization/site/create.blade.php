<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Site') }}
        </h2>
  </x-slot>
  <x-content-wrapper>
    <x-form type="orgSite" action="{{ route('admin.organization.site.store', ['organization' => $organization->id]) }}" />
  </x-content-wrapper>
</x-app-layout>