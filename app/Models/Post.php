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
