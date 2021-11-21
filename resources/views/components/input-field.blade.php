<div class="w-full my-4 relative">
  <label
    class="sr-only"
    for="{{ $name }}">{{$name}}</label>
  {{ $slot }}
  <input
    id="{{ $name }}"
    name="{{$name}}"
    class="bg-surface pr-4 pl-12 py-4 border-2 border-surface rounded-md w-full  {{ $error ? 'border-danger focus:outline-none focus:ring-danger' : '' }}"
    type="{{ $type }}"
    placeholder="{{ $placeholder }}"
    value="{{$value}}"
    {{ $required ? 'required' : '' }}>
  <p class="text-left mt-1 text-danger">{{ $error }}</p>
</div>
