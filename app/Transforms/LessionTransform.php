<?php

namespace App\Transforms;

use Illuminate\Database\Eloquent\Collection;

class LessionTransform extends TransformAbstract
{
	protected function map($lession)
	{
		return [
			'name' => $lession['title'],
			'content' => $lession['body'],
		];
	}
}
