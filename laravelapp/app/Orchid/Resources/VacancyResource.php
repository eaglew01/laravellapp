<?php

namespace App\Orchid\Resources;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Picture;

class VacancyResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Vacancy::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('title')
                ->title('Title')
                ->placeholder('Enter title here'),
            Input::make('body')
                ->title('Body')
                ->placeholder('Enter body here'),

            Picture::make('image')
                ->title('Image used for a vacancy')
                ->storage('public')
                ->targetId(),


            Select::make('user_id')
                ->title('User')
                ->fromModel(User::class, 'name', 'id')
                ->empty('Select User')
                ->required(),
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
            TD::make('title'),
            TD::make('body')->width('600px'),
            TD::make('user_id'),
            TD::make('image'),
            TD::make('image', 'Image')
            ->render(function ($model) {
                $imageUrl = asset("storage/{$model->image}");

            return "<img src='{$imageUrl}' alt='Vacancy Image' style='max-width:100px; max-height:100px;'>";
            }),
            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
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
            Sight::make('title'),
            Sight::make('body'),
            Sight::make('image'),
            Sight::make('user_id'),
        ];
    }


    
    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            
        ];
    }

    /**
 * Get the validation rules that apply to save/update.
 *
 * @return array
 */
public function rules(Model $model): array
{
    $rules = [
        'title' => ['required'],
        'body' => ['required'],
        'user_id' => ['required'],
    ];

    // If the request is for an update (model exists), allow image to be nullable
    if ($model->exists) {
        $rules['image'] = ['nullable'];
    } else {
        // For create, image is required
        $rules['image'] = ['required'];
    }

    return $rules;
}
}

    

