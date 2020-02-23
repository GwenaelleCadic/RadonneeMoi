<?php

namespace App\Repositories;

use App\Marche;

class MarcheRepository implements MarcheRepositoryInterface
{

    protected $marche;

	public function __construct(Marche $marche)
	{
		$this->marche = $marche;
	}

	public function save($marche)
	{
        $this->marche->marche = $marche;
        $this->marche->save();
	}

}