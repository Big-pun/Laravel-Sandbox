<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(5);

        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        $isRemote = request()->boolean('remote', false);

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => 'required',
            'location' => $isRemote ? 'nullable' : 'required',
            'remote' => 'boolean'
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'location' => $isRemote ? 'Remote' : request('location'),
            'remote' => $isRemote,
            'employer_id' => 1,
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        $isRemote = request()->boolean('remote', false);
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => 'required',
            'location' => $isRemote ? 'nullable' : 'required',
        ], [
            'title.required' => 'The title is required',
            'salary.required' => 'The salary is required',
            'location.required' => 'The location is required for a non-remote job'
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
            'location' => $isRemote ? 'Remote' : request('location'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
