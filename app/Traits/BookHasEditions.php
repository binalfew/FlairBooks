<?php

namespace FlairBooks\Traits;

use FlairBooks\Edition;

trait BookHasEditions
{
	public function editions()
    {
        return $this->hasMany(Edition::class);
    }

    public function lastEdition()
    {
        $lastEdition = $this->editions()->latest()->first();

        return $lastEdition ? $lastEdition : new Edition;
    }

    public function price()
    {
        $lastEdition = $this->lastEdition();

        return $this->lastEdition()->price;
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