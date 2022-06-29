<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
  </x-slot>
  <x-content-wrapper>
    <x-form type="user" action="{{ route('admin.user.store') }}" />
  </x-content-wrapper>
</x-app-layout>