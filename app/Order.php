<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'codeno','user_id','orderdate','total','status'
    ];
    public function items()
    {
        return $this->belongsToMany('App\Item','orderdetail')->withPivot('qty')
        ->withTimestamps();
    }
    public function user(){
        return $this->belongsTo('App\User');

    }
}
