<x-app-layout>

  <x-slot name="pageTitle">
    Météœil | Dashboard administrateur
  </x-slot>

  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-xl font-semibold leading-tight text-gray-800">
      Dashboard administrateur
    </h1>
  </div>

  <div class="mx-auto max-w-7xl sm:px-6 lg:p-8">
    <div class="-m-1.5 overflow-auto">
      <div class="inline-block min-w-full p-1.5 align-middle">
        <div class="overflow-hidden">
          <div
            class="table w-full table-auto border-collapse divide-y divide-gray-200 dark:divide-gray-700">
            <div class="table-header-group">
              <div class="table-row">
                <div
                  class="table-cell px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">
                  Nom d'utilisateur</div>
                <div
                  class="table-cell px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">
                  Identifiant</div>
                <div
                  class="table-cell px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">
                  Nb. obs.</div>
                <div
                  class="table-cell px-6 py-3 text-left text-xs font-medium uppercase text-gray-500">
                  Nb. comm.</div>
                <div
                  class="table-cell px-6 py-3 text-right text-xs font-medium uppercase text-gray-500">
                  Action</div>
              </div>
            </div>
            @foreach ($users as $user)
              <div
                class="table-row-group divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-slate-800">
                <div class="table-row">
                  <div
                    class="table-cell whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-800 dark:text-gray-200">
                    {{ $user->name }}</div>
                  <div
                    class="table-cell whitespace-nowrap px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                    {{ $user->id }}</div>
                  <div
                    class="table-cell whitespace-nowrap px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                    {{ $user->observations_count }} obs.</div>
                  <div
                    class="table-cell whitespace-nowrap px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                    {{ $user->comments_count }} comm.</div>
                  <div
                    class="table-cell whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                    <form action="{{ route('admin.users.destroy', $user) }}"
                      method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="text-blue-500 hover:text-blue-700"
                        href="{{ route('admin.users.destroy', $user) }}">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
