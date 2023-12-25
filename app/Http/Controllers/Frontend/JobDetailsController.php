<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Resources\JobDetailsResource;
use App\Models\Job;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobDetailsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Job $job)
    {
        return Inertia::render('Frontend/JobDetails', [
            'job' => new JobDetailsResource($job)
        ]);
    }
}
