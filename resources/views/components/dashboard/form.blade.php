<form action={{ $action }} method={{ $method }} class="max-w-sm mx-auto">
  @csrf
  {{ $slot }}

  <x-crud-submit />
</form>
