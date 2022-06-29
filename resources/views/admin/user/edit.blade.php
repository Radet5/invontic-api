<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __($user->name) }}
    </h2>
  </x-slot>
  <x-content-wrapper>
    <x-form type='user' :edit=true :model=$user action="{{ route('admin.user.update', ['user' => $user->id]) }}" />
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
