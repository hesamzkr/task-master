<div class="max-w-sm p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
  <span>
    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $quote }}</h5>
  </span>
  <p class="mb-3 font-bold text-gray-700 dark:text-gray-400 pl-3">- {{ $author }}</p>
  <div class="flex items-center justify-start">
    <select wire:model="category" id="countries"
      class="inline bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      @foreach ($categories as $cat)
        <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
      @endforeach
    </select>

    <button wire:click="loadQuote"
      class="inline-flex items-center ml-1 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M17.7 7.7A7.1 7.1 0 0 0 5 10.8M18 4v4h-4m-7.7 8.3A7.1 7.1 0 0 0 19 13.2M6 20v-4h4" />
      </svg>
    </button>
  </div>
</div>
