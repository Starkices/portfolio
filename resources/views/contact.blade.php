@extends('layouts.app')

@section('title', 'Contact — Wisdom Ogheneobrozie')

@section('content')

<section class="mx-auto max-w-2xl px-6 py-20">
    <h1 class="font-mono text-3xl font-bold text-white">Get in touch</h1>
    <p class="mt-3 text-zinc-400">Have a project, an opportunity, or just want to say hi? Send a message.</p>

    @if(session('status'))
        <div class="mt-6 rounded-md border border-teal bg-teal/10 px-4 py-3 text-sm text-teal">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="mt-8 space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm text-zinc-300">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="mt-2 w-full rounded-md border border-ink-border bg-ink-surface px-4 py-2.5 text-white placeholder-zinc-500 focus:border-amber focus:outline-none">
            @error('name') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm text-zinc-300">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="mt-2 w-full rounded-md border border-ink-border bg-ink-surface px-4 py-2.5 text-white placeholder-zinc-500 focus:border-amber focus:outline-none">
            @error('email') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="message" class="block text-sm text-zinc-300">Message</label>
            <textarea name="message" id="message" rows="5"
                class="mt-2 w-full rounded-md border border-ink-border bg-ink-surface px-4 py-2.5 text-white placeholder-zinc-500 focus:border-amber focus:outline-none">{{ old('message') }}</textarea>
            @error('message') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="rounded-md bg-amber px-6 py-2.5 text-sm font-semibold text-ink transition-opacity hover:opacity-90">
            Send message
        </button>
    </form>

    <div class="mt-12 border-t border-ink-border pt-8 text-sm text-zinc-400">
        <p>Prefer email or social? Reach me directly:</p>
        <div class="mt-3 flex gap-6">
            <a href="mailto:info.starkices@gmail.com" class="text-amber hover:underline">Email</a>
            <a href="{{config('portfolio.github')}}" target="_blank" rel="noopener" class="text-amber hover:underline">GitHub</a>
            <a href="{{config('portfolio.linkedin')}}" target="_blank" rel="noopener" class="text-amber hover:underline">LinkedIn</a>
        </div>
    </div>
</section>

@endsection
