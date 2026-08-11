@extends('layouts.app')

@section('title', 'Projects — Wisdom Ogheneobrozie')

@section('content')

<section class="mx-auto max-w-5xl px-6 py-20">
    <h1 class="font-mono text-3xl font-bold text-white">Projects</h1>
    <p class="mt-3 text-zinc-400">Things I've built, from PHP fundamentals through to Laravel.</p>

    <div class="mt-10 grid gap-6 sm:grid-cols-2">
        @foreach($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="group rounded-lg border border-ink-border bg-ink-surface p-6 transition-colors hover:border-amber">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-white">{{ $project->title }}</h2>
                    @if($project->status === 'live')
                        <span class="flex items-center gap-1.5 text-xs text-teal">
                            <span class="h-1.5 w-1.5 rounded-full bg-teal"></span> live
                        </span>
                    @endif
                </div>
                <p class="mt-2 text-sm text-zinc-400">{{ $project->summary }}</p>
                @if($project->tech_stack)
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach($project->tech_stack as $tech)
                            <span class="rounded border border-ink-border px-2 py-0.5 font-mono text-xs text-zinc-400">{{ $tech }}</span>
                        @endforeach
                    </div>
                @endif
            </a>
        @endforeach
    </div>
</section>

@endsection
