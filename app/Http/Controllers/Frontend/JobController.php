<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Job;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $job = Job::all();
        return view('frontend.job.index', compact('job'));
    }

    public function show()
    {
        return view('frontend.job.show');
    }

    public function predictSalary(Request $request)
    {
        $job = Job::all();

        $client = new Client(['base_uri' => 'http://localhost:5000/']);

        $data = $client->request('POST', '/predict', ['form_params' => [
            'job' => $request->job,
            'experience' => $request->experience,
        ]]);
        $r = json_decode($data->getBody()->getContents());

        return redirect(route('main'))->withStatus(__('Your Predicted Salary is Rs' . $r->salar_prediction));
    }
}
