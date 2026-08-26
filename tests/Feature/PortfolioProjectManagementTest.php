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

    public function test_single_portfolio_view_description_comes_from_pages_section(): void
    {
        $project = PortfolioProject::create([
            'title' => 'Portfolio Page Detail Test',
            'slug' => 'portfolio-detail-test',
            'category' => 'Web Development',
            'image' => 'design.png',
            'excerpt' => 'Portfolio section excerpt',
            'description' => 'Portfolio section description',
            'tech_stack' => 'Laravel',
            'url' => '/portfolio/',
            'featured' => false,
            'status' => 'published',
            'sort_order' => 1,
        ]);

        $page = Page::where('slug', '/portfolio-detail-test/')->first();
        $this->assertNotNull($page);
        $page->update([
            'excerpt' => 'Pages section excerpt',
            'content' => 'Pages section content/description',
            'meta_description' => 'Pages section meta description',
        ]);

        $response = $this->get('/portfolio/portfolio-detail-test/');
        $response->assertOk();

        $response->assertSee('Pages section excerpt');
        $response->assertSee('Pages section content/description');
        $response->assertSee('Pages section meta description');
        $response->assertDontSee('Portfolio section excerpt');
        $response->assertDontSee('Portfolio section description');
    }

    public function test_portfolio_detail_views_have_one_column_layout(): void
    {
        $project = PortfolioProject::create([
            'title' => 'Some Portfolio Website',
            'slug' => 'some-portfolio',
            'category' => 'Web Development',
            'image' => 'design.png',
            'excerpt' => 'Short excerpt.',
            'description' => 'A description of the portfolio project.',
            'tech_stack' => 'Laravel, Vue.js',
            'url' => '/some-portfolio/',
            'featured' => true,
            'status' => 'published',
            'sort_order' => 1,
        ]);

        $response = $this->get('/portfolio/some-portfolio/');
        $response->assertOk();
        $response->assertSee('content-grid one-column');
    }

    public function test_homepage_portfolio_section_shows_only_excerpt(): void
    {
        $project = PortfolioProject::create([
            'title' => 'Home Excerpt Project',
            'slug' => 'home-excerpt-project',
            'category' => 'Web Development',
            'image' => 'design.png',
            'excerpt' => 'Only Home Excerpt Should Be Shown',
            'description' => 'Full Long Description That Should Not Be Shown On Home',
            'tech_stack' => 'Laravel',
            'url' => '/portfolio/',
            'featured' => true,
            'status' => 'published',
            'sort_order' => 1,
        ]);

        Page::create([
            'title' => 'Some Service Page',
            'slug' => '/some-service-page/',
            'template' => 'services',
            'status' => 'published',
            'excerpt' => 'Service excerpt',
            'content' => 'Service content',
        ]);

        $response = $this->get('/');
        $response->assertOk();
        $response->assertSee('Only Home Excerpt Should Be Shown');
        $response->assertDontSee('Full Long Description That Should Not Be Shown On Home');
    }

    public function test_portfolio_page_accessed_via_generic_route_redirects_to_portfolio_detail_route(): void
    {
        $project = PortfolioProject::create([
            'title' => 'Redirect Test Project',
            'slug' => 'redirect-test-project',
            'category' => 'Web Development',
            'image' => 'design.png',
            'excerpt' => 'Redirect Test Excerpt',
            'description' => 'Redirect Test Description',
            'tech_stack' => 'Laravel',
            'url' => '/redirect-test-project/',
            'featured' => false,
            'status' => 'published',
            'sort_order' => 1,
        ]);

        $response = $this->get('/redirect-test-project/');
        $response->assertRedirect(route('portfolio.show', 'redirect-test-project'));
        $response->assertStatus(301);
    }

    public function test_sitemap_includes_correct_canonical_portfolio_detail_routes(): void
    {
        $project = PortfolioProject::create([
            'title' => 'Sitemap Canonical Project',
            'slug' => 'sitemap-canonical-project',
            'category' => 'Web Development',
            'image' => 'design.png',
            'excerpt' => 'Sitemap Canonical Excerpt',
            'description' => 'Sitemap Canonical Description',
            'tech_stack' => 'Laravel',
            'url' => '/sitemap-canonical-project/',
            'featured' => false,
            'status' => 'published',
            'sort_order' => 1,
        ]);

        $response = $this->get('/sitemap.xml');
        $response->assertOk();
        $response->assertSee(route('portfolio.show', 'sitemap-canonical-project'));
        $response->assertDontSee(url('sitemap-canonical-project'));
    }

    public function test_portfolio_list_shows_only_excerpt(): void
    {
        $project = PortfolioProject::create([
            'title' => 'List Excerpt Project',
            'slug' => 'list-excerpt-project',
            'category' => 'Web Development',
            'image' => 'design.png',
            'excerpt' => 'Only List Excerpt Should Be Shown',
            'description' => 'Full Long Description That Should Not Be Shown On List Page',
            'tech_stack' => 'Laravel',
            'url' => '/portfolio/',
            'featured' => false,
            'status' => 'published',
            'sort_order' => 1,
        ]);

        $response = $this->get('/portfolio/');
        $response->assertOk();
        $response->assertSee('Only List Excerpt Should Be Shown');
        $response->assertDontSee('Full Long Description That Should Not Be Shown On List Page');
    }
}
