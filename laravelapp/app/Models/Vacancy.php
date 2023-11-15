<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;

class Vacancy extends Model
{
    use AsSource, Filterable, Attachable;
    use HasFactory;
    protected $fillable = ['title', 'body', 'user_id', 'image'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function createOrUpdate(Request $request)
{
    $this->vacancy->fill($request->get('vacancy'))->save();

    $this->vacancy->attachment()->syncWithoutDetaching(
        $request->input('vacancy.image', [])
    );

    Alert::info('You have successfully created a post.');

    return redirect()->route('platform.post.list');
}
}
