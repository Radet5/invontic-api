<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
              <x-link-button :href="route('admin.user.create')">
                  {{ __('Create User') }}
              </x-link-button>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-wrap p-6 bg-white border-b border-gray-200">
                    @foreach ($users as $user)
                        <div class="items-center w-fit px-4 py-2">
                            <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}" class="ml-4 flex flex-col">
                                <div class="text-sm leading-5 font-medium text-gray-900">
                                    {{ $user->name }}
                                </div>
                                <div class="text-sm leading-5 text-gray-500">
                                    {{ $user->email }}
                                </div>
                                <div>
                                  @foreach ($user->getRoles() as $role)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-700">
                                      {{ $role }}
                                    </span>
                                  @endforeach
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
