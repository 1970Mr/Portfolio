<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $guarded = [
		'id',
		'updated_at',
		'created_at',
	];

    protected function github(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
			set: fn ($value) => json_encode($value),
        );
    }

    protected function githubUsername(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->github['username'],
        );
    }

    protected function githubUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->github['url'],
        );
    }

    public function __get($key)
    {
        if ($key == 'phoneNumber')
            return parent::getAttribute(str()->snake($key));
        return parent::getAttribute($key);
    }

    public function __set($key, $value)
    {
        return parent::setAttribute(str()->snake($key), $value);
    }
}
