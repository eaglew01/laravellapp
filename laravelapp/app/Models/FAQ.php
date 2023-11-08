<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class FAQ extends Model
{
    use HasFactory;
    use AsSource, Filterable;
    protected $table = 'faqs';
    protected $fillable = ['question', 'answer', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
