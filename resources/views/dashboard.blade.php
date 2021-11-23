@extends('layouts.withNavbar')

@section('main')
  <div>
    <div class="flex justify-between items-center">
      <h1 class="text-4xl">My Tickets</h1>
      <div class="relative">
        <x-heroicon-o-search class="input-icon h-6 w-6"/>
        <input class="p-4 pl-10 rounded-lg bg-surface text-onSurface" type="search" placeholder="Search for a ticket"/>
      </div>
    </div>

    <table class="w-full mt-8">
      <thead class="bg-secondaryVariant">
      <tr>
        <th class="p-4 rounded-tl-lg">ID</th>
        <th>SUBJECT</th>
        <th>STATUS</th>
        <th class="rounded-tr-lg">LAST UPDATED</th>
      </tr>
      </thead>
      <tbody class="bg-surface text-onSurface">
      <tr class="text-center cursor-pointer hover:bg-secondary">
        <td class="py-4">
          <a class="block" href="/login">#01</a>
        </td>
        <td tabindex="-1" class="py-4">
          <a class="block" href="/login">#01</a>
        </td>
        <td tabindex="-1" class="py-4">
          <a class="block" href="/login">#01</a>
        </td>
        <td tabindex="-1" class="py-4">
          <a class="block" href="/login">#01</a>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
@endsection
