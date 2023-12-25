<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EmploymentType;
use App\Models\Job;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\Admin\JobResource;
use App\Http\Resources\EmploymentTypeResource;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->get();

        return Inertia::render('Admin/Jobs/Index', [
            'jobs' => JobResource::collection($jobs)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Jobs/Create', [
            'employmentTypes' => EmploymentTypeResource::collection(EmploymentType::cases())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        // dd($request->validated());
        Job::create($request->validated());

        return to_route('admin.jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return Inertia::render('Admin/Jobs/Show', [
            'job' => new JobResource($job)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return Inertia::render('Admin/Jobs/Edit', [
            'employmentTypes' => EmploymentTypeResource::collection(EmploymentType::cases()),
            'job' => new JobResource($job)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->updateOrFail($request->validated());

        return to_route('admin.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->deleteOrFail();

        flash()->addSuccess('Job deleted successfully.');

        return to_route('admin.jobs.index');
    }
}
