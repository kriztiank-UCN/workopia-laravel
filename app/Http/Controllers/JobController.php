<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Available Jobs';
        $jobs = [
            'Web Developer',
            'Database Admin',
            'Software Engineer',
            'Systems Analyst'
        ];

        return view('jobs.index', compact('title', 'jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }
}
