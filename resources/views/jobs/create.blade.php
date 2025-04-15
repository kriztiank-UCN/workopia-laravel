<x-layout>
  {{-- custom browser tab title --}}
  <x-slot name="title">Create Job</x-slot>
  <div class="mx-auto w-full rounded-lg bg-white p-8 shadow-md md:max-w-3xl">
    {{-- page title --}}
    <h2 class="mb-4 text-center text-4xl font-bold">
      Create Job Listing
    </h2>

    <!-- Form Start -->
    <form method="POST" action="/jobs" enctype="multipart/form-data">
      {{-- Cross-site request forgery token --}}
      @csrf
      <h2 class="mb-6 text-center text-2xl font-bold text-gray-500">
        Job Info
      </h2>

      <!-- Job Title - Text Input Component with dynamic props -->
      <x-inputs.text id="title" name="title" label="Job Title" type="text" placeholder="Software Engineer" />

      <!-- Job Description - Text Area Component with dynamic props -->
      <x-inputs.text-area
        id="description"
        name="description"
        label="Job Description"
        placeholder="We are seeking a skilled and motivated Software Developer..."
      />

      <!-- Annual Salary - Text Input Component with dynamic props -->
      <x-inputs.text id="salary" name="salary" label="Annual Salary" type="number" placeholder="90000" />

      <!-- Requirements - Text Area Component with dynamic props -->
      <x-inputs.text-area
        id="requirements"
        name="requirements"
        label="Requirements"
        placeholder="Bachelor's degree in Computer Science"
      />

      <!-- Benefits - Text Area Component with dynamic props -->
      <x-inputs.text-area
        id="benefits"
        name="benefits"
        label="Benefits"
        placeholder="Health insurance, 401k, paid time off"
      />

      <!-- Tags - Text Input Component with dynamic props -->
      <x-inputs.text id="tags" name="tags" label="Tags (comma-separated)" type="text"
        placeholder="development, coding, java, python" />

      {{-- select --}}
      <div class="mb-4">
        <label class="block text-gray-700" for="job_type">Job Type</label>
        <select id="job_type" name="job_type"
          class="@error('job_type') border-red-500 @enderror w-full rounded border px-4 py-2 focus:outline-none">
          <option value="Full-Time" {{ old('job_type') == 'Full-Time' ? 'selected' : '' }}>
            Full-Time
          </option>
          <option value="Part-Time" {{ old('job_type') == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
          <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
          <option value="Temporary" {{ old('job_type') == 'Temporary' ? 'selected' : '' }}>Temporary</option>
          <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
          <option value="Volunteer" {{ old('job_type') == 'Volunteer' ? 'selected' : '' }}>Volunteer</option>
          <option value="On-Call" {{ old('job_type') == 'On-Call' ? 'selected' : '' }}>On-Call</option>
        </select>
        @error('job_type')
          <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- select --}}
      <div class="mb-4">
        <label class="block text-gray-700" for="remote">Remote</label>
        <select id="remote" name="remote" class="w-full rounded border px-4 py-2 focus:outline-none">
          <option value="false">No</option>
          <option value="true">Yes</option>
        </select>
      </div>

      <!-- Address - Text Input Component with dynamic props -->
      <x-inputs.text id="address" name="address" label="Address" type="text" placeholder="123 Main St" />

      <!-- City - Text Input Component with dynamic props -->
      <x-inputs.text id="city" name="city" label="City" type="text" placeholder="Albany" />

      <!-- State - Text Input Component with dynamic props -->
      <x-inputs.text id="state" name="state" label="State" type="text" placeholder="NY" />

      <!-- ZIP Code - Text Input Component with dynamic props -->
      <x-inputs.text id="zipcode" name="zipcode" label="ZIP Code" type="text" placeholder="12201" />

      <h2 class="mb-6 text-center text-2xl font-bold text-gray-500">
        Company Info
      </h2>

      <!-- Company Name - Text Input Component with dynamic props -->
      <x-inputs.text id="company_name" name="company_name" label="Company Name" type="text"
        placeholder="Company name" />

      <!-- Company Description - Text Area Component with dynamic props -->
      <x-inputs.text-area
        id="company_description"
        name="company_description"
        label="Company Description"
        placeholder="Company Description"
      />

      <!-- Company Website - Text Input Component with dynamic props -->
      <x-inputs.text id="company_website" name="company_website" label="Company Website" type="url"
        placeholder="Enter website" />

      <!-- Contact Phone - Text Input Component with dynamic props -->
      <x-inputs.text id="contact_phone" name="contact_phone" label="Contact
      Phone" type="text"
        placeholder="Enter phone" />

      <!-- Contact Email - Text Input Component with dynamic props -->
      <x-inputs.text id="contact_email" name="contact_email" label="Contact Email" type="email"
        placeholder="Email where you want to receive applications" />

      {{-- file input --}}
      <div class="mb-4">
        <label class="block text-gray-700" for="company_logo">Company Logo</label>
        <input id="company_logo" type="file" name="company_logo"
          class="@error('company_logo') border-red-500 @enderror w-full rounded border px-4 py-2 focus:outline-none" />
        @error('company_logo')
          <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit"
        class="my-3 w-full rounded bg-green-500 px-4 py-2 text-white hover:bg-green-600 focus:outline-none">
        Save
      </button>
    </form>
  </div>
</x-layout>
