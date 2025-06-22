<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
	protected $fillable = [
	    'title',
	    'body',
	    'image',
	    'user_id',
	];
	protected function title():Attribute
	{
		return Attribute::make(
			// Mutator: Save in lower case
			set: fn($value)=>strtolower($value),

			//Accessor in capital strtoupper (ucwords)
			get: fn($value)=>ucwords($value)
		);
	}
	protected function body():Attribute
	{
		return Attribute::make(
			get: fn($value)=>ucfirst($value)
		);
	}
	public function scopeSearchBy($query, $type, $search,$id)
	{
		if ($type==='title1') 
		{
			return $query->where([
				['user_id','=',$id],
				['title','like',"%$search%"]
			]);
		}
	    elseif ($type === 'title') {
	        return $query->where('title', 'like', "%$search%");
	    }

	    elseif ($type === 'name') {
	        return $query->whereHas('user', function ($q) use ($search) {
	            $q->where('name', 'like', "%$search%");
	        });
	    }
	    return $query;
	}

	public function user()
	{
	    return $this->belongsTo(User::class);
	}

	public function likes()
	{
	    return $this->hasMany(Like::class)->where('type', 'like');
	}

	public function unlikes()
	{
	    return $this->hasMany(Like::class)->where('type', 'unlike');
	}

	public function isLikedBy($user)
	{
	    return $this->likes()->where('user_id', $user->id)->where('type', 'like')->exists();
	}

	public function isUnlikedBy($user)
	{
	    return $this->likes()->where('user_id', $user->id)->where('type', 'unlike')->exists();
	}
}
