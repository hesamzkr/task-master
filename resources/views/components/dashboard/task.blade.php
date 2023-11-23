<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
    {{ $task->name }}
  </th>
  <td class="px-6 py-4 relative">
    <x-dashboard.modal :task="$task" />
  </td>
  <td
    class="px-6 py-4 uppercase 
    @if ($task->status == 'completed') bg-green-400 text-black
    @elseif($task->status == 'in progress') bg-blue-400 text-black @endif">
    {{ $task->status }}
  </td>
  <td class="px-6 py-4">
    {{ $task->formattedDeadline() ?? 'None' }}
  </td>
  <td class="px-6 py-4 text-right">
    <a href="{{ route('task.edit', $task) }}"
      class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
  </td>
  <td class="px-6 py-4 text-right">
    <form action="{{ route('task.destroy', $task) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="font-medium text-blue-600 dark:text-red-500 hover:underline">Delete</a>
    </form>
  </td>
</tr>
