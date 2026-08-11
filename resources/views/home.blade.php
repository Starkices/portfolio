@extends('layouts.app')

@section('title',  config('portfolio.name') . ' — ' . config('portfolio.title'))

@section('content')

<section class="mx-auto max-w-5xl px-6 pb-20 pt-24">
    <p class="font-mono text-sm text-amber-400">{{ config('portfolio.company') }} / SOFTWARE DEVELOPMENT</p>
    <h1 class="mt-3 font-mono text-4xl font-bold tracking-tight text-white sm:text-6xl">
        {{config('portfolio.name')}}
    </h1>
    <p class="mt-6 max-w-2xl text-lg text-zinc-300">
        {{config('portfolio.description')}}<br
        <span class="text-white">{{config('portfolio.company')}}</span> — {{ config('portfolio.company_description') }}
    </p>

    <div class="mt-8 flex flex-wrap gap-4">
        <a href="{{ route('projects.index') }}" class="rounded-md bg-amber px-5 py-2.5 text-sm font-semibold text-ink transition-opacity hover:opacity-90">
            View my projects
        </a>
        <a href="{{ route('contact.create') }}" class="rounded-md border border-ink-border px-5 py-2.5 text-sm text-zinc-200 transition-colors hover:border-zinc-500">
            Get in touch
        </a>
    </div>
</section>

@if($featuredProjects->count())
<section class="border-t border-ink-border">
    <div class="mx-auto max-w-5xl px-6 py-16">
        <div class="flex items-baseline justify-between">
            <h2 class="font-mono text-sm uppercase tracking-wider text-zinc-400">Featured work</h2>
            <a href="{{ route('projects.index') }}" class="text-sm text-amber hover:underline">View all &rarr;</a>
        </div>

        <div class="mt-8 grid gap-6 sm:grid-cols-2">
            @foreach($featuredProjects as $project)
                <a href="{{ route('projects.show', $project) }}" class="group rounded-lg border border-ink-border bg-ink-surface p-6 transition-colors hover:border-amber">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-white">{{ $project->title }}</h3>
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
    </div>
</section>
@endif

@endsection
