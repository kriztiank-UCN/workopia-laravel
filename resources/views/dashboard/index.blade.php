<x-layout>
  <section class="flex flex-col gap-6 md:flex-row">
    {{-- Profile Info Form --}}
    <div class="w-full rounded-lg bg-white p-8 shadow-md md:w-1/2">
      <h3 class="mb-4 text-center text-3xl font-bold">Profile Info</h3>
      {{-- Avatar Preview --}}
      @if ($user->avatar)
        <div class="mt-2 flex justify-center">
          <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="h-32 w-32 rounded-full object-cover" />
        </div>
      @endif
      <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- component fields --}}
        <x-inputs.text id="name" name="name" label="Name" value="{{ $user->name }}" />
        <x-inputs.text id="email" name="email" label="Email address" type="email" value="{{ $user->email }}" />
        <x-inputs.file id="avatar" name="avatar" label="Upload Avatar" />
        <button type="submit"
          class="my-3 w-full rounded bg-green-500 px-4 py-2 text-white hover:bg-green-600 focus:outline-none">Save</button>
      </form>
    </div>

    {{-- Job Listings --}}
    <div class="w-full rounded-lg bg-white p-8 shadow-md">
      <h3 class="mb-4 text-center text-3xl font-bold">My Job Listings</h3>
      @forelse ($jobs as $job)
        <div class="flex items-center justify-between border-b-2 border-gray-200 py-2">
          <div>
            <h3 class="text-xl font-semibold">{{ $job->title }}</h3>
            <p class="text-gray-700">{{ $job->job_type }}</p>
          </div>
          <div class="flex space-x-4">
            <a href="{{ route('jobs.edit', $job->id) }}"
              class="rounded bg-blue-500 px-4 py-2 text-sm text-white hover:bg-blue-600">Edit</a>
            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}?from=dashboard"
              onsubmit="return confirm('Are you sure you want to delete this job?');">
              @csrf @method('DELETE')
              <button type="submit" class="rounded bg-red-500 px-4 py-2 text-sm text-white hover:bg-red-600">
                Delete
              </button>
            </form>
          </div>
        </div>
      @empty
        <p class="text-gray-700">You have no job listings.</p>
      @endforelse
    </div>
  </section>
  <x-bottom-banner />
</x-layout>
