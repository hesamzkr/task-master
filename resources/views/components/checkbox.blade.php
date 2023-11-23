<div class="flex items-center mb-4">
  <input {{ $checked ? 'checked' : '' }} name="{{ $name }}" id="{{ $name }}" type="checkbox"
    value="{{ $value }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
  <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900">{{ $label }}</label>
</div>
