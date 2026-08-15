@extends('layouts.app')

@section('title', 'Projects — ' . config('portfolio.name'))

@section('description', 'Selected software projects and systems built by ' . config('portfolio.name') . '.')

@section('content')

    <section class="relative overflow-hidden border-b border-ink-border">

        {{-- Ambient glow --}}
        <div
            aria-hidden="true"
            class="pointer-events-none absolute -right-40 top-0 h-[32rem] w-[32rem] rounded-full bg-amber/12 blur-[120px]"
        ></div>

        <div class="relative mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">

            <div class="max-w-4xl">

                <div class="mb-6 flex items-center gap-3">
                    <span class="h-px w-8 bg-amber"></span>

                    <span class="font-mono text-xs font-semibold uppercase tracking-[0.2em] text-amber">
                        Projects
                    </span>
                </div>

                <h1 class="text-5xl font-extrabold tracking-[-0.04em] text-white sm:text-6xl lg:text-7xl">
                    Systems, experiments
                    <span class="text-white/30">&amp; software.</span>
                </h1>

                <p class="mt-7 max-w-2xl text-base leading-8 text-white/50 sm:text-lg">
                    A collection of software projects built while developing
                    practical experience across PHP, Laravel, databases,
                    application architecture, and web development.
                </p>

            </div>

        </div>

    </section>


    <section class="py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div
            id="projects-grid"
            class="grid gap-10 lg:grid-cols-2"
        >
            @forelse($projects as $project)

                <x-project-card :project="$project" />

            @empty
                <div class="lg:col-span-2 rounded-2xl border border-dashed border-ink-border p-16 text-center">

                    <p class="font-mono text-xs uppercase tracking-[0.2em] text-white/30">
                        No projects available
                    </p>

                </div>

            @endforelse
        </div>
        @if($projects->hasMorePages())
             <div
                 id="load-more-container"
                 class="mt-14 flex justify-center"
             >
                 <button
                     id="load-more-projects"
                     type="button"
                     data-next-page="{{ $projects->currentPage() + 1 }}"
                     class="group inline-flex items-center gap-3 rounded-lg border border-ink-border bg-ink-surface px-6 py-3 font-mono text-xs font-semibold uppercase tracking-wider text-white/70 transition hover:border-white/20 hover:text-white disabled:cursor-not-allowed disabled:opacity-50"
                 >
                     <span id="load-more-label">
                         Load more projects
                     </span>
 
                     <span
                         id="load-more-spinner"
                         class="hidden h-4 w-4 animate-spin rounded-full border-2 border-white/20 border-t-amber"
                     ></span>
 
                     <span
                         id="load-more-arrow"
                         aria-hidden="true"
                     >
                         ↓
                     </span>
                 </button>
             </div>
         @endif
    </div>
    </section>

@endsection

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const button = document.getElementById('load-more-projects');

            if (!button) {
                return;
            }

            const grid = document.getElementById('projects-grid');
            const container = document.getElementById('load-more-container');
            const label = document.getElementById('load-more-label');
            const spinner = document.getElementById('load-more-spinner');
            const arrow = document.getElementById('load-more-arrow');

            let nextPage = Number(button.dataset.nextPage);
            let loading = false;


            button.addEventListener('click', async () => {

                if (loading) {
                    return;
                }

                loading = true;
                button.disabled = true;

                label.textContent = 'Loading...';
                spinner.classList.remove('hidden');
                arrow.classList.add('hidden');


                try {

                    const url = new URL(
                        @json(route('projects.loadMore')),
                        window.location.origin
                    );

                    url.searchParams.set('page', nextPage);


                    const response = await fetch(url, {
                        method: 'GET',

                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'text/html',
                        },
                    });


                    if (!response.ok) {
                        throw new Error(
                            `Request failed with status ${response.status}`
                        );
                    }


                    const html = await response.text();


                    /*
                    * Laravel returns ONLY the new project cards.
                    * Nothing else should be inserted into the page.
                    */
                    grid.insertAdjacentHTML('beforeend', html);


                    /*
                    * Laravel's paginator tells us whether another
                    * page exists through the standard pagination URL.
                    */
                    const nextUrl = response.headers.get('X-Next-Page-Url');


                    if (nextUrl) {

                        const nextUrlObject = new URL(
                            nextUrl,
                            window.location.origin
                        );

                        nextPage = Number(
                            nextUrlObject.searchParams.get('page')
                        );

                        button.dataset.nextPage = nextPage;

                        label.textContent = 'Load more projects';

                        button.disabled = false;

                    } else {

                        /*
                        * There are no more projects.
                        * Remove the entire button container.
                        */
                        container.remove();
                    }


                } catch (error) {

                    console.error(
                        'Failed to load more projects:',
                        error
                    );

                    label.textContent = 'Try again';

                    button.disabled = false;


                } finally {

                    loading = false;

                    spinner.classList.add('hidden');
                    arrow.classList.remove('hidden');

                }

            });
        });
    </script>

@endpush