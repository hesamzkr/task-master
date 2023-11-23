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
              <form action="{{ route('admin.teams.destroy', $team) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="font-medium text-blue-600 dark:text-red-500 hover:underline">Delete</a>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="flex flex-col items-center justify-center mt-5">
    <a href="{{ route('admin.teams.create') }}"
      class="text-white cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
      Team</a>
  </div>
</x-app-layout>
