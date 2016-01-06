<?php

namespace FlairBooks\Traits;

use FlairBooks\Edition;

trait BookHasEditions
{
	public function editions()
    {
        return $this->hasMany(Edition::class);
    }

    public function addEdition($edition)
    {
    	$method = $edition instanceof Edition ? 'save' : 'saveMany';

		$this->editions()->$method($edition);

		return $this;
    }

    public function countEditions()
    {
    	return $this->editions()->count();
    }
}