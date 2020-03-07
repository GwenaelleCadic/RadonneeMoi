<?php

namespace App\Repositories;

use App\Marche;

class MarcheRepository// implements MarcheRepositoryInterface
{

    protected $marche;

	public function __construct(Marche $marche)
	{
		$this->marche = $marche;
	}



	private function save(Marche $marche,Array $inputs)
	{
		$marche->nom=$input['nom'];
		$marche->temps=$input['temps'];
		$marche->createur=$input['createur!id'];
		$marche->niveau=$input['niveau'];
		$marche->region=$input['region'];

		$marche->save();
	}

	public function store(Array $inputs)
	{
		$marche= new $this->marche;
		
		$this->save($marche,$inputs);

		return $marche;
	}

	public function getById($id)
	{
		return $this->marche->findOrFail($id);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}