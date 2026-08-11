
    @foreach($featuredProjects as $project)
        <a href="{{ route('projects.show', $project) }}" class="group relative w-full shrink-0 snap-start overflow-hidden rounded-2xl border border-ink-border bg-ink-surface transition duration-300 hover:-translate-y-1 hover:border-white/15 md:w-[calc(50%-12px)]">

            {{-- Project visual --}}
            <div class="relative aspect-[16/9] overflow-hidden border-b border-ink-border">
                <div aria-hidden="true" class="absolute -right-24 -top-24 h-64 w-64 rounded-full bg-amber/5 blur-[90px] transition duration-500 group-hover:bg-amber/10"></div>

                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <div class="font-mono text-5xl font-bold tracking-tighter text-white/[0.06] transition duration-500 group-hover:text-white/[0.10] sm:text-7xl">
                            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <p class="mt-2 font-mono text-[10px] uppercase tracking-[0.3em] text-white/20">
                            {{ $project->status }}
                        </p>
                    </div>
                </div>

                <div class="absolute left-5 top-5">
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-ink/80 px-3 py-1.5 font-mono text-[10px] font-medium uppercase tracking-wider text-white/60 backdrop-blur">
                        <span class="h-1.5 w-1.5 rounded-full bg-teal"></span>
                        {{ $project->status }}
                    </span>
                </div>
            </div>

            {{-- Project information --}}
            <div class="p-6 sm:p-8">
                <div class="flex items-start justify-between gap-6">
                    <div>
                        <p class="font-mono text-xs uppercase tracking-[0.15em] text-white/30">
                            Project {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                        </p>
                        <h3 class="mt-2 text-2xl font-bold tracking-tight text-white transition group-hover:text-amber sm:text-3xl">
                            {{ $project->title }}
                        </h3>
                    </div>
                    <span aria-hidden="true" class="text-xl text-white/20 transition duration-300 group-hover:-translate-y-1 group-hover:translate-x-1 group-hover:text-amber">
                        ↗
                    </span>
                </div>

                <p class="mt-5 max-w-xl text-sm leading-7 text-white/50 sm:text-base">
                    {{ $project->summary }}
                </p>

                @if($project->tech_stack)
                    <div class="mt-7 flex flex-wrap gap-2">
                        @foreach($project->tech_stack as $technology)
                            <span class="rounded-md border border-ink-border bg-ink px-2.5 py-1 font-mono text-[10px] uppercase tracking-wider text-white/40">
                                {{ $technology }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </a>
    @endforeach
