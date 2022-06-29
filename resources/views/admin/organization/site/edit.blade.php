<x-app-layout>
  <x-slot name="header">
    <div class="flex gap-4">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __($site->name) }}
      </h2>
      <a href="{{ route('admin.organization.edit', ['organization' => $organization->id]) }}" class="w-fit bg-gray-200 rounded-lg px-2 py-0 shadow hover:bg-white cursor-pointer select-none">
        Back
      </a>
    </div> 
  </x-slot>
  <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class=" w-64">
      <x-form type='orgSite' :edit=true :model=$site action="{{ route('admin.organization.site.update', ['organization' => $organization->id, 'site' => $site->id]) }}" />
      @can('manageRoles')
      @endcan
    </div>
    @can('deleteSites')
      <div class=" my-4 w-fit">
        <form method="POST" action="{{ route('admin.site.destroy', ['site' => $site->id]) }}">
          @csrf
          @method('DELETE')
          <x-submit-button :delete=true>
            {{ __('Delete Site') }}
          </x-submit-button>
        </form>
      </div>
    @endcan
  </div>
</x-app-layout>
