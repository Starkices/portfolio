<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View|Response
    {
        // Use the same page size as the AJAX loader to keep paging consistent
        $projects = Project::orderBy('sort_order')->paginate(12);

        if ($request->ajax()) {
            return $this->loadMore($request);
        }

        return view('projects.index', compact('projects'));
    }

    public function loadMore(Request $request): Response
    {
        $page = $request->input('page', 1);
        $projects = Project::orderBy('sort_order')->paginate(12, ['*'], 'page', $page);

        $response = response()->view('partials.cards', compact('projects'));

        if ($projects->hasMorePages()) {
            $response->header('X-Next-Page-Url', $projects->nextPageUrl());
        }

        return $response;
    }

    public function show(Project $project): View
    {
        return view('projects.show', [
            'project' => $project,
        ]);
    }
}
