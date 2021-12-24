<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Item extends Model
{
  // use SoftDeletes;
	protected $fillable = [
          'name','photo','codeno','price','discount','description','brand_id','subcategory_id'];

  	public function brand() //brand
    {
        return $this->belongsTo('App\Brand');
    }
    public function subcategory() //subcategory
    {
        return $this->belongsTo('App\Subcategory');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order','orderdetail')->withPivot('qty')
        ->withTimestamps();
    }
}
