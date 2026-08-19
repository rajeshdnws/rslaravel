<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PortfolioProject;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicContentController extends Controller
{
    public function blog()
    {
        return view('site.blog', [
            'posts' => Post::query()
                ->with('category')
                ->where('status', 'published')
                ->latest('published_at')
                ->paginate(9),
        ]);
    }

    public function post(string $slug)
    {
        $post = Post::query()
            ->with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('site.content-post', [
            'post' => $post,
            'content' => $this->cleanContent((string) $post->content),
            'title' => $post->meta_title ?: $post->title,
            'description' => $post->meta_description ?: $this->excerpt($post->excerpt ?: $post->content),
        ]);
    }

    public function portfolio()
    {
        $page = Page::query()
            ->where('slug', '/portfolio/')
            ->where('status', 'published')
            ->first();

        $projects = PortfolioProject::query()
            ->where('status', 'published')
            ->orderBy('featured', 'desc')
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();

        $projects = $projects->isNotEmpty() ? $projects : collect(config('site.projects'))->map(function (array $project) {
            return (object) [
                'title' => $project['title'],
                'category' => $project['category'],
                'image' => $project['image'],
                'description' => $project['body'],
                'excerpt' => $project['body'],
                'tech_stack' => implode(', ', $project['tech'] ?? []),
                'url' => $project['url'],
                'featured' => false,
            ];
        });

        return view('site.portfolio', [
            'page' => $page,
            'projects' => $projects,
            'title' => $page?->meta_title ?: 'Portfolio | RS Orange Tech',
            'description' => $page?->meta_description ?: 'Explore selected RS Orange Tech web, app, plugin and software projects.',
        ]);
    }

    public function services()
    {
        $page = Page::query()
            ->where('slug', '/services/')
            ->where('status', 'published')
            ->first();

        $services = Page::query()
            ->where('status', 'published')
            ->where('template', 'services')
            ->where('slug', '!=', '/services/')
            ->latest('updated_at')
            ->get();

        return view('site.services', [
            'page' => $page,
            'services' => $services,
            'title' => $page?->meta_title ?: 'Services | RS Orange Tech',
            'description' => $page?->meta_description ?: 'Explore our web development, app, e-commerce and digital services.',
        ]);
    }

    public function technologies()
    {
        $page = Page::query()
            ->where('slug', '/our-technologies/')
            ->where('status', 'published')
            ->first();

        $technologies = Page::query()
            ->where('status', 'published')
            ->whereIn('template', ['technology', 'technologies', 'technology-item'])
            ->where('slug', '!=', '/our-technologies/')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('site.our-technologies', [
            'page' => $page,
            'technologies' => $technologies,
            'title' => $page?->meta_title ?: 'Our Technologies | RS Orange Tech',
            'description' => $page?->meta_description ?: 'Explore our premium technology stack including Laravel, React, Vue, Node.js, AI tools, and more.',
        ]);
    }

    public function page(Request $request, ?string $slug = null)
    {
        $path = $slug ?: $request->path();
        $page = Page::query()
            ->where('slug', $this->pageSlug($path))
            ->where('status', 'published')
            ->firstOrFail();

        $viewName = 'site.content-page';
        
        if (!empty($page->template)) {
            if ($page->template === 'services' && trim($page->slug, '/') !== 'services') {
                $viewName = 'site.service-detail';
            } elseif (in_array($page->template, ['technology', 'technologies', 'technology-item']) && trim($page->slug, '/') !== 'our-technologies') {
                $viewName = 'site.technology-detail';
            } else {
                if (view()->exists('site.' . $page->template)) {
                    $viewName = 'site.' . $page->template;
                } elseif (view()->exists($page->template)) {
                    $viewName = $page->template;
                }
            }
        }

        return view($viewName, [
            'page' => $page,
            'content' => $this->cleanContent((string) $page->content),
            'title' => $page->meta_title ?: $page->title,
            'description' => $page->meta_description ?: $this->excerpt($page->excerpt ?: $page->content),
        ]);
    }

    private function pageSlug(string $slug): string
    {
        return '/'.trim($slug, '/').'/';
    }

    private function excerpt(?string $content): string
    {
        return Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags((string) $content))), 160);
    }

    private function cleanContent(string $content): string
    {
        $content = preg_replace('/<!--\s*\/?wp:[\s\S]*?-->/', '', $content);
        $content = preg_replace('/<script\b[^>]*>[\s\S]*?<\/script>/i', '', $content);
        $content = preg_replace('/<style\b[^>]*>[\s\S]*?<\/style>/i', '', $content);

        return $content;
    }
}
