<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Group extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('group_fields', ['position' => 'side', 'title' => 'Group']);

        $fields
            ->setLocation('post_type', '==', 'group')
            ->addText('location_name')
            // ->addSelect('group_status', [
            //     'choices' => [
            //         'forming' => 'Forming',
            //         'developing' => 'Developing',
            //         'established' => 'Established',
            //     ],
            // ])
            ->addUrl('web_address')
            ->addGoogleMap('location_geo', [
                'label' => 'Location',
                'center_lat' => 53.8008,
                'center_lng' => -1.5491,
                'zoom' => 8,
            ]);

        return $fields->build();
    }
}
