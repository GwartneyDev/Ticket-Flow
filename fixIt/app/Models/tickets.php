<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
 

    use HasFactory;

    protected $guarded =[];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function qeue(){
        return $this->belongsTo(qeue::class);
    }

    public function users(){
        return $this->belongsTo(users::class);
    }

    public function replys(){
        return $this->hasMany(replys::class);
    }
    
}
