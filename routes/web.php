<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminResourceController;
use App\Http\Controllers\PublicContentController;
use App\Http\Controllers\WordPressContentController;
use App\Http\Middleware\EnsureAdminUser;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', function () {
    $staticSlugs = [
        '/', '/about-us/', '/our-approach/', '/services/', '/our-technologies/', 
        '/portfolio/', '/plugins/', '/blog/', '/contact-us/', '/quote-requests/', 
        '/privacy-policy/', '/terms-conditions/'
    ];
    
    $pages = \App\Models\Page::where('status', 'published')
        ->whereNotIn('slug', $staticSlugs)
        ->get();
        
    $posts = \App\Models\Post::where('status', 'published')->get();

    return response()->view('site.sitemap', [
        'pages' => $pages,
        'posts' => $posts,
    ])->header('Content-Type', 'text/xml');
})->name('sitemap');

Route::get('/', function () {
    $projects = \App\Models\PortfolioProject::query()
        ->where('status', 'published')
        ->where('featured', true)
        ->orderBy('sort_order')
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get();

    if ($projects->isEmpty()) {
        $projects = \App\Models\PortfolioProject::query()
            ->where('status', 'published')
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
    }

    if ($projects->isEmpty()) {
        $projects = collect(config('site.projects'))->map(function (array $project) {
            return (object) [
                'title' => $project['title'],
                'category' => $project['category'],
                'image' => $project['image'],
                'body' => $project['body'],
                'tech' => $project['tech'] ?? [],
                'url' => $project['url'] ?? route('portfolio'),
            ];
        });
    }

    $services = \App\Models\Page::query()
        ->where('status', 'published')
        ->where('template', 'services')
        ->latest('updated_at')
        ->limit(9)
        ->get();

    if ($services->isEmpty()) {
        $services = \App\Models\Page::query()
            ->where('status', 'published')
            ->latest('updated_at')
            ->limit(9)
            ->get();
    }

    if ($services->isEmpty()) {
        $services = collect(config('site.services'))->map(function (array $service) {
            return (object) [
                'title' => $service['title'],
                'excerpt' => $service['body'],
                'content' => $service['body'],
                'slug' => '/'.\Illuminate\Support\Str::slug($service['title']).'/',
            ];
        });
    }

    return view('site.home', [
        'title' => 'RS Orange Tech | Premium Web Development, Apps, E-Commerce & AI Solutions',
        'description' => 'RS Orange Tech builds premium websites, Laravel applications, e-commerce stores, mobile apps, WordPress plugins and AI automation for growing businesses.',
        'services' => $services,
        'technologies' => config('site.technologies'),
        'projects' => $projects,
    ]);
})->name('home');

Route::get('/about-us/', [PublicContentController::class, 'page'])->defaults('slug', 'about-us')->name('about');

Route::get('/our-approach/', fn () => view('site.our-approach', [
    'title' => 'Our Approach - Human-Led, Machine-Assisted | RS Orange Tech',
    'description' => 'We believe great technology is built through human thinking with modern machines as supporting tools. Discover our 80/20 development philosophy.'
]))->name('our-approach');

Route::get('/services/', [\App\Http\Controllers\PublicContentController::class, 'services'])->name('services');

Route::get('/our-technologies/', [PublicContentController::class, 'technologies'])->name('technologies');

Route::get('/blog/', [PublicContentController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}/', [PublicContentController::class, 'post'])->name('blog.show');
Route::get('/wordpress-content/', [WordPressContentController::class, 'index'])->name('wordpress.index');
Route::get('/wordpress-content/{slug}/', [WordPressContentController::class, 'show'])->name('wordpress.show');

Route::get('/contact-us/', fn () => view('site.contact', [
    'title' => 'Contact Our Development Team | RS Orange Tech',
    'description' => 'Get in touch with RS Orange Tech. Reach out for web development, app creation, or AI automation inquiries in Noida and Delhi NCR.'
]))->name('contact');
Route::post('/contact-us/', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:120'],
        'email' => ['required', 'email', 'max:160'],
        'phone' => ['nullable', 'string', 'max:40'],
        'subject' => ['nullable', 'string', 'max:200'],
        'message' => ['required', 'string', 'max:2000'],
    ]);

    $lead = \App\Models\Lead::create([
        'type' => 'contact',
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'] ?? null,
        'subject_or_service' => $validated['subject'] ?? null,
        'message' => $validated['message'],
        'reference_page' => $request->headers->get('referer') ?? url()->previous(),
    ]);

    defer(function () use ($lead) {
        $adminEmail = env('MAIL_RECEIVER', \App\Models\SiteSetting::where('key', 'contact_email')->value('value') ?? 'info@rsorangetech.com');
        \Illuminate\Support\Facades\Mail::to($adminEmail)->send(new \App\Mail\LeadNotification($lead));
        \Illuminate\Support\Facades\Mail::to($lead->email)->send(new \App\Mail\LeadConfirmation($lead));
    });

    return back()->with('status', 'Thanks. Your message has been sent successfully.');
})->name('contact.submit');

