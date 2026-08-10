<h1>{{ $project->title }}</h1>

<p>{{ $project->summary }}</p>

<div>
    {!! nl2br(e($project->description)) !!}
</div>

<p>
    <strong>Technologies:</strong>
    {{ //fetch the technologies array associated with the project and display them as a comma-separated list
    implode(', ', $project->tech_stack->pluck('name')->toArray()) }}
</p>

@if ($project->live_url)
    <a href="{{ $project->live_url }}" target="_blank">
        Live Demo
    </a>
@endif

@if ($project->github_url)
    <a href="{{ $project->github_url }}" target="_blank">
        GitHub
    </a>
@endif