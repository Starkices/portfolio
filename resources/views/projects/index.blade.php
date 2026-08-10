<h1>Projects</h1>

@foreach ($projects as $project)
    <article>
        <h2>{{ $project->title }}</h2>

        <p>{{ $project->summary }}</p>

        <a href="{{ route('projects.show', $project) }}">
            View Project
        </a>
    </article>
@endforeach