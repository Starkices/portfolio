@extends('layouts.app')

@section('title', 'About — ' . config('portfolio.name'))

@section(
    'description',
    'Learn about ' . config('portfolio.name') . ', the developer behind ' . config('portfolio.company') . ', and his journey in PHP, Laravel, web development, and cybersecurity.'
)

@section('content')

<section class="relative overflow-hidden">

    {{-- Ambient glow --}}
    <div
        class="pointer-events-none absolute right-[-12rem] top-20 h-96 w-96 rounded-full bg-amber/10 blur-3xl"
        aria-hidden="true"
    ></div>

    <div class="relative mx-auto max-w-5xl px-6 py-20 sm:py-28">

        {{-- Intro --}}
        <div class="max-w-3xl">

            <p class="font-mono text-sm uppercase tracking-[0.2em] text-amber">
                About
            </p>

            <h1 class="mt-4 text-4xl font-bold tracking-tight text-white sm:text-6xl">
                Building with curiosity.
                <span class="text-zinc-500">
                    Growing through real work.
                </span>
            </h1>

            <p class="mt-8 space-y-5 text-lg leading-relaxed text-zinc-300">
                I'm {{ config('portfolio.name') }}, a developer focused on
                building practical web applications and understanding the
                systems behind them.
            </p>
            <p class="mt-8 max-w-2xl text-lg leading-8 text-zinc-400">
                My journey started with PHP and database-driven applications
                and has grown into a deeper interest in Laravel, backend
                engineering, application architecture, and cybersecurity.
            </p>

        </div>


        {{-- What I build --}}
        <div class="mt-24 border-t border-ink-border pt-12">

            <div class="grid gap-10 md:grid-cols-[0.8fr_1.2fr]">

                <div>
                    <p class="font-mono text-xs uppercase tracking-[0.2em] text-zinc-500">
                        01
                    </p>

                    <h2 class="mt-3 text-2xl font-semibold text-white">
                        What I build
                    </h2>
                </div>

                <div>
                    <p class="text-base leading-8 text-zinc-400">
                        I enjoy turning ideas and real-world requirements into
                        functional software. My work is primarily focused on
                        web applications, database-driven systems, backend
                        logic, and interfaces that are useful rather than
                        merely decorative.
                    </p>

                    <p class="mt-5 text-base leading-8 text-zinc-400">
                        I'm particularly interested in the parts of software
                        that users don't always see — data models, application
                        logic, validation, authentication, security, and the
                        systems that make an application reliable.
                    </p>
                </div>

            </div>

        </div>


        {{-- Current focus --}}
        <div class="mt-20 border-t border-ink-border pt-12">

            <div class="grid gap-10 md:grid-cols-[0.8fr_1.2fr]">

                <div>
                    <p class="font-mono text-xs uppercase tracking-[0.2em] text-zinc-500">
                        02
                    </p>

                    <h2 class="mt-3 text-2xl font-semibold text-white">
                        Current focus
                    </h2>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">

                    <div class="rounded-2xl border border-ink-border bg-ink-surface/60 p-6">
                        <p class="text-sm font-semibold text-white">
                            Laravel
                        </p>

                        <p class="mt-2 text-sm leading-6 text-zinc-500">
                            Deepening my understanding of Laravel and
                            production-oriented application development.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-ink-border bg-ink-surface/60 p-6">
                        <p class="text-sm font-semibold text-white">
                            Backend Engineering
                        </p>

                        <p class="mt-2 text-sm leading-6 text-zinc-500">
                            Improving how I design application logic,
                            databases, APIs, and maintainable systems.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-ink-border bg-ink-surface/60 p-6">
                        <p class="text-sm font-semibold text-white">
                            Cybersecurity
                        </p>

                        <p class="mt-2 text-sm leading-6 text-zinc-500">
                            Building foundational knowledge in web security
                            and secure application development.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-ink-border bg-ink-surface/60 p-6">
                        <p class="text-sm font-semibold text-white">
                            Shipping
                        </p>

                        <p class="mt-2 text-sm leading-6 text-zinc-500">
                            Moving beyond tutorials by building, deploying,
                            debugging, and improving real applications.
                        </p>
                    </div>

                </div>

            </div>

        </div>


        {{-- Engineering approach --}}
        <div class="mt-20 border-t border-ink-border pt-12">

            <div class="grid gap-10 md:grid-cols-[0.8fr_1.2fr]">

                <div>
                    <p class="font-mono text-xs uppercase tracking-[0.2em] text-zinc-500">
                        03
                    </p>

                    <h2 class="mt-3 text-2xl font-semibold text-white">
                        How I approach software
                    </h2>
                </div>

                <div>

                    <p class="text-lg leading-8 text-zinc-300">
                        I believe the fastest way to become better at software
                        development is to build things that are slightly
                        beyond what you currently know.
                    </p>

                    <div class="mt-8 space-y-5">

                        <div class="flex gap-4">
                            <span class="font-mono text-sm text-amber">
                                01
                            </span>

                            <div>
                                <h3 class="text-sm font-semibold text-white">
                                    Build
                                </h3>

                                <p class="mt-1 text-sm leading-6 text-zinc-500">
                                    Start with a real problem instead of only
                                    following tutorials.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="font-mono text-sm text-amber">
                                02
                            </span>

                            <div>
                                <h3 class="text-sm font-semibold text-white">
                                    Understand
                                </h3>

                                <p class="mt-1 text-sm leading-6 text-zinc-500">
                                    Learn why the system works instead of
                                    blindly copying implementation.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="font-mono text-sm text-amber">
                                03
                            </span>

                            <div>
                                <h3 class="text-sm font-semibold text-white">
                                    Improve
                                </h3>

                                <p class="mt-1 text-sm leading-6 text-zinc-500">
                                    Refactor, secure, test, and improve the
                                    implementation as understanding grows.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="font-mono text-sm text-amber">
                                04
                            </span>

                            <div>
                                <h3 class="text-sm font-semibold text-white">
                                    Ship
                                </h3>

                                <p class="mt-1 text-sm leading-6 text-zinc-500">
                                    Put working software into the real world
                                    and learn from what happens next.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- STARKICES vision --}}
        <div class="mt-20 border-t border-ink-border pt-12">

            <div class="rounded-3xl border border-ink-border bg-ink-surface/60 p-8 sm:p-10">

                <p class="font-mono text-xs uppercase tracking-[0.2em] text-amber">
                    {{ config('portfolio.company') }}
                </p>

                <h2 class="mt-4 text-3xl font-bold tracking-tight text-white">
                    More than a portfolio.
                </h2>

                <p class="mt-5 max-w-2xl text-base leading-7 text-zinc-400">
                    {{ config('portfolio.company_description') }}
                </p>

                <p class="mt-5 max-w-2xl text-base leading-7 text-zinc-500">
                    Every project is part of that progression: learn,
                    experiment, build, ship, and keep raising the standard.
                </p>

            </div>

        </div>


        {{-- CTA --}}
        <div class="mt-20 flex flex-col gap-4 border-t border-ink-border pt-10 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-sm font-semibold text-white">
                    Interested in working together?
                </p>

                <p class="mt-1 text-sm text-zinc-500">
                    Let's talk about what you're building.
                </p>
            </div>

            <a
                href="{{ route('contact.create') }}"
                class="inline-flex items-center justify-center rounded-xl bg-amber px-5 py-3 text-sm font-semibold text-ink transition hover:opacity-90"
            >
                Start a conversation
            </a>

        </div>

        <div class="mt-16">
            <h2 class="font-mono text-sm uppercase tracking-wider text-zinc-400">Skills</h2>
            <div class="mt-6 grid gap-8 sm:grid-cols-3">
                @foreach($skills as $category => $items)
                    <div>
                        <h3 class="text-sm font-semibold text-white">{{ $category }}</h3>
                        <ul class="mt-3 space-y-2">
                            @foreach($items as $item)
                                <li class="text-sm text-zinc-400">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection