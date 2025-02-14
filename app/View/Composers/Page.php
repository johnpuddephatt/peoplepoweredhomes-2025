<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page extends Composer
{
    // protected $acf = true;

    protected static $views = [
        'page',
        'login',
        'register',
        'simple',
        'taxonomy-section'
    ];

    public function with()
    {
        return [
            'page' => $this->page(),
            'pages' => $this->pages()
        ];
    }

    public function page()
    {
        $page = new \stdClass();
        $page->ID = get_the_ID();

        $page->icon = get_field('icon');
        $page->title = get_the_title();
        $page->thumbnail = get_the_post_thumbnail(null, '16x9', [
            'sizes' => '(min-width: 780px) 780px, 90vw'
        ]);
        $page->section = $this->section();
        if (has_excerpt()) { // only get manually set excerpts
            $page->excerpt = get_the_excerpt();
        }
        $page->content = apply_filters("the_content", get_the_content());
        return $page;
    }

    public function section()
    {

        return
            get_the_terms(null, 'section') ? get_the_terms(null, 'section')[0] : '';
    }

    public function pages()
    {

        if ($this->section()) {
            $pages = get_posts([
                'post_type' => 'page',
                'numberposts' => '-1',
                'exclude' => is_tax() ? null : get_the_ID(),
                'order' => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'section',
                        'field' => 'slug',
                        'terms' => $this->section()->slug,

                    )
                )
            ]);



            return array_map(function ($page) {
                $page->ID = $page->ID;
                $page->excerpt = get_the_excerpt($page->ID);
                $page->thumbnail = get_the_post_thumbnail($page->ID, '4x3', [
                    'sizes' => '(min-width: 780px) 320px, 25vw'
                ]);
                $page->link = get_the_permalink($page->ID);
                return $page;
            }, $pages);
        } else {
            return [];
        }
    }
}
