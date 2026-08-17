@extends('layouts.app')

@section('title', config('portfolio.company') . ' — ' . config('portfolio.title'))

@section('description', config('portfolio.description'))

@section('content')

    {{-- Hero --}}
    <section class="relative overflow-hidden">
        {{-- Soft ambient glow --}}
        <div
            aria-hidden="true"
            class="pointer-events-none absolute right-[-12rem] top-1/2 h-[32rem] w-[32rem] -translate-y-1/2 rounded-full bg-amber/15 blur-[120px]"
        ></div>
        {{-- Subtle background grid --}}
        <div
            aria-hidden="true"
            class="pointer-events-none absolute inset-0 opacity-[0.035]"
            style="
                background-image:
                    linear-gradient(to right, white 1px, transparent 1px),
                    linear-gradient(to bottom, white 1px, transparent 1px);
                background-size: 48px 48px;
            "
        ></div>

        <div class="relative mx-auto flex min-h-[calc(100vh-5rem)] max-w-7xl items-center px-6 py-24 lg:px-8">

            <div class="max-w-5xl">

                {{-- Eyebrow --}}
                <div class="mb-8 flex items-center gap-3">

                    <span class="h-px w-8 bg-amber"></span>

                    <p class="font-mono text-xs font-semibold uppercase tracking-[0.25em] text-amber">
                        {{ config('portfolio.company') }}
                    </p>

                </div>


                {{-- Main heading --}}
                <h1 class="max-w-5xl text-5xl font-extrabold leading-[1.02] tracking-[-0.04em] text-white sm:text-6xl md:text-7xl lg:text-8xl">

                    Building software
                    <br>

                    <span class="text-white/35">
                        that solves real problems.
                    </span>

                </h1>


                {{-- Positioning --}}
                <p class="mt-8 max-w-2xl text-base leading-8 text-white/55 sm:text-lg">
                    {{ config('portfolio.description') }}
                </p>


                {{-- Actions --}}
                <div class="mt-10 flex flex-wrap items-center gap-4">

                    <a
                        href="{{ route('projects.index') }}"
                        class="inline-flex items-center gap-2 rounded-lg bg-amber px-5 py-3 font-mono text-sm font-semibold text-ink transition duration-200 hover:-translate-y-0.5 hover:bg-amber/90"
                    >
                        Explore my work

                        <span aria-hidden="true">↗</span>
                    </a>

                    <a
                        href="{{ route('contact.create') }}"
                        class="inline-flex items-center gap-2 rounded-lg border border-ink-border px-5 py-3 font-mono text-sm font-semibold text-white transition duration-200 hover:-translate-y-0.5 hover:border-white/30 hover:bg-white/[0.03]"
                    >
                        Start a conversation
                    </a>

                </div>


                {{-- Technical signal --}}
                <div class="mt-14 flex flex-wrap items-center gap-x-6 gap-y-3 font-mono text-xs text-white/30">

                    <span>PHP</span>
                    <span>Laravel</span>
                    <span>MySQL</span>
                    <span>Git</span>
                    <span>Cybersecurity</span>
                    <span>Software Development</span>
                </div>

            </div>

        </div>
    </section>

    {{-- Selected Work --}}
    <section class="border-t border-slate-800 py-24">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mb-12 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>
                    <span class="font-mono text-xs font-semibold uppercase tracking-[0.2em] text-amber">
                        Featured Work
                    </span>
                    <h2 class="max-w-2xl text-3xl font-bold tracking-tight text-white sm:text-4xl lg:text-5xl">
                    Systems built to solve real problems.
                    </h2>

                    <p class="mt-5 max-w-2xl text-base leading-7 text-white/45">
                        A selection of applications and systems I've worked on,
                        from PHP applications to Laravel-based softwares.
                    </p>
                </div>

                <a
                    href="{{ route('projects.index') }}"
                    class="group inline-flex shrink-0 items-center gap-2 text-sm font-semibold text-white/60 transition hover:text-amber"
                >
                    View all projects →
                </a>

            </div>


            <div
                x-data="{
                    current: 0,
                    total: {{ $featuredProjects->count() }},
                    autoplayTimer: null,
                    isMobile() { return window.innerWidth < 768; },
                    startAutoplay() {
                        this.stopAutoplay();
                        if (!this.isMobile() || this.total <= 1) return;
                        this.autoplayTimer = setInterval(() => this.next(), 4500);
                    },
                    stopAutoplay() {
                        if (this.autoplayTimer) clearInterval(this.autoplayTimer);
                    },
                    restartAutoplay() { this.startAutoplay(); },
                    cardStep() {
                        const track = this.$refs.track;
                        const first = track.children[0];
                        if (!first) return 0;
                        const style = getComputedStyle(track);
                        const gap = parseFloat(style.columnGap || style.gap || 0);
                        return first.getBoundingClientRect().width + gap;
                    },
                    next() { this.goTo((this.current + 1) % this.total); },
                    prev() { this.goTo((this.current - 1 + this.total) % this.total); },
                    goTo(index) {
                        this.current = index;
                        this.$refs.track.scrollTo({ left: index * this.cardStep(), behavior: 'smooth' });
                    },
                    syncFromScroll() {
                        const step = this.cardStep();
                        if (!step) return;
                        this.current = Math.round(this.$refs.track.scrollLeft / step);
                    }
                }"
                x-init="startAutoplay(); window.addEventListener('resize', restartAutoplay)"
                @touchstart="stopAutoplay()"
                class="relative"
            >
                @if($featuredProjects->isNotEmpty())
                    <div
                        x-ref="track"
                        @scroll.debounce.100ms="syncFromScroll()"
                        class="scrollbar-hide flex snap-x snap-mandatory gap-6 overflow-x-auto"
                    >
                    
                    @foreach($featuredProjects as $project)
                        <a href="{{ route('projects.show', $project) }}" class="group relative w-full shrink-0 snap-start overflow-hidden rounded-2xl border border-ink-border bg-ink-surface transition duration-300 hover:-translate-y-1 hover:border-white/15 md:w-[calc(50%-12px)]">
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
                            {{-- Project visual --}}
                            <div class="relative aspect-[16/9] overflow-hidden border-b border-ink-border">
                                <div aria-hidden="true" class="absolute -right-24 -top-24 h-64 w-64 rounded-full bg-amber/5 blur-[90px] transition duration-500 group-hover:bg-amber/10"></div>

                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="text-center">
                                        <div class="font-mono text-5xl font-bold tracking-tighter text-white/[0.06] transition duration-500 group-hover:text-white/[0.10] sm:text-7xl">
                                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </div>
                                        <p class="mt-2 font-mono text-[10px] uppercase tracking-[0.3em] text-white/20">
                                            {{ $project->status }}
                                        </p>
                                    </div>
                                </div>

                                <div class="absolute left-5 top-5">
                                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-ink/80 px-3 py-1.5 font-mono text-[10px] font-medium uppercase tracking-wider text-white/60 backdrop-blur">
                                        <span class="h-1.5 w-1.5 rounded-full {{ $dotClass }}"></span>
                                        {{ $project->status }}
                                    </span>
                                </div>
                            </div>

                            {{-- Project information --}}
                            <div class="p-6 sm:p-8">
                                <div class="flex items-start justify-between gap-6">
                                    <div>
                                        <p class="font-mono text-xs uppercase tracking-[0.15em] text-white/30">
                                            Project {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                        </p>
                                        <h3 class="mt-2 text-2xl font-bold tracking-tight text-white transition group-hover:text-amber sm:text-3xl">
                                            {{ $project->title }}
                                        </h3>
                                    </div>
                                    <span aria-hidden="true" class="text-xl text-white/20 transition duration-300 group-hover:-translate-y-1 group-hover:translate-x-1 group-hover:text-amber">
                                        ↗
                                    </span>
                                </div>

                                <p class="mt-5 max-w-xl text-sm leading-7 text-white/50 sm:text-base">
                                    {{ $project->summary }}
                                </p>

                                @if($project->tech_stack)
                                    <div class="mt-7 flex flex-wrap gap-2">
                                        @foreach($project->tech_stack as $technology)
                                            <span class="rounded-md border border-ink-border bg-ink px-2.5 py-1 font-mono text-[10px] uppercase tracking-wider text-white/40">
                                                {{ $technology }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach

                    </div>
                    {{-- Desktop arrows --}}
                    <div class="mt-6 hidden items-center justify-end gap-3 md:flex">
                        <button @click="prev(); stopAutoplay()" class="flex h-10 w-10 items-center justify-center rounded-full border border-ink-border text-white/60 transition hover:border-amber hover:text-amber" aria-label="Previous project">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                        </button>
                        <button @click="next(); stopAutoplay()" class="flex h-10 w-10 items-center justify-center rounded-full border border-ink-border text-white/60 transition hover:border-amber hover:text-amber" aria-label="Next project">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                        </button>
                    </div>

                    {{-- Mobile dots --}}
                    @if($featuredProjects->count() > 1)
                        <div class="mt-6 flex items-center justify-center gap-2 md:hidden">
                            @foreach($featuredProjects as $project)
                                <button
                                    @click="goTo({{ $loop->index }}); restartAutoplay()"
                                    :class="current === {{ $loop->index }} ? 'w-6 bg-amber' : 'w-1.5 bg-white/20'"
                                    class="h-1.5 rounded-full transition-all duration-300"
                                    aria-label="Go to project {{ $loop->iteration }}"
                                ></button>
                            @endforeach
                        </div>
                    @endif

                @else

                    <div class="rounded-2xl border border-dashed border-slate-800 p-10 text-center">
                        <p class="text-slate-500">
                            Projects are currently being prepared.
                        </p>
                    </div>

                @endif

            </div>

        </div>

    </section>


    {{-- Capabilities --}}
    <section class="border-t border-slate-800 py-24">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="max-w-2xl">

                <p class="font-mono text-sm uppercase tracking-[0.2em] text-amber-400">
                    Capabilities
                </p>

                <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">
                    What I build.
                </h2>

            </div>

            <div class="mt-12 grid gap-px overflow-hidden rounded-2xl border border-slate-800 bg-slate-800 sm:grid-cols-2 lg:grid-cols-3">

                <div class="bg-slate-950 p-8">
                    <h3 class="text-lg font-semibold text-white">
                        Web Applications
                    </h3>

                    <p class="mt-3 leading-7 text-slate-400">
                        Database-driven applications designed around real business and user requirements.
                    </p>
                </div>

                <div class="bg-slate-950 p-8">
                    <h3 class="text-lg font-semibold text-white">
                        Backend Development
                    </h3>

                    <p class="mt-3 leading-7 text-slate-400">
                        PHP and Laravel applications with structured routing, models, databases and application logic with increased security.
                    </p>
                </div>

                <div class="bg-slate-950 p-8">
                    <h3 class="text-lg font-semibold text-white">
                        Real-World Systems
                    </h3>

                    <p class="mt-3 leading-7 text-slate-400">
                        Software systems designed to organize information, workflows and improve everyday operations.
                    </p>
                </div>

            </div>

        </div>

    </section>


    {{-- Technology Direction --}}
    <section class="border-t border-slate-800 py-24">

        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">

                <div>

                    <p class="font-mono text-sm uppercase tracking-[0.2em] text-amber-400">
                        Technology
                    </p>

                    <h2 class="mt-3 text-3xl font-bold text-white sm:text-4xl">
                        Building the foundation.
                    </h2>

                </div>

                <div class="flex flex-wrap gap-3">

                    @foreach ([
                        'PHP',
                        'Laravel',
                        'MySQL',
                        'HTML',
                        'CSS',
                        'Git',
                        'GitHub',
                        'Blade',
                        'Cybersecurity',
                        '+5 more',
                    ] as $technology)

                        <span class="rounded-full border border-slate-700 px-4 py-2 text-sm text-slate-300">
                            {{ $technology }}
                        </span>

                    @endforeach

                </div>

            </div>

        </div>

    </section>


    {{-- STARKICES Vision --}}
    <section class="border-t border-slate-800 py-24">

        <div class="mx-auto max-w-4xl px-6 text-center lg:px-8">

            <p class="font-mono text-sm uppercase tracking-[0.2em] text-amber-400">
                The Vision
            </p>

            <h2 class="mt-4 text-4xl font-bold tracking-tight text-white sm:text-5xl">
                {{ config('portfolio.company') }}
            </h2>

            <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-slate-400">
                {{ config('portfolio.company_description') }}
            </p>

        </div>

    </section>


    {{-- CTA --}}
    <section class="border-t border-slate-800 py-24">

        <div class="mx-auto max-w-4xl px-6 text-center lg:px-8">

            <h2 class="text-3xl font-bold text-white sm:text-4xl">
                Have something worth building?
            </h2>

            <p class="mx-auto mt-5 max-w-xl text-slate-400">
                Let's turn an idea into a working product.
            </p>

            <a
                href="{{ route('contact.create') }}"
                class="mt-8 inline-block rounded-lg bg-amber-400 px-6 py-3 font-semibold text-slate-950 transition hover:bg-amber-300"
            >
                Start a Conversation
            </a>

        </div>

    </section>

@endsection