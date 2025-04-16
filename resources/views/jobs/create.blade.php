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
      <x-inputs.text-area id="description" name="description" label="Job Description"
        placeholder="We are seeking a skilled and motivated Software Developer..." />

      <!-- Annual Salary - Text Input Component with dynamic props -->
      <x-inputs.text id="salary" name="salary" label="Annual Salary" type="number" placeholder="90000" />

      <!-- Requirements - Text Area Component with dynamic props -->
      <x-inputs.text-area id="requirements" name="requirements" label="Requirements"
        placeholder="Bachelor's degree in Computer Science" />

      <!-- Benefits - Text Area Component with dynamic props -->
      <x-inputs.text-area id="benefits" name="benefits" label="Benefits"
        placeholder="Health insurance, 401k, paid time off" />

      <!-- Tags - Text Input Component with dynamic props -->
      <x-inputs.text id="tags" name="tags" label="Tags (comma-separated)" type="text"
        placeholder="development, coding, java, python" />

      {{-- Job Type - Select Component with dynamic props --}}
      <x-inputs.select id="job_type" name="job_type" label="Job Type" :options="[
          'Full-Time' => 'Full-Time',
          'Part-Time' => 'Part-Time',
          'Contract' => 'Contract',
          'Temporary' => 'Temporary',
          'Internship' => 'Internship',
          'Volunteer' => 'Volunteer',
          'On-Call' => 'On-Call',
      ]"
        value="{{ old('job_type') }}" />

      {{-- Remote - Select Component with dynamic props --}}
      <x-inputs.select id="remote" name="remote" label="Remote" :options="[0 => 'No', 1 => 'Yes']" />

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
      <x-inputs.text-area id="company_description" name="company_description" label="Company Description"
        placeholder="Company Description" />

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

      {{-- Company Logo - File Input Component with dynamic props --}}
      <x-inputs.file id="company_logo" name="company_logo" label="Company Logo" />

      <button type="submit"
        class="my-3 w-full cursor-pointer rounded bg-green-500 px-4 py-2 text-white hover:bg-green-600 focus:outline-none">
        Save
      </button>
    </form>
  </div>
</x-layout>
