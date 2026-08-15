<article
    class="group relative flex flex-col overflow-hidden rounded-2xl border border-ink-border bg-ink-surface transition duration-300 hover:-translate-y-1 hover:border-white/15"
>
    {{-- Visual header --}}
    <div class="relative aspect-[16/9] overflow-hidden border-b border-ink-border">

        <div
            aria-hidden="true"
            class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-amber/5 blur-[90px] transition duration-500 group-hover:bg-amber/10"
        ></div>

        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center">

                <span
                    class="font-mono text-7xl font-bold tracking-[-0.08em] text-white/[0.06] transition duration-500 group-hover:text-white/[0.10] sm:text-8xl"
                >
                    {{ str_pad($project->sort_order, 2, '0', STR_PAD_LEFT) }}
                </span>

                <p class="mt-2 font-mono text-[10px] uppercase tracking-[0.3em] text-white/20">
                    {{ $project->status }}
                </p>

            </div>
        </div>

        <div class="absolute left-5 top-5">

            <span
                class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-ink/80 px-3 py-1.5 font-mono text-[10px] uppercase tracking-wider text-white/50 backdrop-blur"
            >
                <span class="h-1.5 w-1.5 rounded-full bg-teal"></span>

                {{ $project->status }}
            </span>

        </div>

    </div>


    {{-- Project information --}}
    <div class="flex flex-1 flex-col p-6 sm:p-8">

        <div class="flex items-start justify-between gap-5">

            <div>

                <p class="font-mono text-[10px] uppercase tracking-[0.2em] text-white/25">
                    Project {{ str_pad($project->sort_order, 2, '0', STR_PAD_LEFT) }}
                </p>

                <h2 class="mt-2 text-2xl font-bold tracking-tight text-white transition group-hover:text-amber sm:text-3xl">
                    {{ $project->title }}
                </h2>

            </div>

            <span
                aria-hidden="true"
                class="text-xl text-white/20 transition duration-300 group-hover:-translate-y-1 group-hover:translate-x-1 group-hover:text-amber"
            >
                ↗
            </span>

        </div>


        <p class="mt-5 text-sm leading-7 text-white/50 sm:text-base">
            {{ $project->summary }}
        </p>


        {{-- Technologies --}}
        <div class="mt-7 flex flex-wrap gap-2">

            @foreach($project->tech_stack as $technology)

                <span
                    class="rounded-md border border-ink-border bg-ink px-2.5 py-1 font-mono text-[10px] uppercase tracking-wider text-white/40"
                >
                    {{ $technology }}
                </span>

            @endforeach

        </div>


        <div class="mt-auto pt-8">

            <a
                href="{{ route('projects.show', $project->slug) }}"
                class="group/link inline-flex items-center gap-2 font-mono text-xs font-semibold uppercase tracking-wider text-white/60 transition hover:text-amber"
            >
                View case study

                <span
                    aria-hidden="true"
                    class="transition-transform duration-200 group-hover/link:translate-x-1"
                >
                    →
                </span>
            </a>

        </div>

    </div>

</article>