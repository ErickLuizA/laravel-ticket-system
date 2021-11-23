<div class="w-full my-4 relative flex flex-col">
  <label
    class="{{ $label ? 'text-2xl mb-2' : 'sr-only'}}"
    for="{{ $name }}">{{ $label ?: $name}}</label>
  {{ $slot }}
  <input
    {{ $attributes }}
    id="{{ $name }}"
    name="{{$name}}"
    class="input-field {{ !$label ? 'pl-12' : '' }}  {{ $error ? 'error' : '' }}">
  <p class="text-left mt-1 text-danger">{{ $error }}</p>
</div>
