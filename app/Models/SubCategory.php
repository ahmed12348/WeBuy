<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubCategory extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table='sub_categories';
    protected $fillable = [
        'translation_lang',
        'translation_of',
        'parent_id',
        'name',
        'slug',
        'photo',
        'active',
        'created_at',
        'updated_at',
    ];
    public function scopeActive($query)
    {
        return $query->where('active',1);
    }
    public function scopeSelection($query)
    {

        return $query->select('id','translation_lang','parent_id','translation_of','name','slug','photo','active');
    }

    public function categories()
    {

        return $this -> hasMany(self::class,'translation_of');
    }



    public function getActive(){
        return    $this->active == 1 ? 'مفعل' : 'غير مفعل ';

    }
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }

    public function mainCategory()
    {

        return $this -> belongsTo(MainCategory::class,'category_id');
    }

}
