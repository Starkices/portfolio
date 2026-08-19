@extends('layouts.app')

@section('title', 'Contact — ' . config('portfolio.company'))

@section(
    'description',
    'Contact ' . config('portfolio.name') . ' about software projects, development opportunities, collaborations, and ideas.'
)

@section('content')

<section class="mx-auto max-w-3xl px-6 py-20">

    {{-- Header --}}
    <div class="max-w-2xl">
        <p class="font-mono text-sm uppercase tracking-[0.2em] text-amber">
            Get in touch
        </p>

        <h1 class="mt-3 text-4xl font-bold tracking-tight text-white sm:text-5xl">
            Let's build something meaningful.
        </h1>

        <p class="mt-5 text-base leading-7 text-zinc-400">
            Have a project, an opportunity, a collaboration idea, or simply want
            to start a conversation? Send me a message and I'll get back to you.
        </p>
    </div>


    {{-- Success message --}}
    @if(session('status'))
        <div
            role="status"
            class="mt-8 rounded-xl border border-teal/30 bg-teal/10 px-5 py-4 text-sm text-teal"
        >
            <div class="flex items-start gap-3">
                <span class="mt-0.5 shrink-0">✓</span>

                <p>
                    {{ session('status') }}
                </p>
            </div>
        </div>
    @endif


    {{-- Failure message --}}
    @if(session('error'))
        <div
            role="alert"
            class="mt-8 rounded-xl border border-red-500/30 bg-red-500/10 px-5 py-4 text-sm text-red-300"
        >
            <div class="flex items-start gap-3">
                <span class="mt-0.5 shrink-0">!</span>

                <p>
                    {{ session('error') }}
                </p>
            </div>
        </div>
    @endif


    {{-- Validation summary --}}
    @if($errors->any())
        <div
            role="alert"
            class="mt-8 rounded-xl border border-red-500/30 bg-red-500/10 px-5 py-4"
        >
            <p class="text-sm font-semibold text-red-300">
                Please correct the following:
            </p>

            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-300">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Contact form --}}
    <form
        id="contact-form"
        action="{{ route('contact.store') }}"
        method="POST"
        class="mt-10 space-y-6"
        novalidate
    >
        @csrf


        {{-- Name --}}
        <div>
            <label
                for="name"
                class="block text-sm font-medium text-zinc-200"
            >
                Name
            </label>

            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                autocomplete="name"
                required
                maxlength="255"
                aria-describedby="name-error"
                @error('name') aria-invalid="true" @enderror
                class="mt-2 w-full rounded-xl border border-ink-border bg-ink-surface px-4 py-3 text-white outline-none transition placeholder:text-zinc-600 focus:border-amber focus:ring-2 focus:ring-amber/10 @error('name') border-red-500/60 @enderror"
                placeholder="Your name"
            >

            @error('name')
                <p
                    id="name-error"
                    class="mt-2 text-sm text-red-400"
                >
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Email --}}
        <div>
            <label
                for="email"
                class="block text-sm font-medium text-zinc-200"
            >
                Email
            </label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                autocomplete="email"
                required
                maxlength="255"
                aria-describedby="email-error"
                @error('email') aria-invalid="true" @enderror
                class="mt-2 w-full rounded-xl border border-ink-border bg-ink-surface px-4 py-3 text-white outline-none transition placeholder:text-zinc-600 focus:border-amber focus:ring-2 focus:ring-amber/10 @error('email') border-red-500/60 @enderror"
                placeholder="you@example.com"
            >

            @error('email')
                <p
                    id="email-error"
                    class="mt-2 text-sm text-red-400"
                >
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Subject --}}
        <div>
            <label
                for="subject"
                class="block text-sm font-medium text-zinc-200"
            >
                Subject
            </label>

            <input
                type="text"
                name="subject"
                id="subject"
                value="{{ old('subject') }}"
                autocomplete="off"
                required
                maxlength="255"
                aria-describedby="subject-error"
                @error('subject') aria-invalid="true" @enderror
                class="mt-2 w-full rounded-xl border border-ink-border bg-ink-surface px-4 py-3 text-white outline-none transition placeholder:text-zinc-600 focus:border-amber focus:ring-2 focus:ring-amber/10 @error('subject') border-red-500/60 @enderror"
                placeholder="What would you like to discuss?"
            >

            @error('subject')
                <p
                    id="subject-error"
                    class="mt-2 text-sm text-red-400"
                >
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Message --}}
        <div>
            <div class="flex items-center justify-between gap-4">
                <label
                    for="message"
                    class="block text-sm font-medium text-zinc-200"
                >
                    Message
                </label>

                <span
                    id="message-count"
                    class="text-xs text-zinc-600"
                >
                    0 / 2000
                </span>
            </div>

            <textarea
                name="message"
                id="message"
                rows="7"
                maxlength="2000"
                required
                aria-describedby="message-error message-count"
                @error('message') aria-invalid="true" @enderror
                class="mt-2 w-full resize-y rounded-xl border border-ink-border bg-ink-surface px-4 py-3 text-white outline-none transition placeholder:text-zinc-600 focus:border-amber focus:ring-2 focus:ring-amber/10 @error('message') border-red-500/60 @enderror"
                placeholder="Tell me a little about your project, idea, or opportunity..."
            >{{ old('message') }}</textarea>

            @error('message')
                <p
                    id="message-error"
                    class="mt-2 text-sm text-red-400"
                >
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Submit --}}
        <div class="pt-2">

            <button
                id="contact-submit"
                type="submit"
                class="inline-flex min-w-[150px] items-center justify-center gap-2 rounded-xl bg-amber px-6 py-3 text-sm font-semibold text-ink transition hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-amber focus:ring-offset-2 focus:ring-offset-ink disabled:cursor-not-allowed disabled:opacity-60"
            >

                {{-- Loading spinner --}}
                <svg
                    id="contact-spinner"
                    class="hidden h-4 w-4 animate-spin"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4"
                    ></circle>

                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                    ></path>
                </svg>


                {{-- Normal text --}}
                <span id="contact-submit-text">
                    Send message
                </span>

            </button>

            <p
                id="contact-submit-status"
                class="mt-3 hidden text-xs text-zinc-500"
                aria-live="polite"
            >
                Sending your message securely…
            </p>

        </div>

    </form>


    {{-- Direct contact --}}
    <div class="mt-16 border-t border-ink-border pt-8">

        <p class="font-mono text-sm font-semibold uppercase  text-amber">
            Prefer to reach me directly?
        </p>

        <div class="mt-4 flex flex-wrap gap-x-6 gap-y-3 text-sm">

            <a
                href="mailto:{{ config('portfolio.contact_email') }}"
                class=" text-amber transition hover:underline"
            >
                Email
            </a>

            <a
                href="{{ config('portfolio.github') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="text-zinc-400 transition hover:text-white"
            >
                GitHub
            </a>

            <a
                href="{{ config('portfolio.linkedin') }}"
                target="_blank"
                rel="noopener noreferrer"
                class="text-zinc-400 transition hover:text-white"
            >
                LinkedIn
            </a>

        </div>

    </div>

