<?php
use App\Models\Page;

$updates = [
    '/ecommerce-development/' => [
        'meta_title' => 'Ecommerce Development Company | RS Orange Tech',
        'meta_description' => 'Boost your sales with our custom ecommerce development services. We build high-converting online stores using modern, scalable technologies.',
        'title' => 'Ecommerce Website Development Services',
    ],
    '/laravel-development/' => [
        'meta_title' => 'Web Development Company in Noida | RS Orange Tech',
        'meta_description' => 'Professional web development services in Noida. We build fast, secure, and SEO-optimized custom websites and web applications for modern businesses.',
        'title' => 'Web Development Services for Modern Businesses',
    ],
    '/mobile-app-development/' => [
        'meta_title' => 'Mobile App Development Company | RS Orange Tech',
        'meta_description' => 'Engaging, native and cross-platform mobile app development services for iOS and Android. Turn your idea into a premium mobile experience.',
        'title' => 'Premium Mobile App Development',
    ],
    '/ai-automation/' => [
        'meta_title' => 'AI Development & Automation Agency | RS Orange Tech',
        'meta_description' => 'Leverage the power of Artificial Intelligence. We provide AI automation and custom AI development services to streamline your business operations.',
        'title' => 'AI Development & Business Automation',
    ],
    '/services/' => [
        'meta_title' => 'Custom Web, App & Software Development Services | RS Orange Tech',
        'meta_description' => 'Explore RS Orange Tech\'s premium digital services: custom websites, ecommerce stores, mobile apps, and AI automation tailored for your business growth.',
    ]
];

foreach ($updates as $slug => $data) {
    Page::where('slug', $slug)->update($data);
}
echo "Success\n";
