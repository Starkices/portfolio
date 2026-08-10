<header class="border-b border-ink-border" x-data="{ open: false }">
    <div class="mx-auto max-w-5xl px-6">
        <div class="flex h-16 items-center justify-between">
            <a href="{{ route('home') }}" class="font-mono text-sm font-semibold tracking-tight text-white">
                wisdom<span class="text-amber">.</span>dev
            </a>

            <nav class="hidden items-center gap-8 md:flex">
                <a href="{{ route('home') }}" class="text-sm transition-colors {{ request()->routeIs('home') ? 'text-white' : 'text-zinc-300 hover:text-white' }}">Home</a>
                <a href="{{ route('about') }}" class="text-sm transition-colors {{ request()->routeIs('about') ? 'text-white' : 'text-zinc-300 hover:text-white' }}">About</a>
                <a href="{{ route('projects.index') }}" class="text-sm transition-colors {{ request()->routeIs('projects.*') ? 'text-white' : 'text-zinc-300 hover:text-white' }}">Projects</a>
                <a href="{{ route('contact.create') }}" class="rounded-md border border-amber px-4 py-1.5 text-sm text-amber transition-colors hover:bg-amber hover:text-ink">Contact</a>
            </nav>

            <button @click="open = !open" class="text-zinc-300 md:hidden" aria-label="Toggle menu">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <nav x-show="open" x-cloak class="flex flex-col gap-4 pb-6 md:hidden">
            <a href="{{ route('home') }}" class="text-sm text-zinc-300 hover:text-white">Home</a>
            <a href="{{ route('about') }}" class="text-sm text-zinc-300 hover:text-white">About</a>
            <a href="{{ route('projects.index') }}" class="text-sm text-zinc-300 hover:text-white">Projects</a>
            <a href="{{ route('contact.create') }}" class="text-sm text-amber">Contact</a>
        </nav>
    </div>
</header>
