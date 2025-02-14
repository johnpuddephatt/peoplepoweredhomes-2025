<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Single extends Composer
{
    // protected $acf = true;

    protected static $views = [
        'single'
    ];

    public function with()
    {
        return [
            'post' => $this->post(),

        ];
    }

    public function post()
    {
        $this->title = get_the_title();
        $this->thumbnail = get_the_post_thumbnail(null, '16x9', [
            'sizes' => '(min-width: 780px) 780px, 90vw'
        ]);
        $this->date = get_the_date();
        $this->content = apply_filters("the_content", get_the_content());
        return $this;
    }
}
