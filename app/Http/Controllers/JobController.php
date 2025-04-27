<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;

    // @desc    Show all job listings
    // @route   GET /jobs
    public function index(): View
    {
        $jobs = Job::paginate(3);
        return view('jobs.index')->with('jobs', $jobs);
    }

    // @desc    Show create job form
    // @route   GET /jobs/create
    public function create(): View
    {
        return view('jobs.create');
    }

    // @desc    Save job to database
    // @route   POST /jobs
    public function store(Request $request): RedirectResponse
    {
        // dd($request->file('company_logo'));
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);

        // Add the hardcoded user_id
        // $validatedData['user_id'] = 1;

        $validatedData['user_id'] = Auth::user()->id;
        // $validatedData['user_id'] = auth()->user()->id;

        // Check if a file was uploaded
        if ($request->hasFile('company_logo')) {
            // Store the file and get the path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add the path to the validated data array
            $validatedData['company_logo'] = $path;
        }

        // Create a new job listing with the validated data
        Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job listing created successfully!');
    }

    // @desc    Display a single job listing
    // @route   GET /jobs/{$id}
    public function show(Job $job): View
    {
        return view('jobs.show')->with('job', $job);
    }

    // @desc    Show edit job form
    // @route   GET /jobs/{$id}/edit
    public function edit(Job $job): View
    {
        // Check if the user is authorized
        $this->authorize('update', $job);

        return view('jobs.edit')->with('job', $job);
    }

    // @desc    Update job listing in database
    // @route   PUT /jobs/{$id}
    public function update(Request $request, Job $job): RedirectResponse
    {
        // Check if the user is authorized
        $this->authorize('update', $job);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);

        // Check if a file was uploaded
        if ($request->hasFile('company_logo')) {
            // Delete the old company logo from storage
            if ($job->company_logo) {
                Storage::delete('public/logos/' . basename($job->company_logo));
            }
            // Store the file and get the path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add the path to the validated data array
            $validatedData['company_logo'] = $path;
        }

        // Update with the validated data
        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job listing updated successfully!');
    }

    // @desc    Delete a job listing
    // @route   DELETE /jobs/{$id}
    public function destroy(Job $job): RedirectResponse
    {
        // Check if the user is authorized
        $this->authorize('delete', $job);

        // If there is a company logo, delete it from storage
        if ($job->company_logo) {
            Storage::delete('public/logos/' . $job->company_logo);
        }

        // Delete the job listing
        $job->delete();

        // Check if the request came from the dashboard page
        if (request()->query('from') == 'dashboard') {
            return redirect()->route('dashboard')->with('success', 'Job listing deleted successfully!');
        }

        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully!');
    }
}
