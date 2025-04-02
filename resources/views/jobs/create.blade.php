<x-layout>
  {{-- custom browser tab title --}}
  <x-slot name="title"> Create Job </x-slot>
  {{-- page title --}}
  <h1>Create Job</h1>
  <form action="/jobs" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title" />
    <input type="text" name="description" placeholder="Description" />
    <button type="submit">Submit</button>
  </form>
</x-layout>
