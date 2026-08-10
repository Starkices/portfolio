@extends('layouts.app')

@section('title', 'About — Wisdom Ogheneobrozie');

@section('content')

<section class="mx-auto max-w-3xl px-6 py-20">
    <h1 class="font-mono text-3xl font-bold text-white">About</h1>

    <div class="mt-8 space-y-5 leading-relaxed text-zinc-300">
        <p>
            I'm a self-taught software developer from Delta State, Nigeria, building toward founding
            <span class="text-white">STARKICES</span> — a software development company focused on solving real
            problems, not chasing attention.
        </p>
        <p>
            I work primarily in PHP and MySQL, and I'm actively building toward production-level Laravel
            projects. So far I've built a discussion forum application, an online quiz/test portal, a
            cooperative management system, and a dynamic email/PDF template system. I'm also studying
            cybersecurity, Linux, and networking, because I want to build things that are secure by default,
            not as an afterthought.
        </p>
        <p>
            Before development, I worked in business centres and a graphic design and printing environment,
            including hands-on AI content creation experience — a background that shaped how I evaluate
            tools: less about the hype, more about what actually solves the problem.
        </p>
        <p>
            I believe in building through consistency and depth over noise. I'm not chasing visibility —
            I'm building value, one shipped project at a time.
        </p>
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
</section>

@endsection
