<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Mail\JobApplied;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    // @desc   Store a new job application
    // @route  POST /jobs/{job}/apply
    public function store(Request $request, Job $job): RedirectResponse
    {
        // Check if the user has already applied for this job
        $existingApplication = Applicant::where('job_id', $job->id)
            ->where('user_id', Auth::id())
            ->exists();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied to this job');
        }

        // Validate the incoming request data
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'contact_phone' => '',
            'contact_email' => 'required|string|email',
            'message' => '',
            'location' => '',
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        // Handle resume upload
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $validatedData['resume_path'] = $path;
        }

        // Store the application
        $application = new Applicant($validatedData);
        $application->job_id = $job->id;
        $application->user_id = Auth::user()->id;
        $application->save();

        // Send email to owner
        Mail::to($job->user->email)->send(new JobApplied());

        return redirect()->back()->with('success', 'Your application has been submitted');
    }

    // @desc   Delete a job application
    // @route  DELETE /applicants/{applicant}
    public function destroy($id): RedirectResponse
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();
        return redirect()->route('dashboard')->with('success', 'Applicant deleted successfully.');
    }
}
