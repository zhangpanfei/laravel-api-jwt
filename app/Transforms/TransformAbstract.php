<?php

namespace App\Transforms;

use Illuminate\Database\Eloquent\Collection;

abstract class TransformAbstract
{

	public function transforms($items)
	{
		$items = static::check($items);
		return array_map([$this,'transform'],$items);
	}

	public function transform($item)
	{	
		$item = self::check($item);
		return call_user_func([$this,'map'],$item);
	}

	public static function check($item)
	{
		($item instanceof Collection) and $item = $item->toArray();
		return $item;
	}

	abstract protected function map($item); 
}
