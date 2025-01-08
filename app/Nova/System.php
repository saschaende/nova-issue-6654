<?php

namespace App\Nova;

use App\Nova\Actions\UpdateSystemStatus;
use App\Nova\Helpers\FieldMaps;
use App\Nova\Lenses\Systems\MostValuableNotificationSystems;
use App\Nova\Lenses\Systems\MostValuableSourceSystems;
use App\Nova\Lenses\Systems\MostValuableTargetSystems;
use App\Nova\Pivots\SystemTenantFields;
use App\Nova\Pivots\SystemUserFields;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class System extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\System::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Trix::make('Description')
                ->alwaysShow()
                ->fullWidth(),

            BelongsToMany::make('Users')
                ->fields(new SystemUserFields),

            // Workaround to get the pivot table field working
//            Markdown::make('Comment')
//                ->onlyOnIndex()
//                ->hideFromIndex(),
        ];
    }
}
