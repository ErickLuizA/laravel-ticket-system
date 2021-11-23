<nav class="w-full bg-secondaryVariant p-4">
  <div class="w-full max-w-5xl mx-auto flex justify-between items-center relative">
    <a href="/">
      <img src="{{ asset('assets/icons/logo.svg') }}" alt="app logo"/>
    </a>

    <ul id="navbar_ul" class="flex items-center">
      <li class="hidden sm:block sm:mr-4">
        <a href="/open-ticket" class="hover:underline">Open a ticket</a>
      </li>
      @auth
        <li>
          <button id="user_avatar_button">
            <x-heroicon-o-user class="h-8 w-8"/>
          </button>
        </li>
        <div id="user_avatar_popup"
             class="absolute top-12 right-0 px-4 py-2 rounded-lg hidden transition-opacity bg-surface text-onSurface z-10">
          <ul>
            <li class="my-2 cursor-pointer hover:text-primary sm:hidden"><a href="/open-ticket">Open a ticket</a></li>
            <li class="my-2 cursor-pointer hover:text-primary"><a href="/dashboard">Tickets</a></li>
            <li class="my-2 cursor-pointer hover:text-primary"><a href="/profile">Profile</a></li>
            <li class="my-2 cursor-pointer hover:text-primary">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Sign out</button>
              </form>
            </li>
          </ul>
        </div>
      @endauth
      @guest
        <li>
          <a href="/login" class="hover:underline">Sign in</a>
        </li>
      @endguest
    </ul>
  </div>
</nav>
