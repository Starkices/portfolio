@extends('layouts.app')

@section('title', $project->title . ' — ' . config('portfolio.name'))

@section('description', $project->summary)

@section('og_type', 'article')

@section('og_title', $project->title . ' — ' . config('portfolio.company'))

@section('og_description', $project->summary)

@section('content')

    <article>
        @php
            $status = strtolower($project->status ?? 'unknown');

            switch ($status) {
                case 'completed':
                case 'live':
                    $textClass = 'text-teal';
                    $dotClass = 'bg-teal';
                    break;
                case 'in progress':
                case 'in-progress':
                    $textClass = 'text-amber';
                    $dotClass = 'bg-amber';
                    break;
                case 'paused':
                case 'on hold':
                    $textClass = 'text-yellow-400';
                    $dotClass = 'bg-yellow-400';
                    break;
                case 'cancelled':
                case 'archived':
                    $textClass = 'text-red-400';
                    $dotClass = 'bg-red-400';
                    break;
                default:
                    $textClass = 'text-white/50';
                    $dotClass = 'bg-white/30';
            }
        @endphp
        {{-- Project Header --}}
        <section class="relative overflow-hidden border-b border-ink-border">

            {{-- Ambient glow --}}
            <div
                aria-hidden="true"
                class="pointer-events-none absolute -right-32 top-20 h-96 w-96 rounded-full bg-amber/15 blur-[120px]"
            ></div>

            <div class="relative mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">

                {{-- Back navigation --}}
                <a
                    href="{{ route('projects.index') }}"
                    class="group inline-flex items-center gap-2 font-mono text-xs uppercase tracking-wider text-white/40 transition hover:text-amber"
                >
                    <span
                        aria-hidden="true"
                        class="transition-transform duration-200 group-hover:-translate-x-1"
                    >
                        ←
                    </span>

                    All projects
                </a>


                {{-- Status --}}
                <div class="mt-12">

                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-ink-surface px-3 py-1.5 font-mono text-[10px] font-medium uppercase tracking-wider text-white/50"
                    >
                        <span class="h-1.5 w-1.5 rounded-full {{ $dotClass }}"></span>

                        {{ $project->status }}
                    </span>

                </div>


                {{-- Title --}}
                <h1
                    class="mt-6 max-w-5xl text-5xl font-extrabold tracking-[-0.04em] text-white sm:text-6xl lg:text-7xl"
                >
                    {{ $project->title }}
                </h1>


                {{-- Summary --}}
                <p class="mt-7 max-w-3xl text-lg leading-8 text-white/50 sm:text-xl">
                    {{ $project->summary }}
                </p>


                {{-- Technologies --}}
                <div class="mt-8 flex flex-wrap gap-2">

                    @foreach($project->tech_stack as $technology)

                        <span
                            class="rounded-md border border-ink-border bg-ink-surface px-3 py-1.5 font-mono text-[10px] uppercase tracking-wider text-white/45"
                        >
                            {{ $technology }}
                        </span>

                    @endforeach

                </div>


                {{-- Links --}}
                @if($project->live_url || $project->github_url)

                    <div class="mt-10 flex flex-wrap gap-3">

                        @if($project->live_url)

                            <a
                                href="{{ $project->live_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 rounded-lg bg-amber px-5 py-3 font-mono text-xs font-semibold uppercase tracking-wider text-ink transition hover:bg-amber/90"
                            >
                                Live project
                                <span aria-hidden="true">↗</span>
                            </a>

                        @endif


                        @if($project->github_url)

                            <a
                                href="{{ $project->github_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 rounded-lg border border-ink-border px-5 py-3 font-mono text-xs font-semibold uppercase tracking-wider text-white transition hover:border-white/20 hover:bg-white/[0.03]"
                            >
                                Source code
                                <span aria-hidden="true">↗</span>
                            </a>

                        @endif

                    </div>

                @endif

            </div>

        </section>


        {{-- Project Content --}}
        <section class="py-20 lg:py-28">

            <div class="mx-auto grid max-w-7xl gap-16 px-6 lg:grid-cols-[1fr_280px] lg:px-8">


                {{-- Description --}}
                <div class="max-w-3xl">

                    <p class="font-mono text-xs font-semibold uppercase tracking-[0.2em] text-amber">
                        Project Overview
                    </p>

                    <div class="mt-6 whitespace-pre-line text-base leading-8 text-white/55 sm:text-lg">
                        {{ $project->description }}
                    </div>

                </div>


                {{-- Project metadata --}}
                <aside>

                    <div class="border-t border-ink-border pt-6">
                        <p class="font-mono text-[10px] uppercase tracking-[0.2em] text-white/30">
                            Status
                        </p>

                        <p class="mt-3 text-sm {{ $textClass }} flex items-center gap-3">
                            <span class="inline-block h-2.5 w-2.5 rounded-full {{ $dotClass }}"></span>
                            {{ $project->status }}
                        </p>

                    </div>


                    <div class="mt-8 border-t border-ink-border pt-6">

                        <p class="font-mono text-[10px] uppercase tracking-[0.2em] text-white/30">
                            Technologies
                        </p>

                        <div class="mt-3 space-y-2">

                            @foreach($project->tech_stack as $technology)

                                <p class="text-sm text-white/50">
                                    {{ $technology }}
                                </p>

                            @endforeach

                        </div>

                    </div>

                </aside>

            </div>

        </section>


        {{-- Bottom navigation --}}
        <section class="border-t border-ink-border">

            <div class="mx-auto flex max-w-7xl flex-col gap-5 px-6 py-12 sm:flex-row sm:items-center sm:justify-between lg:px-8">

                <a
                    href="{{ route('projects.index') }}"
                    class="group inline-flex items-center gap-2 font-mono text-xs uppercase tracking-wider text-white/40 transition hover:text-amber"
                >
                    <span
                        aria-hidden="true"
                        class="transition-transform duration-200 group-hover:-translate-x-1"
                    >
                        ←
                    </span>

                    Back to projects
                </a>


                @if($project->live_url)

                    <a
                        href="{{ $project->live_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="group inline-flex items-center gap-2 font-mono text-xs uppercase tracking-wider text-white/60 transition hover:text-amber"
                    >
                        Visit live project

                        <span
                            aria-hidden="true"
                            class="transition-transform duration-200 group-hover:translate-x-1"
                        >
                            ↗
                        </span>
                    </a>

                @endif

            </div>

        </section>

    </article>

@endsection