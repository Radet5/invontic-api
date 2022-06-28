<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $organization->name }}
    </h2>
  </x-slot>

  <div class="max-w-7xl flex flex-col gap-4 mx-auto py-6 sm:px-6 lg:px-8">
    <x-section>
      <x-slot name="header">
        Users
      </x-slot>
      @foreach($organization->users as $user)
        <x-section-link-button href="{{ route('admin.organization.user.edit', ['organization' => $organization->id, 'user' => $user->id]) }}">
          {{ $user->name }}
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
    </x-section>
  </div>
</x-app-layout>
