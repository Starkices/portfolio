<h1>{{ $project->title }}</h1>

<p>{{ $project->summary }}</p>
    @if($project->tech_stack)
        <div class="mt-4 flex flex-wrap gap-2">
            @foreach($project->tech_stack as $tech)
                <span class="rounded border border-ink-border px-2 py-0.5 font-mono text-xs text-zinc-400">{{ $tech }}.</span>
            @endforeach
        </div>
    @endif
<div>
    {!! nl2br(e($project->description)) !!}
</div>



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