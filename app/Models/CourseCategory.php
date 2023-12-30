<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'slug',
        'description',
        'parent_category_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (!$category->parent_category_id) {
                $category->parent_category_id = null;
            }
        });
    }

    public function parentCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'parent_category_id');
    }

    public function childCategories()
    {
        return $this->hasMany(CourseCategory::class, 'parent_category_id');
    }

    protected static function newFactory()
    {
        return \Database\Factories\CourseCategoryFactory::new();
    }
}
