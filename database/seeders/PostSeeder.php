<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $posts = [
            [
                'title' => 'Getting Started with Laravel 13',
                'body' => 'Laravel 13 brings a host of exciting features and improvements. In this post, we explore the new application structure, improved routing system, and the powerful new service container enhancements that make building web applications faster and more enjoyable than ever before.',
                'image' => 'posts/laravel-13.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Building REST APIs with Laravel Sanctum',
                'body' => 'Sanctum provides a featherweight authentication system for SPAs, mobile applications, and simple token-based APIs. In this guide, we walk through setting up token-based authentication, protecting routes, and handling token scopes for a fully secured REST API.',
                'image' => 'posts/sanctum-api.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Writing Better Tests with Pest 4',
                'body' => 'Pest 4 introduces a cleaner syntax, powerful datasets, and built-in architecture testing. This post covers how to write expressive feature and unit tests, use higher-order expectations, and leverage the new type coverage plugin to keep your codebase healthy.',
                'image' => 'posts/pest-testing.jpg',
                'status' => 'published',
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'Mastering Eloquent Relationships',
                'body' => 'Eloquent makes working with database relationships elegant and intuitive. We dive deep into hasOne, hasMany, belongsTo, belongsToMany, and polymorphic relationships, covering eager loading strategies and how to avoid N+1 query problems in production applications.',
                'image' => null,
                'status' => 'draft',
                'published_at' => null,
            ],
            [
                'title' => 'Deploying Laravel Apps to Laravel Cloud',
                'body' => 'Laravel Cloud is the fastest way to deploy and scale Laravel applications. This post walks through connecting your repository, configuring environments, setting up queues and scheduled tasks, and monitoring your application health from the Cloud dashboard.',
                'image' => 'posts/laravel-cloud.jpg',
                'status' => 'published',
                'published_at' => now()->subDay(),
            ],
        ];

        foreach ($posts as $post) {
            Post::create([
                'user_id' => $user->id,
                'slug' => Str::slug($post['title']),
                ...$post,
            ]);
        }
    }
}
