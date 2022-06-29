<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $organization->name }}
    </h2>
  </x-slot>

  <x-content-wrapper>
    <x-section>
      <x-slot name="header">
        Users
      </x-slot>
      @foreach($organization->users as $user)
        <x-section-link-button href="{{ route('admin.organization.user.edit', ['organization' => $organization->id, 'user' => $user->id]) }}">
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
      <x-section-link-button href="{{ route('admin.organization.user.create', ['organization' => $organization->id]) }}">
        +
      </x-section-link-button>
    </x-section>
    <x-section>
      <x-slot name="header">
        Sites
      </x-slot>
      @foreach($organization->sites as $site)
        <x-section-link-button href="{{ route('admin.organization.site.edit', ['organization' => $organization->id, 'site' => $site->id]) }}">
          {{ $site->name }}
        </x-section-link-button>
      @endforeach
      <x-section-link-button href="{{ route('admin.organization.site.create', ['organization' => $organization->id]) }}">
        +
      </x-section-link-button>
    </x-section>
  </x-content-wrapper>
</x-app-layout>
