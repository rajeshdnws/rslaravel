<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class AboutUsSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => '/about-us/'],
            [
                'title' => 'About RS Orange Tech',
                'template' => 'about',
                'status' => 'published',
                'excerpt' => 'We are a forward-thinking digital agency combining human creativity with modern technologies to build scalable, premium software solutions.',
                'content' => '
<div class="about-grid">
    <div class="about-card">
        <h3>Our Mission</h3>
        <p>To empower growing businesses by delivering enterprise-grade web and mobile applications without the enterprise bloat. We believe in writing clean, scalable code that solves real-world problems.</p>
    </div>
    <div class="about-card">
        <h3>Our Vision</h3>
        <p>To become the leading digital innovation partner for startups and SMEs, recognized for our uncompromising commitment to quality, performance, and user experience.</p>
    </div>
</div>

<h2 class="mt-5 mb-4">Why Choose Us?</h2>
<ul class="premium-list">
    <li><strong>Uncompromising Quality:</strong> Every project we build undergoes rigorous testing and peer reviews.</li>
    <li><strong>Modern Stack:</strong> We utilize Laravel, Vue, Next.js, and Tailwind to ensure future-proof products.</li>
    <li><strong>Transparent Communication:</strong> You are always in the loop with dedicated project management channels.</li>
    <li><strong>Post-Launch Support:</strong> We don’t just launch and leave. We maintain, scale, and optimize your software.</li>
</ul>

<h2 class="mt-5 mb-4">By the Numbers</h2>
<div class="stats-grid">
    <div class="stat-item">
        <h4>150+</h4>
        <p>Projects Delivered</p>
    </div>
    <div class="stat-item">
        <h4>50+</h4>
        <p>Happy Clients</p>
    </div>
    <div class="stat-item">
        <h4>99%</h4>
        <p>Client Retention</p>
    </div>
    <div class="stat-item">
        <h4>10+</h4>
        <p>Years Experience</p>
    </div>
</div>
',
                'meta_title' => 'About Us - RS Orange Tech',
                'meta_description' => 'Learn about RS Orange Tech, our mission, vision, and the human-centric approach we take to software development.',
            ]
        );
    }
}
