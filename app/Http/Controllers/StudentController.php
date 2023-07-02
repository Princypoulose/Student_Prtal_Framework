<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class StudentController extends Controller
{
    public function show()
    {
        $accessToken = Cookie::get('accessToken');
        $response = Http::withToken($accessToken)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
            ->withBody(json_encode('{}'), 'application/json')
            ->get('http://127.0.0.1:5001/student');



        $data = $response->json();

        // If response status is not 200, you might want to handle it.
        if ($response->status() != 200) {
            // handle error.
        }

        $student = $data['data'] ?? null;

        return view('homepage', compact('student', 'data'));
    }
    public function courses()
    {
        $accessToken = Cookie::get('accessToken');
        $response = Http::withToken($accessToken)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
            ->withBody(json_encode('{}'), 'application/json')
            ->get('http://127.0.0.1:5001/course');


        $data = $response->json();

        $courses = $data['data'] ?? null;

        return view('course', compact('courses', 'data'));
    }
    public function enroll(Request $request)
    {
        $courseId = $request->input('course_id');
        $accessToken = Cookie::get('accessToken');

        $response = Http::withToken($accessToken)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
            ->withBody(json_encode(['courseId' => $courseId]), 'application/json')
            ->put('http://127.0.0.1:5001/course');
        if($response->successful()){
            return redirect('/courses');
        }
        else{
            return back()->with('error', 'Failed to enroll the course. Please try again.');
        }

    }
    public function graduation()
    {
        $accessToken = Cookie::get('accessToken');
        $response = Http::withToken($accessToken)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
            ->withBody(json_encode('{}'), 'application/json')
            ->get('http://127.0.0.1:5001/graduate');



        $data = $response->json();

        // If response status is not 200, you might want to handle it.
        if ($response->status() != 200) {
            // handle error.
        }

        $response = $data['data'] ?? null;

        return view('graduate', compact('response', 'data'));
    }
    public function graduate()
{
    $accessToken = Cookie::get('accessToken');

    $response = Http::withToken($accessToken)
        ->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])
        ->withBody(json_encode('{}'), 'application/json')
        ->put('http://127.0.0.1:5001/graduate');

    if($response->successful()){
        return redirect('/graduation')->with('success', 'Successfully graduated.');
    }
    else{
        return back()->with('error', 'Failed to graduate. Please try again.');
    }
}
    public function invoices()
    {
        
        $accessToken = Cookie::get('accessToken');
        $response = Http::withToken($accessToken)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
            ->withBody(json_encode('{}'), 'application/json')
            ->get('http://127.0.0.1:5001/fees');



        $data = $response->json();

        // If response status is not 200, you might want to handle it.
        if ($response->status() != 200) {
            // handle error.
        }

        $response = $data['data']['data'] ?? null;

        return view('invoices', compact('response', 'data'));
    }
    public function pay(Request $request)
{
    $invoice = $request->input('invoice');
    $accessToken = Cookie::get('accessToken');

    $response = Http::withToken($accessToken)
        ->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])
        ->withBody(json_encode(['invoiceNo' => $invoice]), 'application/json')
        ->put('http://127.0.0.1:5001/fees');

    if($response->successful()){
        return redirect('/invoices')->with('success', 'Successfully graduated.');
    }
    else{
        return back()->with('error', 'Failed to graduate. Please try again.');
    }

}
}
