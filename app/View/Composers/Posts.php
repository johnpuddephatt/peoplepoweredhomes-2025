<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Posts extends Composer
{
    // protected $acf = true;

    protected static $views = [
        'posts',
        'partials.content-posts'
    ];

    public function with()
    {
        return [
            'page' => $this->page(),
            'posts' => $this->posts()
        ];
    }

    public function page()
    {
        $this->icon = get_field('icon');
        return $this;
    }

    public function posts()
    {
        $posts = get_posts([
            'post_type' => 'post'
        ]);

        // return $posts;

        return array_map(function ($post) {
            $post->url = get_permalink($post->ID);

            $post->excerpt = get_the_excerpt($post->ID);
            $post->thumbnail = get_the_post_thumbnail($post->ID, '4x3', [
                'sizes' => '(min-width: 780px) 320px, 25vw'
            ]);
            return $post;
        }, $posts);
    }
}
