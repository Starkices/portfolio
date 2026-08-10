<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $featuredProjects = Project::where('featured', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', [
            'featuredProjects' => $featuredProjects,
        ]);
    }

    public function about(): View
    {
        $skills = [
            'Backend' => ['PHP', 'Laravel', 'MySQL'],
            'Tools & Workflow' => ['Git', 'GitHub', 'XAMPP', 'Laravel Herd'],
            'Currently Learning' => ['Cybersecurity Fundamentals', 'Linux', 'Computer Networking'],
        ];

        return view('about', [
            'skills' => $skills,
        ]);
    }

    public function contact(): View
    {
        return view(' contact');
    }
}
