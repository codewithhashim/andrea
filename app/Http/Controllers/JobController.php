<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //All Profile Data
        $jobsData = Job::orderBy('created_at', 'desc')->get();

        return response([
            'data' => $jobsData,
        ], 200);
    }
    // get single jobs 
    public function show($slug)
    {
        $jobsData = Job::where('slug', $slug)->first();
        return response([
            'data' => $jobsData,
        ], 200);
    }

    //create Job
    public function store(JobRequest $request)
    {
        $userData = Job::create([
            'user_id' => auth()->id(),
            'open' => true,
            'company' => $request->company,
            'avatar' => $request->avatar,
            'location' => $request->location,
            'jobTitle' => $request->jobTitle,
            'description' => $request->description,
            'slug' => $request->slug,
            'jobType' => $request->jobType,
            'employmentType' => $request->employmentType,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'jobLevel' => $request->jobLevel,
            'category' => $request->category,
        ]);
        $response = [
            'message' => 'Job Added Successfully',
            'data' => $userData,
        ];

        return response($response, 201);
    }

    // search jobs 
    public function search(Request $request)
    {
        $jobs = Job::where('jobTitle', 'LIKE', '%' . $request->jobTitle . '%');

        if ($request->location != 'ALL') {
            $jobs->where('location', $request->location);
        }
        if ($request->jobType) {
            $jobs->where('jobType', "=", $request->jobType);
        }
        if ($request->category) {
            $jobs->where('category', "=", $request->category);
        }
        if ($request->jobLevel) {
            $jobs->where('jobLevel', '=', $request->jobLevel);
        }
        if ($request->range) {
            $strSplit = explode("-", $request->range);
            $minRange = $strSplit[0];
            $maxRange = $strSplit[1];
            $jobs->whereBetween('salary', [$minRange, $maxRange]);
        }

        $jobData = $jobs->get();
        return response([
            'data' => $jobData,
        ], 200);
    }
}
