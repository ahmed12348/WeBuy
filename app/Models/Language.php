<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Language extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $table='languages';
    protected $fillable = [
        'title',
        'slogan',
        'img',
        'active',
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
        return $query->select('id','slogan','title','img','active');
    }
    public function getActive(){
    return    $this->active == 1 ? 'مفعل' : 'غير مفعل ';

    }
    public function getImgAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }
}
