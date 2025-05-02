<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class Section extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('section_fields', ['position' => 'side', 'title' => 'Section']);

        $fields
            ->setLocation('taxonomy', '==', 'section')
            ->addImage('icon', [
                'return_format' => 'url',
            ]);


        return $fields->build();
    }
}
