<?php
namespace App\Api\Transformers;

use League\Fractal\TransformerAbstract;
	
class LessionTransformer extends TransformerAbstract
{
	public function transform($lession)
	{
		return [
			'name' => $lession['title'],
			'content' => $lession['body'],
		];
	}
}