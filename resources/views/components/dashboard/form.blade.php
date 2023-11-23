<form action={{ $action }} method="POST" class="max-w-sm mx-auto">
  @csrf
  @method($method)
  {{ $slot }}
  <x-crud-submit />
</form>
