@extends('layouts.app')

@section('title', 'Contact — ' . config('portfolio.company'))

@section('description', 'Get in touch with ' . config('portfolio.name') . ' about software projects, development opportunities, and collaborations.')

@section('content')

<section class="relative overflow-hidden border-b border-ink-border">

    <div
        aria-hidden="true"
        class="pointer-events-none absolute -right-32 top-20 h-96 w-96 rounded-full bg-amber/5 blur-[120px]"
    ></div>

    <div class="relative mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">

        <div class="max-w-3xl">

            <div class="mb-6 flex items-center gap-3">
                <span class="h-px w-8 bg-amber"></span>

                <span class="font-mono text-xs font-semibold uppercase tracking-[0.2em] text-amber">
                    Contact
                </span>
            </div>

            <h1 class="text-5xl font-extrabold tracking-[-0.04em] text-white sm:text-6xl lg:text-7xl">
                Let's build something
                <span class="text-white/30">worth shipping.</span>
            </h1>

            <p class="mt-7 max-w-2xl text-base leading-8 text-white/50 sm:text-lg">
                Have a project, opportunity, collaboration, or idea?
                Send a message and let's start the conversation.
            </p>

        </div>

    </div>
</section>


<section class="py-20 sm:py-28">

    <div class="mx-auto grid max-w-7xl gap-16 px-6 lg:grid-cols-[1fr_360px] lg:px-8">

        {{-- Form --}}
        <div class="max-w-2xl">

            @if(session('status'))
                <div
                    class="mb-8 rounded-xl border border-teal/20 bg-teal/5 p-5"
                    role="status"
                >
                    <p class="text-sm font-medium text-teal">
                        {{ session('status') }}
                    </p>
                </div>
            @endif


            @if($errors->has('form'))
                <div
                    class="mb-8 rounded-xl border border-red-400/20 bg-red-400/5 p-5"
                    role="alert"
                >
                    <p class="text-sm font-medium text-red-300">
                        {{ $errors->first('form') }}
                    </p>
                </div>
            @endif


            <form
                action="{{ route('contact.store') }}"
                method="POST"
                class="space-y-7"
            >
                @csrf

                {{-- Honeypot --}}
                <div
                    aria-hidden="true"
                    class="absolute left-[-9999px] top-auto h-px w-px overflow-hidden"
                >
                    <label for="website">Website</label>

                    <input
                        type="text"
                        name="website"
                        id="website"
                        tabindex="-1"
                        autocomplete="off"
                    >
                </div>


                {{-- Name --}}
                <div>
                    <label
                        for="name"
                        class="font-mono text-xs font-semibold uppercase tracking-wider text-white/50"
                    >
                        Your name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        required
                        class="mt-3 w-full rounded-xl border border-ink-border bg-ink-surface px-4 py-3.5 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-amber"
                        placeholder="John Doe"
                    >

                    @error('name')
                        <p class="mt-2 text-xs text-red-300">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Email --}}
                <div>
                    <label
                        for="email"
                        class="font-mono text-xs font-semibold uppercase tracking-wider text-white/50"
                    >
                        Email address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                        class="mt-3 w-full rounded-xl border border-ink-border bg-ink-surface px-4 py-3.5 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-amber"
                        placeholder="you@example.com"
                    >

                    @error('email')
                        <p class="mt-2 text-xs text-red-300">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Subject --}}
                <div>
                    <label
                        for="subject"
                        class="font-mono text-xs font-semibold uppercase tracking-wider text-white/50"
                    >
                        Subject
                    </label>

                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        value="{{ old('subject') }}"
                        required
                        class="mt-3 w-full rounded-xl border border-ink-border bg-ink-surface px-4 py-3.5 text-sm text-white outline-none transition placeholder:text-white/20 focus:border-amber"
                        placeholder="Project inquiry"
                    >

                    @error('subject')
                        <p class="mt-2 text-xs text-red-300">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Message --}}
                <div>
                    <label
                        for="message"
                        class="font-mono text-xs font-semibold uppercase tracking-wider text-white/50"
                    >
                        Message
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        rows="7"
                        required
                        class="mt-3 w-full resize-y rounded-xl border border-ink-border bg-ink-surface px-4 py-3.5 text-sm leading-7 text-white outline-none transition placeholder:text-white/20 focus:border-amber"
                        placeholder="Tell me about your project, idea, or opportunity..."
                    >{{ old('message') }}</textarea>

                    @error('message')
                        <p class="mt-2 text-xs text-red-300">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                {{-- Submit --}}
                <button
                    type="submit"
                    class="inline-flex items-center gap-3 rounded-lg bg-amber px-6 py-3.5 font-mono text-xs font-semibold uppercase tracking-wider text-ink transition hover:-translate-y-0.5 hover:bg-amber/90"
                >
                    Send message

                    <span aria-hidden="true">↗</span>
                </button>

            </form>

        </div>


        {{-- Contact information --}}
        <aside class="lg:border-l lg:border-ink-border lg:pl-12">

            <p class="font-mono text-xs font-semibold uppercase tracking-[0.2em] text-amber">
                Direct contact
            </p>

            <div class="mt-8 space-y-8">

                <div>
                    <p class="font-mono text-[10px] uppercase tracking-wider text-white/25">
                        Email
                    </p>

                    <a
                        href="mailto:{{ config('portfolio.contact_email') }}"
                        class="mt-2 block break-all text-sm text-white/70 transition hover:text-amber"
                    >
                        {{ config('portfolio.contact_email') }} <span aria-hidden="true">↗</span>
                    </a>
                </div>


                <div>
                    <p class="font-mono text-[10px] uppercase tracking-wider text-white/25">
                        GitHub
                    </p>

                    <a
                        href="{{ config('portfolio.github') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-2 block text-sm text-white/70 transition hover:text-amber"
                    >
                        {{ config('portfolio.company') }} <span aria-hidden="true">↗</span>
                    </a>
                </div>


                <div>
                    <p class="font-mono text-[10px] uppercase tracking-wider text-white/25">
                        LinkedIn
                    </p>

                    <a
                        href="{{ config('portfolio.linkedin') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-2 block text-sm text-white/70 transition hover:text-amber"
                    >
                        {{ config('portfolio.name') }} <span aria-hidden="true">↗</span>
                    </a>
                </div>

            </div>

        </aside>

    </div>

</section>

@endsection