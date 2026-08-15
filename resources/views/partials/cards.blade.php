@foreach($projects as $project)
    <x-project-card :project="$project" />
@endforeach