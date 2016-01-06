<?php

namespace FlairBooks\Traits;

use FlairBooks\Photo;

trait BookHasPhotos
{
	public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}