<footer class="border-t border-ink-border">
    <div class="mx-auto max-w-5xl px-6 py-10">
        <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
            <div>
                <p class="mt-1 text-sm text-zinc-400">Building toward STARKICES, one shipped project at a time.</p>
            </div>

            <div class="flex gap-6 text-sm text-zinc-400">
                <a href="https://github.com/Starkices" target="_blank" rel="noopener" class="transition-colors hover:text-white">GitHub</a>
                <a href="https://linkedin.com/in/wisdom-ogheneobrozie" target="_blank" rel="noopener" class="transition-colors hover:text-white">LinkedIn</a>
                <a href="{{ route('contact.create') }}" class="transition-colors hover:text-white">Contact</a>
            </div>
        </div>

        <p class="mt-8 text-xs text-zinc-500">&copy; {{ date('Y') }} STARKICES. All rights reserved.</p>
    </div>
</footer>
