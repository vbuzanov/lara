<?php

namespace App\Models;

use App\Scopes\ProductScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'img', 'slug', 'category_id', 'price', 'recommended'];

    public function getImgAttribute($value)
    {
        return $value ? $value : '/images/no-image.png';
    }

    //SELECT categories.* FROM categories JOIN products ON categories.id = products.category_id WHERE products.id=1

    //SELECT $model2->table.* FROM $model2->table JOIN $table ON $model2->table.$model2->primaryKey = $table.$model2_$model2->$primaryKey WHERE $table.$primaryKey=1

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id', 'id');
        //модель, название столбца с внешним ключом, название столбца текущей модели, название столбца связанной модели
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new ProductScope);
    }
    
    public function scopeRecommended($query)
    {
        $query->where('recommended', 1);
    }

    public function scopeLatest($query)
    {
        $query->orderByDesc('created_at');
    }

    // public function setNameAttribute($value)
    // {
    //     dd($this->attributes['recommended']);
    //     $this->attributes['recommended'] = $this->attributes['recommended'] ? 1 : 0;
    // }
}


