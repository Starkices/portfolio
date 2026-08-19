<header
    class="sticky top-0 z-50 border-b border-ink-border bg-ink/90 backdrop-blur-xl"
    x-data="{ open: false }"
    @keydown.escape.window="open = false"
>
    <div class="mx-auto max-w-5xl px-6">

        {{-- Accessibility --}}
        <a
            href="#main-content"
            class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[60] focus:rounded-md focus:bg-amber focus:px-4 focus:py-2 focus:text-sm focus:font-semibold focus:text-ink"
        >
            Skip to content
        </a>

        <div class="flex h-16 items-center justify-between">

            {{-- Brand --}}
            <a
                href="{{ route('home') }}"
                class="group flex items-center"
                aria-label="{{ config('portfolio.company') }} home"
            >
                <img
                    src="{{ asset('media/icon.png') }}"
                    alt="{{ config('portfolio.company') }} logo"
                    class="h-10 w-10 rounded-full object-cover transition duration-300 group-hover:scale-105"
                >
            </a>


            {{-- Desktop navigation --}}
            <nav
                class="hidden items-center gap-8 md:flex"
                aria-label="Primary navigation"
            >

                <a
                    href="{{ route('home') }}"
                    @class([
                        'relative py-2 text-sm transition-colors',
                        'text-white' => request()->routeIs('home'),
                        'text-zinc-400 hover:text-white' => ! request()->routeIs('home'),
                    ])
                >
                    Home

                    @if(request()->routeIs('home'))
                        <span
                            class="absolute inset-x-0 -bottom-[1px] mx-auto h-px w-4 bg-amber"
                            aria-hidden="true"
                        ></span>
                    @endif
                </a>


                <a
                    href="{{ route('about') }}"
                    @class([
                        'relative py-2 text-sm transition-colors',
                        'text-white' => request()->routeIs('about'),
                        'text-zinc-400 hover:text-white' => ! request()->routeIs('about'),
                    ])
                >
                    About

                    @if(request()->routeIs('about'))
                        <span
                            class="absolute inset-x-0 -bottom-[1px] mx-auto h-px w-4 bg-amber"
                            aria-hidden="true"
                        ></span>
                    @endif
                </a>


                <a
                    href="{{ route('projects.index') }}"
                    @class([
                        'relative py-2 text-sm transition-colors',
                        'text-white' => request()->routeIs('projects.*'),
                        'text-zinc-400 hover:text-white' => ! request()->routeIs('projects.*'),
                    ])
                >
                    Projects

                    @if(request()->routeIs('projects.*'))
                        <span
                            class="absolute inset-x-0 -bottom-[1px] mx-auto h-px w-4 bg-amber"
                            aria-hidden="true"
                        ></span>
                    @endif
                </a>


                <a
                    href="{{ route('contact.create') }}"
                    @class([
                        'rounded-md border px-4 py-1.5 text-sm transition-colors',
                        'border-amber bg-amber text-ink' => request()->routeIs('contact.*'),
                        'border-ink-border text-amber hover:bg-amber hover:text-ink' => ! request()->routeIs('contact.*'),
                    ])
                >
                    Contact
                </a>

            </nav>


            {{-- Mobile menu button --}}
            <button
                type="button"
                @click="open = !open"
                :aria-expanded="open.toString()"
                aria-controls="mobile-navigation"
                aria-label="Toggle navigation menu"
                class="inline-flex items-center justify-center rounded-md p-2 text-zinc-300 transition hover:bg-white/5 hover:text-white focus:outline-none focus:ring-2 focus:ring-amber md:hidden"
            >
                <svg
                    x-show="!open"
                    x-cloak
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>

                <svg
                    x-show="open"
                    x-cloak
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 6l12 12M18 6L6 18"
                    />
                </svg>
            </button>

        </div>


        {{-- Mobile navigation --}}
        <nav
            id="mobile-navigation"
            x-show="open"
            x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            @click="open = false"
            class="border-t border-ink-border py-5 md:hidden"
            aria-label="Mobile navigation"
        >

            <div class="flex flex-col gap-2">

                <a
                    href="{{ route('home') }}"
                    @class([
                        'rounded-md px-3 py-2.5 text-sm transition-colors',
                        'bg-white/5 text-white' => request()->routeIs('home'),
                        'text-zinc-400 hover:bg-white/5 hover:text-white' => ! request()->routeIs('home'),
                    ])
                >
                    Home
                </a>

                <a
                    href="{{ route('about') }}"
                    @class([
                        'rounded-md px-3 py-2.5 text-sm transition-colors',
                        'bg-white/5 text-white' => request()->routeIs('about'),
                        'text-zinc-400 hover:bg-white/5 hover:text-white' => ! request()->routeIs('about'),
                    ])
                >
                    About
                </a>

                <a
                    href="{{ route('projects.index') }}"
                    @class([
                        'rounded-md px-3 py-2.5 text-sm transition-colors',
                        'bg-white/5 text-white' => request()->routeIs('projects.*'),
                        'text-zinc-400 hover:bg-white/5 hover:text-white' => ! request()->routeIs('projects.*'),
                    ])
                >
                    Projects
                </a>

                <a
                    href="{{ route('contact.create') }}"
                    @class([
                        'mt-2 rounded-md border px-3 py-2.5 text-sm transition-colors',
                        'border-amber bg-amber text-ink' => request()->routeIs('contact.*'),
                        'border-amber text-amber hover:bg-amber hover:text-ink' => ! request()->routeIs('contact.*'),
                    ])
                >
                    Contact
                </a>

            </div>

        </nav>

    </div>
</header>