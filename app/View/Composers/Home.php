<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Home extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'index',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'posts' => $this->posts(),
            'sections' => $this->sections(),
            'hero' => $this->hero(),
            'groups' => $this->groups(),

        ];
    }

    public function posts()
    {
        $latest_posts = get_posts([
            'post_type' => 'Post',
            'posts_per_page' => 3
        ]);

        return array_map(function ($post) {
            $post->post_excerpt = get_the_excerpt($post->ID);
            $post->thumbnail = get_the_post_thumbnail($post->ID, '16x9', [
                'class' => 'w-full bg-gray h-auto aspect-video bg-opacity-20',
            ]);
            $post->link = get_the_permalink($post->ID);
            return $post;
        }, $latest_posts);
    }

    public function hero()
    {
        $hero = new \stdClass();
        $hero->title = get_theme_mod('home_hero_title');
        $hero->content = get_theme_mod('home_hero_content');
        // $hero->image = get_theme_mod('home_hero_image');
        $hero->button_text = get_theme_mod('home_hero_button_text') ?: null;
        $hero->button_url = get_theme_mod('home_hero_button_url') ?: null;
        $hero->image = get_theme_mod('home_hero_image') ? wp_get_attachment_image(get_theme_mod('home_hero_image'), 'large', false, [
            'class' => 'clip-oval aspect-[247/134] object-cover',
        ]) : null;
        return $hero;
    }


    public function groups()
    {


        return get_posts([
            'post_type' => 'group',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
    }

    public function sections()
    {
        $sectionArray = [];
        $sectionArray[] = get_theme_mod('home_section_A');
        $sectionArray[] = get_theme_mod('home_section_B');
        $sectionArray[] = get_theme_mod('home_section_C');

        $terms = get_terms(array(
            'taxonomy' => 'section',
            'include' => $sectionArray
        ));

        return array_map(function ($term) {
            $term->icon = get_field('icon', 'section_' . $term->term_id);
            return $term;
        }, $terms);
    }
}
