<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('rs_posts') || ! Schema::hasTable('pages') || ! Schema::hasTable('posts')) {
            return;
        }

        $now = now();

        DB::table('rs_posts')
            ->where('post_type', 'page')
            ->whereIn('post_status', ['publish', 'draft', 'trash'])
            ->where('post_title', '<>', '')
            ->orderBy('ID')
            ->chunkById(100, function ($wordpressPages) use ($now): void {
                foreach ($wordpressPages as $wordpressPage) {
                    $slug = $this->pageSlug($wordpressPage->post_name ?: Str::slug($wordpressPage->post_title));

                    DB::table('pages')->updateOrInsert(
                        ['slug' => $slug],
                        [
                            'title' => html_entity_decode($wordpressPage->post_title, ENT_QUOTES | ENT_HTML5),
                            'template' => $this->pageTemplate($wordpressPage->post_name),
                            'status' => $this->status($wordpressPage->post_status),
                            'excerpt' => $wordpressPage->post_excerpt ?: null,
                            'content' => $wordpressPage->post_content ?: null,
                            'meta_title' => html_entity_decode($wordpressPage->post_title, ENT_QUOTES | ENT_HTML5),
                            'meta_description' => $wordpressPage->post_excerpt ?: null,
                            'created_at' => $this->dateOrNow($wordpressPage->post_date, $now),
                            'updated_at' => $this->dateOrNow($wordpressPage->post_modified, $now),
                        ],
                    );
                }
            }, 'ID');

        $categoryId = DB::table('categories')->where('slug', 'wordpress')->value('id');

        if (! $categoryId) {
            $categoryId = DB::table('categories')->insertGetId([
                'name' => 'WordPress',
                'slug' => 'wordpress',
                'type' => 'blog',
                'description' => 'Imported WordPress blog posts.',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('rs_posts')
            ->where('post_type', 'post')
            ->whereIn('post_status', ['publish', 'draft', 'trash'])
            ->where('post_title', '<>', '')
            ->orderBy('ID')
            ->chunkById(100, function ($wordpressPosts) use ($categoryId, $now): void {
                foreach ($wordpressPosts as $wordpressPost) {
                    $slug = $wordpressPost->post_name ?: Str::slug($wordpressPost->post_title);

                    DB::table('posts')->updateOrInsert(
                        ['slug' => $slug],
                        [
                            'category_id' => $categoryId,
                            'title' => html_entity_decode($wordpressPost->post_title, ENT_QUOTES | ENT_HTML5),
                            'author' => 'RS Orange Tech',
                            'status' => $this->status($wordpressPost->post_status),
                            'excerpt' => $wordpressPost->post_excerpt ?: null,
                            'content' => $wordpressPost->post_content ?: null,
                            'meta_title' => html_entity_decode($wordpressPost->post_title, ENT_QUOTES | ENT_HTML5),
                            'meta_description' => $wordpressPost->post_excerpt ?: null,
                            'published_at' => $wordpressPost->post_status === 'publish'
                                ? $this->dateOrNow($wordpressPost->post_date, $now)
                                : null,
                            'created_at' => $this->dateOrNow($wordpressPost->post_date, $now),
                            'updated_at' => $this->dateOrNow($wordpressPost->post_modified, $now),
                        ],
                    );
                }
            }, 'ID');
    }

    public function down(): void
    {
        if (! Schema::hasTable('rs_posts')) {
            return;
        }

        $pageSlugs = DB::table('rs_posts')
            ->where('post_type', 'page')
            ->whereIn('post_status', ['publish', 'draft', 'trash'])
            ->where('post_title', '<>', '')
            ->pluck('post_name')
            ->filter()
            ->map(fn (string $slug): string => $this->pageSlug($slug))
            ->all();

        $postSlugs = DB::table('rs_posts')
            ->where('post_type', 'post')
            ->whereIn('post_status', ['publish', 'draft', 'trash'])
            ->where('post_title', '<>', '')
            ->pluck('post_name')
            ->filter()
            ->all();

        if (Schema::hasTable('pages') && $pageSlugs !== []) {
            DB::table('pages')->whereIn('slug', $pageSlugs)->delete();
        }

        if (Schema::hasTable('posts') && $postSlugs !== []) {
            DB::table('posts')->whereIn('slug', $postSlugs)->delete();
        }
    }

    private function pageSlug(string $slug): string
    {
        return '/'.trim($slug, '/').'/';
    }

    private function pageTemplate(?string $slug): string
    {
        return match ($slug) {
            'contact-us' => 'contact',
            'services' => 'services',
            'privacy-policy', 'terms-conditions' => 'legal',
            default => 'content',
        };
    }

    private function status(string $wordpressStatus): string
    {
        return match ($wordpressStatus) {
            'publish' => 'published',
            'trash' => 'archived',
            default => 'draft',
        };
    }

    private function dateOrNow(?string $date, mixed $fallback): mixed
    {
        return $date && $date !== '0000-00-00 00:00:00' ? $date : $fallback;
    }
};
