<x-app-layout>
  <x-slot name="header">
    <div class="flex gap-4">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __($user->name) }}
      </h2>
      <a href="{{ route('admin.organization.edit', ['organization' => $organization->id]) }}" class="w-fit bg-gray-200 rounded-lg px-2 py-0 shadow hover:bg-white cursor-pointer select-none">
        Back
      </a>
    </div> 
  </x-slot>
  <x-content-wrapper>
    <x-form type='orgUser' :edit=true :model=$user action="{{ route('admin.organization.user.update', ['organization' => $organization->id, 'user' => $user->id]) }}" />
    @can('manageRoles')
    @endcan
    @can('deleteUsers')
      <div class=" my-4 w-fit">
        <form method="POST" action="{{ route('admin.user.destroy', ['user' => $user->id]) }}">
          @csrf
          @method('DELETE')
          <x-submit-button :delete=true>
            {{ __('Delete User') }}
          </x-submit-button>
        </form>
      </div>
    @endcan
  </x-content-wrapper>
</x-app-layout>
