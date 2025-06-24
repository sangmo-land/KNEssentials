<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutismCareController extends Controller
{
    public function index()
    {
        $autismServices = [
            [
                'id' => 1,
                'title' => 'Therapeutic Sessions',
                'description' => 'Individualized therapy sessions tailored to each child’s needs.',
                'image' => '/images/autism1.jpg',
            ],
            [
                'id' => 2,
                'title' => 'Speech and Communication',
                'description' => 'Enhancing communication skills through structured programs.',
                'image' => '/images/autism2.jpg',
            ],
            [
                'id' => 3,
                'title' => 'Behavioral Therapy',
                'description' => 'Supporting children in managing challenging behaviors.',
                'image' => '/images/autism3.jpg',
            ],
        ];

        return view('autism.index', compact('autismServices'));
    }

    public function show($id)
    {
        $autismServices = [
            1 => [
                'title' => 'Therapeutic Sessions',
                'description' => 'Detailed description of therapeutic sessions, goals, and methods.',
                'image' => '/images/autism1.jpg',
            ],
            2 => [
                'title' => 'Speech and Communication',
                'description' => 'Detailed info about speech therapy and communication-building techniques.',
                'image' => '/images/autism2.jpg',
            ],
            3 => [
                'title' => 'Behavioral Therapy',
                'description' => 'Detailed behavioral therapy practices, challenges, and solutions.',
                'image' => '/images/autism3.jpg',
            ],
        ];

        $service = $autismServices[$id] ?? abort(404);

        return view('autism.show', compact('service'));
    }
}