<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Students Discussion Forum',
                'slug' => 'students-discussion-forum',
                'summary' => 'A full-featured PHP database-driven discussion forum with user accounts and a built-in moderation and reporting system.',
                'description' => "My largest project to date. A School-based discussion forum where Students can create posts, reply to threads, Paticipate in group discussion, edit profile and report content for moderation. Built from the ground up in PHP and MySQL, handling authentication, database relationships, and admin-level moderation tools.\n\nManaging the relationship between the application logic, user sessions, forms, and MySQL database was one of the most challenging parts. Debugging issues across multiple parts of the application also taught me how different components of a web application depend on each other.\n\nI would rebuild the application with Laravel to improve its structure, maintainability, validation, authentication, authorization, and overall security. I would also improve the UI, add stronger moderation features, introduce better testing, strengthen the production deployment workflow, and add more features like private messaging and notifications in the future and other features to increase functionality and user experience.",
                'tech_stack' => ['PHP', 'MySQL', 'HTML', 'CSS', 'Git', 'GitHub', 'Bootstrap'],
                'live_url' => 'https://starkices-dforum.freedev.app',
                'github_url' => 'https://github.com/Starkices/Discussion-forum',
                'status' => 'live',
                'featured' => true,
                'sort_order' => 1,
            ],
            
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
