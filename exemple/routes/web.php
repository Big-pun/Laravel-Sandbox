<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Route pour afficher tous les jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(5);

    return view('jobs.index', [
        'jobs' => $jobs,
    ]);
});

// Route pour créer un nouveau job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Route pour afficher un job spécifique
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

// Route pour enregistrer un nouveau job
Route::post('/jobs', function () {
    // Récupérer la valeur de remote avec une valeur par défaut de false
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
});

// Route pour afficher la page de contact
Route::get('/contact', function () {
    return view('contact');
});

// Route pour editer un job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Route pour editer un job
Route::patch('/jobs/{id}', function ($id) {
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

    $job = Job::findOrFail($id);
    
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
        'location' => $isRemote ? 'Remote' : request('location'),
    ]);

    return redirect('/jobs/' . $job->id);
});

// Route pour supprimer un job
Route::delete('/jobs/{id}', function ($id) {
    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});