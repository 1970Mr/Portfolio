<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'sub_title',
		'description',
		'photo',
		'status',
	];

	protected function photo(): Attribute
	{
		return Attribute::make(
			get: fn ($value) => json_decode($value, true),
			set: fn ($value) => json_encode($value),
		);
	}
}
