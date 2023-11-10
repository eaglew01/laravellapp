<?php

namespace App\Orchid\Resources;

use App\Models\Category;

use Illuminate\Database\Eloquent\Model;

use Orchid\Crud\Resource;

use Orchid\Screen\Fields\Input;

use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class FaqResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Faq::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [

        Input::make('question')
            ->title('Question')
            ->placeholder('Enter question here'),
        Input::make('answer')
            ->title('Answer')
            ->placeholder('Enter answer here'),

        Select::make('category_id')
            ->title('Category')
            ->fromModel(Category::class, 'name', 'id')
            ->empty('Select Category')
            ->required(),

        Input::make('verified')
            ->title('Verify question')
            ->placeholder('0 or 1'),

        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('question'),
            TD::make('answer'),
            TD::make('category_id'),
            TD::make('verified'),
            // TD::make('created_at', 'Date of creation')
            //     ->render(function ($model) {
            //         return $model->created_at->toDateTimeString();
            //     }),

            // TD::make('updated_at', 'Update date')
            //     ->render(function ($model) {
            //         return $model->updated_at->toDateTimeString();
            //     }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('question'),
            Sight::make('answer'),
            Sight::make('category_id'),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

/**
 * Get the validation rules that apply to save/update.
 *
 * @return array
 */
public function rules(Model $model): array
{
    return [
        'question' => ['required'],
        'category_id' => ['required'],
    ];
}

}

