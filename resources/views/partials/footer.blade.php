<footer class="border-t border-ink-border">
    <div class="mx-auto max-w-5xl px-6 py-10">

        <div class="flex flex-col gap-8 md:flex-row md:items-center md:justify-between">

            <div class="max-w-md">

                <a
                    href="{{ route('home') }}"
                    class="font-mono text-sm font-semibold tracking-tight text-white"
                >
                    {{ config('portfolio.company') }}
                    <span class="text-amber">.</span>
                </a>

                <p class="mt-2 text-sm leading-6 text-zinc-400">
                    {{ config('portfolio.tagline') }}
                </p>

            </div>


            <div
                class="flex items-center gap-5 text-zinc-500"
                aria-label="Social and contact links"
            >

                {{-- GitHub --}}
                <a
                    href="{{ config('portfolio.github') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="GitHub"
                    title="GitHub"
                    class="rounded-md p-2 transition-colors hover:bg-white/5 hover:text-white focus:outline-none focus:ring-2 focus:ring-amber"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="h-5 w-5"
                        aria-hidden="true"
                    >
                        <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.56v-2.17c-3.2.7-3.87-1.54-3.87-1.54-.53-1.33-1.3-1.69-1.3-1.69-1.04-.71.08-.7.08-.7 1.15.08 1.75 1.18 1.75 1.18 1.02 1.75 2.67 1.25 3.32.96.1-.74.4-1.25.73-1.54-2.55-.29-5.23-1.28-5.23-5.69 0-1.26.45-2.29 1.18-3.1-.12-.29-.51-1.46.11-3.05 0 0 .96-.31 3.14 1.18a10.9 10.9 0 0 1 5.72 0c2.18-1.49 3.14-1.18 3.14-1.18.62 1.59.23 2.76.11 3.05.73.81 1.18 1.84 1.18 3.1 0 4.42-2.69 5.4-5.25 5.69.41.36.78 1.08.78 2.18v3.23c0 .31.21.67.8.56A11.51 11.51 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5Z"/>
                    </svg>
                </a>


                {{-- LinkedIn --}}
                <a
                    href="{{ config('portfolio.linkedin') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="LinkedIn"
                    title="LinkedIn"
                    class="rounded-md p-2 transition-colors hover:bg-white/5 hover:text-white focus:outline-none focus:ring-2 focus:ring-amber"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="h-5 w-5"
                        aria-hidden="true"
                    >
                        <path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.05-1.86-3.05-1.87 0-2.15 1.46-2.15 2.95v5.67H9.32V9h3.42v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.3 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12ZM7.08 20.45H3.52V9h3.56v11.45ZM22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.21 0 22.23 0Z"/>
                    </svg>
                </a>


                {{-- Contact --}}
                <a
                    href="{{ route('contact.create') }}"
                    aria-label="Contact"
                    title="Contact"
                    class="rounded-md p-2 transition-colors hover:bg-white/5 hover:text-white focus:outline-none focus:ring-2 focus:ring-amber"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        class="h-5 w-5"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21.75 7.5v9a2.25 2.25 0 0 1-2.25 2.25H4.5a2.25 2.25 0 0 1-2.25-2.25v-9A2.25 2.25 0 0 1 4.5 5.25h15A2.25 2.25 0 0 1 21.75 7.5Z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m3 6.75 7.53 5.27a2.5 2.5 0 0 0 2.94 0L21 6.75"
                        />
                    </svg>
                </a>

            </div>

        </div>


        <div class="mt-8 border-t border-ink-border pt-5">
            <p class="text-xs text-zinc-500">
                &copy; {{ date('Y') }}
                {{ config('portfolio.company') }}.
                All rights reserved.
            </p>
        </div>

    </div>
</footer>