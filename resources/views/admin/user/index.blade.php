<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Users') }}
    </h2>
  </x-slot>

  <x-content-wrapper>
    <x-link-button :href="route('admin.user.create')">
      {{ __('Create User') }}
    </x-link-button>
    <x-section-body>
      @foreach ($users as $user)
        <x-section-link-button href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
        <div>
          {{ $user->name }}
        </div>
        <div>
          {{ $user->email }}
        </div>
        <div>
          @foreach ($user->getRoles() as $role)
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-700">
              {{ $role }}
            </span>
          @endforeach
        </div>
        </x-section-link-button>
      @endforeach
    </x-section-body>
  </x-content-wrapper>
</x-app-layout>
