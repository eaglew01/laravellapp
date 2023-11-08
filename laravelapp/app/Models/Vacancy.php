<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Vacancy extends Model
{
    use AsSource, Filterable;
    use HasFactory;
    protected $fillable = ['title', 'body', 'user_id'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
