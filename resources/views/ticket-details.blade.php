@extends('layouts.withNavbar')

@section('main')
  @if(!$data)
    <h1>This ticket does not exists.</h1>
  @else
    <div class="flex items-center justify-between my-4">
      <div class="flex items-center">
        <img class="rounded-full h-16 w-16 mr-4" src="{{$data -> user -> avatar }}" alt="{{ $data -> user -> name }}"/>
        <p class="text-lg">{{ $data -> user -> name }}</p>
      </div>

      <p class="text-primary">Created on {{ $data -> created_at -> toFormattedDateString() }} </p>
    </div>

    <h1 class="text-2xl font-bold mb-8">{{ $data -> subject }}</h1>

    <p>{{ $data -> description }}</p>

    <div class="mt-8 mb-2">
      <button id="reply_action_button" class="action-btn py-2">Reply</button>

      <button class="text-primary hover:underline mx-8">I have the same question ()</button>
    </div>

    <form id="reply_form" class="my-8 hidden" method="POST" action="{{ route('reply.store', ['id' => $data -> id]) }}">
      @csrf

      <textarea
        id="reply"
        name="reply"
        placeholder="Insert your reply"
        rows="10"
        required
        value="{{old('reply')}}"
        class="input-field resize-none  {{ $errors -> has('reply') ? 'error' : '' }}"></textarea>

      <div class="flex mt-4">
        <button id="reply_cancel_action_button" type="button" class="action-btn text-lg py-2 bg-secondary hover:bg-surface mr-4">Cancel</button>

        <button type="submit" class="action-btn text-lg py-2">Submit</button>
      </div>
    </form>

    <button id="replies_button" class="flex items-center">
      <p class="text-2xl font-bold my-8">Replies({{ sizeof($data -> replies)  }})</p>

      <x-heroicon-o-chevron-down id="down_icon" class="h-8 w-8 ml-4"/>
      <x-heroicon-o-chevron-up id="up_icon" class="h-8 w-8 ml-4 hidden"/>
    </button>

    <div id="reply_list_container">
      @foreach($data -> replies as $reply)
        <div class="bg-surface text-onSurface p-4 rounded-md my-4 hover:bg-opacity-50">
          <div class="flex items-center justify-between mt-4 mb-12">
            <div class="flex items-center">
              <img class="rounded-full h-16 w-16 mr-4" src="{{$reply -> user -> avatar }}"
                   alt="{{ $reply -> user -> name }}"/>
              <p class="text-lg">{{ $reply -> user -> name }}</p>
            </div>

            <p class="text-primary">Replied on {{ $reply -> created_at -> toFormattedDateString() }} </p>
          </div>

          <p class="text-xl">{{ $reply -> reply }}</p>
        </div>

      @endforeach
    </div>
  @endif
@endsection

@section('script')
  <script src="{{ asset('js/details.js') }}"></script>
@endsection
