<?php

namespace App\Models;

use App\Models\SubCategory;
use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MainCategory extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table='main_categories';
    protected $fillable = [
        'translation_lang',
        'translation_of',
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

        return $query->select('id','translation_lang','translation_of','name','slug','photo','active');
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

    public function vendors()
    {
        return $this -> hasMany('App\Models\Vendor','category_id','id');
    }

    public function scopeDefaultCategory($query)
    {
        return $query -> where('translation_of',0);
    }

    public function subCategories()
    {

        return $this -> hasMany(SubCategory::class,'category_id');
    }
    public static function boot()
    {
        parent::boot();
        MainCategory::observe(MainCategoryObserver::class);
    }

}




//    public static function boot()
//    {
//        parent::boot();
//        self::creating(function ($model) {
//            $model->uuid = (string)\Webpatser\Uuid\Uuid::generate(4);
//        });
//    }
//    public function item()
//    {
//        return $this->belongsTo(ItemRequest::class);
//    }
//    public static function getBy($uuid)
//    {
//        return self::where('uuid', $uuid)->first();
//    }
