<?php

namespace App\Nova\Pivots;

use Laravel\Nova\Fields\Markdown;

class SystemUserFields
{
    /**
     * Get the pivot fields for the relationship.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            Markdown::make('Comment')
                ->alwaysShow(),
        ];
    }
}
