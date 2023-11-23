<x-app-layout>
  <x-dashboard.form action="{{ route('admin.teams.store') }}" method="POST">
    <x-crud-input value={{ $team->name }} name="name" placeholder="" label="Team name" />

    <div class="mb-4">Team Members:</div>

    @foreach ($users as $user)
      <x-checkbox checked="{{ $team->users->contains($user) }}" name="team_members[]" label="{{ $user->name }}"
        value="{{ $user->id }}" />
    @endforeach
  </x-dashboard.form>

</x-app-layout>
