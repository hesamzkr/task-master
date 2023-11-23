<x-app-layout>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Team
          </th>
          <th scope="col" class="px-6 py-3">
            People
          </th>
          <th scope="col" class="px-6 py-3">
            <span class="sr-only">Edit</span>
          </th>
          <th scope="col" class="px-6 py-3">
            <span class="sr-only">Delete</span>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($teams as $team)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ $team->name }}
            </th>
            <td class="px-6 py-4">
              {{ $team->users->count() }}
            </td>
            <td class="px-6 py-4 text-right">
              <a href="{{ route('admin.teams.edit', $team) }}"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            </td>
            <td class="px-6 py-4 text-right">
              <a href="" class="font-medium text-blue-600 dark:text-red-500 hover:underline">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-app-layout>
