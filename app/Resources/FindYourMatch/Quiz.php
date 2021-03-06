<?php

namespace App\Resources\FindYourMatch;

use App\Resources\FindYourMatch\Traits\Display;
use App\Piece;

class Quiz extends QuizFactory
{
	use Display;

	protected $exclude = [
		// Turk, Kabalevsly
		'composers' => [32, 50],
		'pieces' => []
	];

	public function exclude($ids)
	{
		if (is_array($ids))
			$this->exclude['pieces'] = $ids;

		return $this;
	}

	public function search()
	{
		$this->sortLevels();

		$this->findSimilar();

		$this->rankByKeywords();

		$piece = $this->ranking->shuffle()->first();

		if ($piece instanceof Piece)
			return $piece;

		return Piece::freePicks()->inRandomOrder()->first();
	}
}