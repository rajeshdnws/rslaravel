<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\PortfolioProject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioProjectManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_portfolio_projects_are_rendered_from_database(): void
    {
        PortfolioProject::create([
            'title' => 'RS Gallery Plugin',
            'slug' => 'rs-gallery-plugin',
            'category' => 'WordPress Plugin',
            'image' => 'rs_gallery.png',
            'excerpt' => 'A gallery-focused plugin page for showcasing image collections.',
            'description' => 'A gallery-focused plugin page for showcasing image collections.',
            'tech_stack' => 'WordPress, Plugins, UI/UX',
            'url' => '/plugins/',
            'featured' => true,
            'status' => 'published',
            'sort_order' => 1,
        ]);

        $this->get('/portfolio/')
            ->assertOk()
            ->assertSee('RS Gallery Plugin');
    }

    public function test_administrator_can_access_portfolio_project_admin_section(): void
    {
        $admin = User::factory()->create([
            'role' => 'administrator',
            'status' => 'active',
        ]);

        $this->actingAs($admin)
            ->get('/admin/portfolio_projects')
            ->assertOk();
    }

    public function test_featured_projects_show_on_homepage_from_database(): void
    {
        PortfolioProject::create([
            'title' => 'Featured Home Project',
            'slug' => 'featured-home-project',
            'category' => 'Education Platform',
            'image' => 'design.png',
            'excerpt' => 'A featured home project rendered from the database.',
            'description' => 'A featured home project rendered from the database.',
            'tech_stack' => 'Laravel, UI/UX, SEO',
            'url' => '/portfolio/',
            'featured' => true,
            'status' => 'published',
            'sort_order' => 1,
        ]);

        PortfolioProject::create([
            'title' => 'Non Featured Project',
            'slug' => 'non-featured-project',
            'category' => 'Website Development',
            'image' => 'design.png',
            'excerpt' => 'This should not show on the homepage.',
            'description' => 'This should not show on the homepage.',
            'tech_stack' => 'WordPress',
            'url' => '/portfolio/',
            'featured' => false,
            'status' => 'published',
            'sort_order' => 2,
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Featured Home Project')
            ->assertDontSee('Non Featured Project');
    }

    public function test_homepage_services_are_loaded_from_service_pages(): void
    {
        Page::create([
            'title' => 'Custom Laravel Development',
            'slug' => '/custom-laravel-development/',
            'template' => 'services',
            'status' => 'published',
            'excerpt' => 'Custom Laravel development for scaling businesses.',
            'content' => 'Custom Laravel development for scaling businesses.',
            'meta_title' => 'Custom Laravel Development',
            'meta_description' => 'Custom Laravel development for scaling businesses.',
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Custom Laravel Development')
            ->assertSee(route('pages.show', 'custom-laravel-development'));
    }
}
