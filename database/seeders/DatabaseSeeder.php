<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MediaItem;
use App\Models\Page;
use App\Models\PortfolioProject;
use App\Models\Post;
use App\Models\SeoEntry;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@rsorangetech.com'],
            [
                'name' => 'RS Orange Tech Admin',
                'password' => Hash::make('password'),
                'role' => 'administrator',
                'status' => 'active',
            ],
        );

        $development = Category::updateOrCreate(
            ['slug' => 'development'],
            ['name' => 'Development', 'type' => 'blog', 'description' => 'Website, app and Laravel development articles.'],
        );

        Category::updateOrCreate(
            ['slug' => 'e-commerce'],
            ['name' => 'E-Commerce', 'type' => 'service', 'description' => 'Online store development and optimization.'],
        );

        Category::updateOrCreate(
            ['slug' => 'technology'],
            ['name' => 'Technology', 'type' => 'technology', 'description' => 'Technology stack and framework documentation.'],
        );

        Page::updateOrCreate(
            ['slug' => '/about-us/'],
            [
                'title' => 'About Us',
                'template' => 'content',
                'status' => 'published',
                'excerpt' => 'Empowering your business to build scalable and future-ready digital experiences.',
                'content' => 'RS Orange Tech builds websites, mobile apps, e-commerce platforms and AI-enabled business tools.',
                'meta_title' => 'About RS Orange Tech',
                'meta_description' => 'Learn about RS Orange Tech and our website, app and software development services.',
            ],
        );

        Page::updateOrCreate(
            ['slug' => '/services/'],
            [
                'title' => 'Services',
                'template' => 'services',
                'status' => 'published',
                'excerpt' => 'Explore web, app, e-commerce, AI and maintenance services.',
                'content' => 'We craft customized, high-performance digital solutions that drive results.',
                'meta_title' => 'Website & App Development Services',
                'meta_description' => 'RS Orange Tech services include Laravel development, web design, e-commerce, CMS and mobile apps.',
            ],
        );

        foreach ([
            [
                'slug' => '/custom-website-development/',
                'title' => 'Custom Website Development',
                'excerpt' => 'High-converting business websites designed for performance, trust and long-term growth.',
                'content' => 'We design and build custom websites that represent your brand, convert leads and support business growth with clean code, SEO-friendly structure and a premium user experience.',
                'meta_title' => 'Custom Website Development Services',
                'meta_description' => 'Custom website development for businesses that need faster growth, better conversion and a premium digital presence.',
            ],
            [
                'slug' => '/laravel-development/',
                'title' => 'Laravel Development',
                'excerpt' => 'Secure, scalable and maintainable Laravel applications for modern businesses.',
                'content' => 'Our Laravel solutions help businesses launch internal tools, booking systems, CRM platforms, SaaS products and custom portals with clean architecture and strong performance.',
                'meta_title' => 'Laravel Development Services',
                'meta_description' => 'Laravel web app development services for business dashboards, portals, internal tools and custom software.',
            ],
            [
                'slug' => '/ecommerce-development/',
                'title' => 'E-commerce Development',
                'excerpt' => 'Online stores engineered to improve user trust, conversions and repeat purchases.',
                'content' => 'We create storefronts and e-commerce experiences that are easy to manage, backed by secure payment flows and designed to increase customer retention and order value.',
                'meta_title' => 'E-commerce Development Services',
                'meta_description' => 'Professional e-commerce website development and optimization for growth-focused online businesses.',
            ],
            [
                'slug' => '/wordpress-development/',
                'title' => 'WordPress Development',
                'excerpt' => 'Flexible and maintainable WordPress solutions tailored to business needs.',
                'content' => 'From business websites to custom plugins and optimizations, we balance flexibility, speed and usability so your WordPress site stays effective and easy to manage.',
                'meta_title' => 'WordPress Development Services',
                'meta_description' => 'Custom WordPress development, CMS setup and optimization for business websites and marketing sites.',
            ],
            [
                'slug' => '/mobile-app-development/',
                'title' => 'Mobile App Development',
                'excerpt' => 'User-friendly mobile experiences built for engagement, convenience and brand trust.',
                'content' => 'We create mobile experiences that fit your business workflow, connect with your audience and help your customers move from discovery to conversion and retention.',
                'meta_title' => 'Mobile App Development Services',
                'meta_description' => 'Mobile app development services for startups, service brands and growing businesses that need digital customer experiences.',
            ],
            [
                'slug' => '/ui-ux-design/',
                'title' => 'UI/UX Design',
                'excerpt' => 'Interfaces built around clarity, trust, movement and conversion goals.',
                'content' => 'Our design process focuses on user journeys, clear messaging and premium visual systems that help visitors understand your value quickly and act confidently.',
                'meta_title' => 'UI/UX Design Services',
                'meta_description' => 'UI/UX design services for modern websites, apps and digital experiences that need stronger engagement and conversion.',
            ],
            [
                'slug' => '/ai-automation/',
                'title' => 'AI Automation',
                'excerpt' => 'Practical AI-powered workflows that save time and improve business efficiency.',
                'content' => 'We help businesses integrate AI tools and automation into daily operations to speed up tasks, improve analytics and reduce repetitive manual work.',
                'meta_title' => 'AI Automation Services',
                'meta_description' => 'AI automation solutions for business workflows, customer support, marketing and process optimization.',
            ],
            [
                'slug' => '/website-maintenance/',
                'title' => 'Website Maintenance',
                'excerpt' => 'Reliable support, updates and performance monitoring for your online presence.',
                'content' => 'Our maintenance plans help your website stay secure, fast and current with regular updates, backups, bug fixes and ongoing performance improvements.',
                'meta_title' => 'Website Maintenance Services',
                'meta_description' => 'Website maintenance and support services to keep your digital presence secure, up to date and high-performing.',
            ],
            [
                'slug' => '/seo-growth/',
                'title' => 'SEO & Growth Strategy',
                'excerpt' => 'Search visibility and conversion-focused growth planning for long-term digital momentum.',
                'content' => 'We align content structure, technical optimization and marketing strategy so your website can attract the right audience and convert them into qualified leads.',
                'meta_title' => 'SEO & Growth Strategy Services',
                'meta_description' => 'SEO and growth strategy services to improve visibility, leads and sustainable digital growth for your business.',
            ],
        ] as $service) {
            Page::updateOrCreate(
                ['slug' => $service['slug']],
                [
                    'title' => $service['title'],
                    'template' => 'services',
                    'status' => 'published',
                    'excerpt' => $service['excerpt'],
                    'content' => $service['content'],
                    'meta_title' => $service['meta_title'],
                    'meta_description' => $service['meta_description'],
                ],
            );
        }

        foreach ([
            [
                'slug' => '/backend-frameworks/',
                'title' => 'Backend & Frameworks',
                'excerpt' => 'Powerful server-side technologies for building scalable and secure applications.',
                'content' => 'Backend frameworks like Laravel, Node.js, Python, Go and Java power modern web applications. We build robust APIs, microservices and business logic that handles complex workflows efficiently.',
                'meta_title' => 'Backend & Frameworks Technology Stack',
                'meta_description' => 'Backend development technologies including Laravel, Node.js, Python, Java and more.',
            ],
            [
                'slug' => '/frontend-frameworks/',
                'title' => 'Frontend & Frameworks',
                'excerpt' => 'Modern JavaScript frameworks and tools for engaging user interfaces.',
                'content' => 'React, Vue, Angular and TypeScript power interactive web experiences. We build responsive, accessible and performance-optimized frontends that deliver conversions.',
                'meta_title' => 'Frontend & Frameworks Technology Stack',
                'meta_description' => 'Frontend technologies including React, Vue, Angular, TypeScript and modern CSS.',
            ],
            [
                'slug' => '/mobile-development-tech/',
                'title' => 'Mobile Development',
                'excerpt' => 'Cross-platform and native mobile solutions for iOS and Android.',
                'content' => 'React Native, Flutter, Swift and Kotlin enable us to build fast, native-feeling mobile apps. We create experiences that engage users and drive retention.',
                'meta_title' => 'Mobile Development Technology Stack',
                'meta_description' => 'Mobile app development technologies including React Native, Flutter, Swift and Kotlin.',
            ],
            [
                'slug' => '/version-control-collaboration/',
                'title' => 'Version Control & Collaboration',
                'excerpt' => 'Tools and workflows for team coordination and code management.',
                'content' => 'Git, GitHub, GitLab and project management tools enable seamless collaboration. We use agile workflows, code reviews and CI/CD pipelines for quality delivery.',
                'meta_title' => 'Version Control & Collaboration Tools',
                'meta_description' => 'Collaboration and version control tools including Git, GitHub, Jira and Confluence.',
            ],
            [
                'slug' => '/web-performance-analytics/',
                'title' => 'Web Performance & Analytics',
                'excerpt' => 'Monitoring and optimization tools to track user behavior and improve speed.',
                'content' => 'Google Analytics, Mixpanel, Lighthouse and Web Vitals help us measure and optimize performance. We focus on metrics that drive business results.',
                'meta_title' => 'Web Performance & Analytics Tools',
                'meta_description' => 'Performance monitoring and analytics tools for measuring user behavior and optimization.',
            ],
            [
                'slug' => '/databases-storage/',
                'title' => 'Databases & Storage',
                'excerpt' => 'Reliable data management solutions for all application needs.',
                'content' => 'PostgreSQL, MongoDB, Firebase and Redis provide flexible data storage. We choose databases that scale with your application and protect your data.',
                'meta_title' => 'Databases & Storage Technology Stack',
                'meta_description' => 'Database and storage solutions including PostgreSQL, MongoDB, Firebase and Redis.',
            ],
            [
                'slug' => '/cms-ecommerce/',
                'title' => 'CMS & E-Commerce',
                'excerpt' => 'Content management and online store platforms for business growth.',
                'content' => 'WordPress, Shopify, Magento and custom CMS solutions. We build platforms that are easy to manage and optimized for sales.',
                'meta_title' => 'CMS & E-Commerce Platforms',
                'meta_description' => 'CMS and e-commerce platforms including WordPress, Shopify, Magento and WooCommerce.',
            ],
            [
                'slug' => '/cloud-devops/',
                'title' => 'Cloud & DevOps',
                'excerpt' => 'Infrastructure and deployment solutions for reliable and scalable applications.',
                'content' => 'AWS, Google Cloud, Azure, Docker and Kubernetes enable fast deployment and auto-scaling. We build infrastructure that supports your growth.',
                'meta_title' => 'Cloud & DevOps Technology Stack',
                'meta_description' => 'Cloud and DevOps technologies including AWS, Google Cloud, Azure, Docker and Kubernetes.',
            ],
            [
                'slug' => '/ai-machine-learning/',
                'title' => 'AI & Machine Learning',
                'excerpt' => 'Intelligent automation and predictive analytics to transform business operations.',
                'content' => 'OpenAI, TensorFlow, PyTorch and LangChain enable AI-powered features. We integrate machine learning to automate workflows and improve decision-making.',
                'meta_title' => 'AI & Machine Learning Technology Stack',
                'meta_description' => 'AI and ML technologies including OpenAI, TensorFlow, PyTorch and LangChain.',
            ],
            [
                'slug' => '/apis-integrations/',
                'title' => 'APIs & Integrations',
                'excerpt' => 'Connect systems and enable seamless data flow between platforms.',
                'content' => 'REST APIs, GraphQL, Stripe, PayPal and third-party integrations. We build scalable APIs and handle complex integrations smoothly.',
                'meta_title' => 'APIs & Integrations Technology Stack',
                'meta_description' => 'API development and integration technologies including REST, GraphQL and payment gateways.',
            ],
            [
                'slug' => '/design-development-tools/',
                'title' => 'Design & Development Tools',
                'excerpt' => 'Software and platforms that power our design and development process.',
                'content' => 'Figma, VS Code, Webpack, Git and Postman are core to our workflow. We use industry-standard tools to deliver quality results efficiently.',
                'meta_title' => 'Design & Development Tools',
                'meta_description' => 'Design and development tools including Figma, VS Code, Git and modern build tools.',
            ],
            [
                'slug' => '/testing-quality/',
                'title' => 'Testing & Quality',
                'excerpt' => 'Testing frameworks and practices to ensure reliable and bug-free code.',
                'content' => 'Jest, Cypress, Selenium and PHPUnit help us catch issues early. We maintain high code quality through automated testing and continuous integration.',
                'meta_title' => 'Testing & Quality Technology Stack',
                'meta_description' => 'Testing and quality assurance tools including Jest, Cypress, Selenium and PHPUnit.',
            ],
            [
                'slug' => '/game-development-3d/',
                'title' => 'Game Development & 3D',
                'excerpt' => 'Game engines and 3D tools for interactive and immersive experiences.',
                'content' => 'Godot, Unity, Blender and Three.js enable us to create engaging 3D experiences and games. We build interactive content that captivates users.',
                'meta_title' => 'Game Development & 3D Technology Stack',
                'meta_description' => 'Game development and 3D technologies including Godot, Unity, Blender and Three.js.',
            ],
            [
                'slug' => '/security-monitoring/',
                'title' => 'Security & Monitoring',
                'excerpt' => 'Security practices and tools to protect applications and user data.',
                'content' => 'SSL/TLS, OAuth2, OWASP and Sentry ensure your application is secure. We implement best practices in authentication, encryption and monitoring.',
                'meta_title' => 'Security & Monitoring Technology Stack',
                'meta_description' => 'Security and monitoring technologies including SSL/TLS, OAuth2 and Sentry.',
            ],
        ] as $tech) {
            Page::updateOrCreate(
                ['slug' => $tech['slug']],
                [
                    'title' => $tech['title'],
                    'template' => 'technology',
                    'status' => 'published',
                    'excerpt' => $tech['excerpt'],
                    'content' => $tech['content'],
                    'meta_title' => $tech['meta_title'],
                    'meta_description' => $tech['meta_description'],
                ],
            );
        }

        Post::updateOrCreate(
            ['slug' => 'laravel-for-business-applications'],
            [
                'category_id' => $development->id,
                'title' => 'Laravel for Business Applications',
                'author' => 'RS Orange Tech',
                'status' => 'draft',
                'excerpt' => 'Why Laravel works well for practical business websites and internal systems.',
                'content' => 'Laravel gives growing businesses a clean framework for secure dashboards, content systems and automation.',
                'meta_title' => 'Laravel for Business Applications',
                'meta_description' => 'A practical guide to using Laravel for business applications.',
            ],
        );

        $portfolioItems = [
            [
                'slug' => 'fortpilot-pro',
                'title' => 'FortPilot Pro',
                'category' => 'AI-Powered Website Security',
                'image' => 'FortPilot.png',
                'excerpt' => 'AI-powered website security that finds vulnerabilities, outdated software and exposed ports in minutes.',
                'description' => 'AI-powered website security that finds vulnerabilities, outdated software and exposed ports in minutes.',
                'tech_stack' => 'Next Js, JavaScript, jQuery, CSS',
                'url' => 'https://rsorangetech.com/fortpilot-pro/',
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'vidyapilot',
                'title' => 'VidyaPilot',
                'category' => 'EdTech Platform',
                'image' => 'vidyapilot-landing.png',
                'excerpt' => 'Learn smarter with AI-powered Olympiad preparation and structured mentoring.',
                'description' => 'VidyaPilot combines live classes, AI-guided doubt solving, mock test intelligence and structured mentoring for Classes 3-12.',
                'tech_stack' => 'Next Js, JavaScript, jQuery, CSS',
                'url' => 'https://rsorangetech.com/vidyapilot/',
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'desi-run-rush',
                'title' => 'Desi Run Rush',
                'category' => 'Game Landing Page',
                'image' => 'desi-run-rush.png',
                'excerpt' => 'A thrilling 3D endless runner with obstacles, coins, traffic and tiger chases.',
                'description' => 'Play Desi Run Rush, a thrilling 3D endless runner with obstacles, coins, traffic and tiger chases.',
                'tech_stack' => 'Node Js, TypeScript, JavaScript, CSS',
                'url' => 'https://rsorangetech.com/desi-run-rush/',
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'wabizflow',
                'title' => 'WaBizFlow',
                'category' => 'SaaS Automation',
                'image' => 'wabizflow.png',
                'excerpt' => 'A powerful CRM, WhatsApp messaging, invoice and automation platform in one place.',
                'description' => 'Manage your CRM, WhatsApp messaging, invoices, payments and automation all in one place.',
                'tech_stack' => 'Node Js, TypeScript, JavaScript, CSS',
                'url' => 'https://wabizflow.com/',
                'featured' => true,
                'sort_order' => 4,
            ],
            [
                'slug' => 'prime-breaks',
                'title' => 'Prime Breaks',
                'category' => 'Travel Platform',
                'image' => 'prime-breaks.png',
                'excerpt' => 'Travel and destination experience crafted for growth, inspiration and better conversions.',
                'description' => 'Glow Beyond the Destination creates innovative experiences that drive growth and success.',
                'tech_stack' => 'Wordpress, PHP, JavaScript, jQuery, CSS',
                'url' => 'https://prime-breaks.co.uk/',
                'featured' => true,
                'sort_order' => 5,
            ],
            [
                'slug' => 'little-steps-login',
                'title' => 'LittleSteps Login',
                'category' => 'E-Commerce',
                'image' => 'little-steps.png',
                'excerpt' => 'A shopping app experience with secure payments, fast delivery and smooth browsing.',
                'description' => 'Shopping App offers easy online shopping with secure payments, fast delivery, product deals and smooth browsing experience.',
                'tech_stack' => 'Laravel, PHP, jQuery, JavaScript, CSS',
                'url' => 'https://littlesteps.sg/login',
                'featured' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($portfolioItems as $project) {
            PortfolioProject::updateOrCreate(
                ['slug' => $project['slug']],
                [
                    'title' => $project['title'],
                    'category' => $project['category'],
                    'image' => $project['image'],
                    'excerpt' => $project['excerpt'],
                    'description' => $project['description'],
                    'tech_stack' => $project['tech_stack'],
                    'url' => $project['url'],
                    'featured' => $project['featured'],
                    'status' => 'published',
                    'sort_order' => $project['sort_order'],
                ],
            );
        }

        foreach ([
            ['banner1.webp', 'site-assets/banner1.webp', 'Homepage hero'],
            ['about-2.webp', 'site-assets/about-2.webp', 'About page image'],
            ['contact.jpg', 'site-assets/contact.jpg', 'Contact page image'],
        ] as [$title, $path, $alt]) {
            MediaItem::updateOrCreate(
                ['path' => $path],
                ['title' => $title, 'type' => 'image', 'alt_text' => $alt, 'status' => 'active'],
            );
        }

        SeoEntry::updateOrCreate(
            ['url' => '/'],
            [
                'title' => 'RS Orange Tech | Web, App & Software Solutions',
                'description' => 'Affordable web, Laravel, mobile app and software development services.',
                'indexing' => 'index',
                'status' => 'good',
            ],
        );

        foreach ([
            ['site_name', 'RS Orange Tech', 'identity'],
            ['contact_email', 'info@rsorangetech.com', 'contact'],
            ['phone', '+91 73035 36474', 'contact'],
        ] as [$key, $value, $area]) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'area' => $area, 'status' => 'active'],
            );
        }
    }
}