Route::get('/quote-requests/', fn () => view('site.quote', [
    'services' => config('site.services'),
    'title' => 'Request a Quote | RS Orange Tech',
    'description' => 'Tell us about your project, goals, budget, and requirements. Our team will review your request and provide a tailored digital solution.'
]))->name('quote');

Route::get('/privacy-policy/', [PublicContentController::class, 'page'])->defaults('slug', 'privacy-policy')->name('privacy');

Route::get('/terms-conditions/', [PublicContentController::class, 'page'])->defaults('slug', 'terms-conditions')->name('terms');

Route::get('/plugins/', [PublicContentController::class, 'page'])->defaults('slug', 'plugins')->name('plugins');
Route::get('/portfolio/', [PublicContentController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}/', [PublicContentController::class, 'portfolioShow'])->name('portfolio.show');
Route::redirect('/gallery-plugin/', '/plugins/', 301);
Route::redirect('/ai-website-fixer/', '/plugins/', 301);

Route::post('/quote-requests/', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:120'],
        'email' => ['required', 'email', 'max:160'],
        'phone' => ['nullable', 'string', 'max:40'],
        'company' => ['nullable', 'string', 'max:120'],
        'service' => ['nullable', 'string', 'max:120'],
        'budget' => ['nullable', 'string', 'max:120'],
        'timeline' => ['nullable', 'string', 'max:120'],
        'message' => ['required', 'string', 'max:2000'],
        'document' => ['nullable', 'file', 'max:10240'],
        'contact_method' => ['nullable', 'string', 'in:email,phone'],
    ]);

    $documentPath = null;
    if ($request->hasFile('document')) {
        $documentPath = $request->file('document')->store('leads', 'public');
    }

    $lead = \App\Models\Lead::create([
        'type' => 'quote',
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'] ?? null,
        'company' => $validated['company'] ?? null,
        'subject_or_service' => $validated['service'] ?? null,
        'budget' => $validated['budget'] ?? null,
        'timeline' => $validated['timeline'] ?? null,
        'contact_method' => $validated['contact_method'] ?? null,
        'message' => $validated['message'],
        'document_path' => $documentPath,
        'reference_page' => $request->headers->get('referer') ?? url()->previous(),
    ]);

    defer(function () use ($lead) {
        $adminEmail = env('MAIL_RECEIVER', \App\Models\SiteSetting::where('key', 'contact_email')->value('value') ?? 'info@rsorangetech.com');
        \Illuminate\Support\Facades\Mail::to($adminEmail)->send(new \App\Mail\LeadNotification($lead));
        \Illuminate\Support\Facades\Mail::to($lead->email)->send(new \App\Mail\LeadConfirmation($lead));
    });

    session()->flash('lead', $validated);

    return back()->with('status', 'Thanks. Your quote request has been received.');
})->name('quote.submit');

Route::post('/newsletter/', function (Request $request) {
    $request->validate(['email' => ['required', 'email', 'max:160']]);

    return back()->with('status', 'Thanks for subscribing.');
})->name('newsletter');

Route::post('/chatbot-submit', [\App\Http\Controllers\ChatbotController::class, 'submit'])->name('chatbot.submit');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'create'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'store'])->name('login.store');
    Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware(EnsureAdminUser::class)->group(function () {
    Route::get('/', fn () => view('admin.dashboard', [
        'resources' => config('admin.resources'),
    ]))->name('dashboard');

    foreach (array_keys(config('admin.resources')) as $slug) {
        Route::get('/'.$slug, [AdminResourceController::class, 'index'])->defaults('resource', $slug)->name($slug);
        Route::get('/'.$slug.'/create', [AdminResourceController::class, 'create'])->defaults('resource', $slug)->name($slug.'.create');
        Route::post('/'.$slug, [AdminResourceController::class, 'store'])->defaults('resource', $slug)->name($slug.'.store');
        Route::get('/'.$slug.'/{id}/edit', [AdminResourceController::class, 'edit'])->defaults('resource', $slug)->name($slug.'.edit');
        Route::put('/'.$slug.'/{id}', [AdminResourceController::class, 'update'])->defaults('resource', $slug)->name($slug.'.update');
        Route::delete('/'.$slug.'/{id}', [AdminResourceController::class, 'destroy'])->defaults('resource', $slug)->name($slug.'.destroy');
    }
});

Route::get('/{slug}/', [PublicContentController::class, 'page'])
    ->where('slug', '^(?!admin|blog|wordpress-content).+')
    ->name('pages.show');
