<?php

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('the application returns a successful response', function () {
    Project::create([
        'title' => 'Students Discussion Forum',
        'slug' => 'students-discussion-forum',
        'summary' => 'A database-driven discussion forum built with raw PHP and MySQL.',
        'description' => 'A functional discussion forum project.',
        'tech_stack' => [
            'PHP',
            'MySQL',
            'HTML',
            'CSS',
            'Git',
            'GitHub',
        ],
        'live_url' => 'https://starkices-dforum.freedev.app',
        'github_url' => 'https://github.com/Starkices/Discussion-forum',
        'status' => 'completed',
        'featured' => true,
        'sort_order' => 1,
    ]);

    $response = $this->get('/');

    $response
        ->assertOk()
        ->assertSee('Students Discussion Forum');
});