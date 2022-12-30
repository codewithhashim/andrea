<?php

namespace App\Http\Controllers;

use App\Models\ApplyJob;
use App\Models\Job;
use App\Models\Profile;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{
    public function applyJob(Request $request)
    {
        $request->validate([
            'job_id' => 'required|string',
        ]);
        $profile = Profile::where('user_id', '=',  auth()->id())->first();

        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->image = $request->image;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->city = $request->city;
        $profile->resume = $request->resume;
        $profile->languages = $request->languages;
        $profile->questions = $request->questions;
        $profile->prev_job = $request->prev_job;


        $isJobExist = Job::where('id', '=', $request->job_id)->first();

        if (!$isJobExist) {
            $response = [
                'message' => 'This job is not found with this id',
            ];
            return response($response, 404);
        }

        $isApplied = ApplyJob::where('user_id', '=', auth()->id())->where('job_id', '=', $request->job_id)->first();

        if ($isApplied) {
            $response = [
                'message' => 'You already applied this job',
            ];
            return response($response, 401);
        }


        $profile->save();
        ApplyJob::create([
            'user_id' => auth()->id(),
            'job_id' => $request->job_id,
        ]);

        $response = [
            'message' => 'Job Applied Successfully',
        ];

        return response($response, 200);
    }
}
