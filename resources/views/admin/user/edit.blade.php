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
    @can('createAccessTokens')
    <x-section>
      <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Access Tokens') }}
        </h3>
      </x-slot>
      @foreach ($user->tokens as $token)
        <div class="mt-4">
          <div class="flex items-center">
            <div class="w-1/2">
              <div class="text-sm text-gray-600">
                {{ $token->name }}
              </div>
            </div>
            <div class="w-1/2 text-right">
              <div class="text-sm text-gray-600">
                {{ $token->created_at->format('Y-m-d H:i:s') }}
              </div>
            </div>
          </div>
          <div class="mt-2">
            <div class="text-sm text-gray-600">
              {{ $token->token }}
            </div>
          </div>
        </div>
      @endforeach
      <form method="POST" action="{{ route('admin.user.token.create', ['user' => $user->id]) }}">
        @csrf
        <x-submit-button>
          {{ __('Create token') }}
        </x-submit-button>
      </form>
    </x-section>
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
