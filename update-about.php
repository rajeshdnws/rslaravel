use App\Models\Page;
$page = Page::where('slug', '/about-us/')->first();
if ($page) {
    $page->excerpt = "Founded in 2025, Built on 9+ Years of Experience. RS Orange Tech was officially established in 2025, building on more than 9 years of hands-on experience in web development, ecommerce, mobile applications, AI and custom software development since 2017.";
    $content = $page->content;
    $content = str_replace('<h4>10+</h4>', '<h4>9+</h4>', $content);
    $content = str_replace('<p>Years Experience</p>', '<p>Years Industry Exp.</p>', $content);
    $page->content = $content;
    $page->save();
    echo "Updated successfully.";
} else {
    echo "Page not found.";
}
