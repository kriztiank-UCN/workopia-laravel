<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class BookmarkController extends Controller
{
    // @desc    Get all users bookmarks
    // @route   GET /bookmarks
    public function index(): View
    {
        $user = Auth::user();

        $bookmarks = $user->bookmarkedJobs()->orderBy('job_user_bookmarks.created_at', 'desc')->paginate(9);
        return view('jobs.bookmarked')->with('bookmarks', $bookmarks);
    }

    // @desc   Store a bookmark
    // @route  POST /bookmarks/{job}
    public function store(Job $job): RedirectResponse
    {
        $user = Auth::user();

        // Create a new bookmark
        $user->bookmarkedJobs()->attach($job->id);

        return back()->with('success', 'Job bookmarked successfully.');
    }

    // @desc    Remove bookmarked job
    // @route   DELETE /bookmarks/{job}
    public function destroy(Job $job): RedirectResponse
    {
        $user = Auth::user();

        // Remove bookmark
        $user->bookmarkedJobs()->detach($job->id);

        return back()->with('success', 'Bookmark removed successfully!');
    }
}
