<x-app-layout>
  <x-dashboard.form method="PUT" action="{{ route('task.update', $task) }}">

    <div class="mb-5">
      <label for="task" class="block mb-2 text-sm font-medium text-gray-900">Task</label>
      <input value="{{ $task->name }}" name="task" id="task"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        placeholder="Implement a tool to ..." required>
    </div>

    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
    <select name="status" id="status"
      class="bg-gray-50 border uppercase border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-4">
      @foreach ($options as $option)
        <option {{ $option['value'] == $task->status ? 'selected' : '' }} value="{{ $option['value'] }}">
          {{ $option['label'] }}
        </option>
      @endforeach
    </select>

    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Deadline</label>
    <x-dashboard.date-picker name="deadline" value="{{ $task->deadline }}" />



    <label class="block mb-2 text-m font-medium text-gray-900">Assign to
      teams:</label>
    @foreach ($assignable_teams as $assignable)
      <x-checkbox checked="{{ $task->teams->contains($assignable) }}" name="assigned_teams[]"
        label="{{ $assignable->name }}" value="{{ $assignable->id }}" />
    @endforeach

    <label class="block mb-2 text-m font-medium text-gray-900">Assign to members:</label>
    @foreach ($assignable_users as $assignable)
      <x-checkbox checked="{{ $task->users->contains($assignable) }}" name="assigned_users[]"
        label="{{ $assignable->name }}" value="{{ $assignable->id }}" />
    @endforeach


  </x-dashboard.form>
</x-app-layout>
