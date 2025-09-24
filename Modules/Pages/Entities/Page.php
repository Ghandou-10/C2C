<?php

namespace Modules\Pages\Entities;

use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Translatable, Filterable, Selectable, HasFactory;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'content'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['link'];
    /**
     * @var array
     */
    protected $with = [
        'translations',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Pages\Database\factories\PageFactory::new();
    }
}
