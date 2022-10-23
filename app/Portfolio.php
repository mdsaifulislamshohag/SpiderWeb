<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
	public function Image()
	{
		 return $this->hasMany(Image::class);
		 
	}

	public function Catagory()
	{
		return $this->belongsTo(Catagory::class);
	}
}
