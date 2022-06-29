<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
  </x-slot>
  <x-content-wrapper>
    <x-form type="orgUser" action="{{ route('admin.organization.user.store', ['organization' => $organization->id]) }}" />
  </x-content-wrapper>
</x-app-layout>