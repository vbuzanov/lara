<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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

}


