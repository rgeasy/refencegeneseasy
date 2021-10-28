<?php

namespace App\Enums;

use \Spatie\Enum\Enum;

/**
 * @method static self ANIMAL()
 * @method static self VEGETAL()
 * @method static self MICROORGANSIM()
 */
class TipoGene extends Enum
{


	protected static function values(): array
	{
		return [
			'ANIMAL' => 1,
			'VEGETAL' => 2,
			'MICROORGANSIM' => 3
		];
	}

}

/* TipoGene::ANIMAL()->value */