</section>


{{-- Contact form behavior --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('contact-form');
        const submitButton = document.getElementById('contact-submit');
        const submitText = document.getElementById('contact-submit-text');
        const spinner = document.getElementById('contact-spinner');
        const submitStatus = document.getElementById('contact-submit-status');
        const message = document.getElementById('message');
        const messageCount = document.getElementById('message-count');

        if (!form || !submitButton) {
            return;
        }

        /*
         * Message character counter
         */
        const updateMessageCount = () => {
            if (!message || !messageCount) {
                return;
            }

            messageCount.textContent = `${message.value.length} / 2000`;
        };

        updateMessageCount();

        message?.addEventListener('input', updateMessageCount);


        /*
         * Prevent duplicate submissions.
         */
        let submitting = false;

        form.addEventListener('submit', (event) => {

            if (submitting) {
                event.preventDefault();
                return;
            }

            submitting = true;

            submitButton.disabled = true;
            submitButton.setAttribute('aria-disabled', 'true');

            spinner.classList.remove('hidden');

            submitText.textContent = 'Sending…';

            submitStatus.classList.remove('hidden');

            /*
             * Prevent the browser from navigating away before
             * the normal Laravel form submission happens.
             *
             * We intentionally do NOT use preventDefault().
             */
        });
    });
</script>

@endsection