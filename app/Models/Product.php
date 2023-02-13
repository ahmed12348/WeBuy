<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    protected $table='products';
    protected $fillable = [
        'translation_lang',
        'translation_of',
        'name',
        'description',
        'img',
        'active',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function scopeActive($query)
    {
        return $query->where('active',1);
    }
    public function scopeSelection($query)
    {

        return $query->select('id','price','description','name','img','active','translation_of','translation_lang');
    }

//     public function category()
//    {
//        return $this -> belongsTo(subCategory::class,'category_id');
//    }

    public function getActive(){
        return    $this->active == 1 ? 'مفعل' : 'غير مفعل ';

    }

    public function categories()
    {
        return $this -> hasMany(self::class,'translation_of');
    }
    public function getImgAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }
}
