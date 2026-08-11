@extends('layouts.app')

@section('title', $project->title . ' — Wisdom Ogheneobrozie')

@section('content')

<section class="mx-auto max-w-3xl px-6 py-20">
    <a href="{{ route('projects.index') }}" class="text-sm text-zinc-400 hover:text-white">&larr; All projects</a>

    <div class="mt-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="font-mono text-3xl font-bold text-white">{{ $project->title }}</h1>
        @if($project->status === 'live')
            <span class="flex items-center gap-1.5 text-sm text-teal">
                <span class="h-1.5 w-1.5 rounded-full bg-teal"></span> live
            </span>
        @endif
    </div>

    @if($project->tech_stack)
        <div class="mt-4 flex flex-wrap gap-2">
            @foreach($project->tech_stack as $tech)
                <span class="rounded border border-ink-border px-2 py-0.5 font-mono text-xs text-zinc-400">{{ $tech }}</span>
            @endforeach
        </div>
    @endif

    <div class="mt-8 space-y-4 leading-relaxed text-zinc-300">
        {!! nl2br(e($project->description)) !!}
    </div>

    <div class="mt-10 flex flex-wrap gap-4">
        @if($project->live_url)
            <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="rounded-md bg-amber px-5 py-2.5 text-sm font-semibold text-ink transition-opacity hover:opacity-90">
                View live &rarr;
            </a>
        @endif
        @if($project->github_url)
            <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="rounded-md border border-ink-border px-5 py-2.5 text-sm text-zinc-200 transition-colors hover:border-zinc-500">
                View on GitHub
            </a>
        @endif
    </div>
</section>

@endsection
