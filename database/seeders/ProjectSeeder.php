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
            
            [
                'title' => 'Dynamic Email & PDF Template System',
                'slug' => 'dynamic-email-pdf-template-system',
                'summary' => 'A reusable Laravel-based template system for managing dynamic email and PDF content, reducing hardcoded document and communication layouts through database-driven templates and configurable placeholders.',
                'description' =>"The Dynamic Email & PDF Template System is a reusable Laravel-based system designed to make email communication and document generation more flexible, maintainable, and data-driven.\n\n
                Instead of hardcoding the content and structure of every email or PDF inside individual application features, the system introduces a template-driven approach where reusable templates can be managed and populated dynamically.\n\n
                The system was designed around the idea that email and document content should be separated from application logic. This makes it possible to modify communication and document layouts without repeatedly changing the underlying application code.\n\n
                For email templates, the system provides a structured approach to managing reusable email content, including template subjects and body content. Templates can be stored and managed through the application and prepared for use by different parts of a larger system.\n\n
                A major part of the system's design is dynamic placeholder support. Administrators can define placeholders that can later be used inside template content. When a template is processed, those placeholders can be replaced with the appropriate data, allowing the same template to generate personalized content for different users, records, or application events.\n\n
                This approach creates a separation between template presentation and application data. Instead of creating a separate hardcoded email for every situation, a reusable template can contain dynamic values that are resolved when the message is generated.\n\n
                The same template-oriented concept extends to PDF generation. Rather than creating individual document layouts directly inside application logic, the system provides a reusable foundation for producing dynamically populated PDF documents from structured templates.\n\n
                This makes the system suitable for applications that need to generate different types of documents from changing database records while maintaining consistent document presentation.",
                'tech_stack' => [
                    'Laravel',
                    'PHP',
                    'MySQL',
                    'Blade',
                    'DomPDF',
                    'Livewire',
                    'Dynamic Templates',
                    'Placeholder System',
                    'PDF Generation',
                ],
                'live_url' => null,
                'github_url' => null,
                'status' => 'completed',
                'featured' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
