<?php

namespace FlairBooks\Traits;

use FlairBooks\Photo;

trait BookHasPhotos
{
	public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }
}