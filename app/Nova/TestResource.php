<?php

namespace App\Nova;

use App\Models\Test;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Tabs\Tab;

class TestResource extends Resource
{
    public static $model = Test::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title'
    ];

    public function fields(Request $request)
    {
        return [

            Tab::group('Details', [

                Tab::make('General', [
                    ID::make()->sortable(),

                    Text::make('Title')
                        ->sortable()
                        ->rules('required'),
                ]),

                Tab::make('Tab 1', [
                    Markdown::make('Markdown A')
                        ->sortable()
                        ->rules('nullable'),
                ]),

                Tab::make('Tab 2', [
                    Code::make('Markdown B')
                        ->sortable()
                        ->rules('nullable'),
                ]),
            ]),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }

    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
