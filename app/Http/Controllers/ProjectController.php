<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::orderBy('sort_order')->get();

        return view('projects.index', [
            'projects' => $projects,
        ]);
    }

    public function show(Project $project): View
    {
        return view('projects.show', [
            'project' => $project,
        ]);
    }
}
