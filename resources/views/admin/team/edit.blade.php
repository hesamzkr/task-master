<x-app-layout>
  <x-dashboard.form action="{{ route('admin.teams.update', $team) }}" method="PUT">
    <div class="mb-5">
      <label for="name" class="block mb-2 font-medium text-gray-900">Team name</label>
      <input name="name" id="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        value="{{ $team->name }}" required>
    </div>

    <label class="block mb-4">Team Members:</label>
    @foreach ($users as $user)
      <x-checkbox checked="{{ $team->users->contains($user) }}" name="team_members[]" label="{{ $user->name }}"
        value="{{ $user->id }}" />
    @endforeach

  </x-dashboard.form>

</x-app-layout>
