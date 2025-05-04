<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Groups extends Composer
{
    // protected $acf = true;

    protected static $views = [
        'template-groups'
    ];

    public function with()
    {
        return [
            'groups' => $this->groups(),
            'locations' => $this->locations(),
            'stages' => $this->stages(),

        ];
    }

    public function locations()
    {
        return get_terms([
            'taxonomy' => 'location',
            'hide_empty' => true,
        ]);
    }

    public function stages()
    {
        return get_terms([
            'taxonomy' => 'stage',
            'hide_empty' => true,
        ]);
    }

    public function groups()
    {


        $groups = get_posts([
            'post_type' => 'group',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);

        array_map(function ($group) {

            unset($group->post_excerpt);
            unset($group->post_author);
            unset($group->post_date);
            unset($group->post_date_gmt);
            unset($group->post_modified);
            unset($group->post_modified_gmt);
            unset($group->post_parent);
            unset($group->post_password);
            unset($group->post_content_filtered);


            $group->image = get_the_post_thumbnail($group->ID, 'wide_l', ['class' => 'w-full']);
            $group->thumb = get_the_post_thumbnail($group->ID, 'thumbnail');

            $group->location = get_field('location_geo', $group->ID);
            // $group->status = get_field('group_status', $group->ID);
            $group->web_address = get_field('web_address', $group->ID);
            $group->location_name = get_field('location_name', $group->ID);

            $group->area = get_the_terms($group->ID, 'location')[0]->name ?? '';


            $group->stage = get_the_terms($group->ID, 'stage')[0]->name ?? '';
        }, $groups);

        return $groups;
    }
}
