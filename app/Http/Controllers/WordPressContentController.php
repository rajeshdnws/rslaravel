<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class WordPressContentController extends Controller
{
    public function blog()
    {
        return view('site.blog', [
            'posts' => $this->publishedContent(['post'])->paginate(9),
            'hasWordPressData' => Schema::hasTable('rs_posts'),
        ]);
    }

    public function index()
    {
        return view('site.wordpress.index', [
            'items' => $this->publishedContent(['post', 'page', 'rsorangetech', 'training'])
                ->paginate(18),
            'hasWordPressData' => Schema::hasTable('rs_posts'),
        ]);
    }

    public function show(string $slug)
    {
        abort_unless(Schema::hasTable('rs_posts'), 404);

        $post = DB::table('rs_posts')
            ->where('post_name', $slug)
            ->where('post_status', 'publish')
            ->whereIn('post_type', ['post', 'page', 'rsorangetech', 'training'])
            ->first();

        abort_unless($post, 404);

        return view('site.wordpress.show', [
            'post' => $post,
            'content' => $this->cleanContent($post->post_content),
        ]);
    }

    private function publishedContent(array $types)
    {
        if (! Schema::hasTable('rs_posts')) {
            return DB::query()->fromSub('select null as ID where 1 = 0', 'empty_posts');
        }

        return DB::table('rs_posts')
            ->select([
                'ID',
                'post_title',
                'post_name',
                'post_excerpt',
                'post_content',
                'post_date',
                'post_type',
                'guid',
            ])
            ->where('post_status', 'publish')
            ->whereIn('post_type', $types)
            ->where('post_title', '<>', '')
            ->orderByDesc('post_date');
    }

    public function excerpt(object $post): string
    {
        $source = $post->post_excerpt ?: $post->post_content;

        return Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags($source))), 170);
    }

    private function cleanContent(string $content): string
    {
        $content = preg_replace('/<!--\s*\/?wp:[\s\S]*?-->/', '', $content);
        $content = preg_replace('/<script\b[^>]*>[\s\S]*?<\/script>/i', '', $content);
        $content = preg_replace('/<style\b[^>]*>[\s\S]*?<\/style>/i', '', $content);

        return $content;
    }
}
