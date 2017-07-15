<?php

namespace App\Api\Controllers;

use App\Lession;
use App\Api\Transformers\LessionTransformer;

class LessionController extends BaseController
{
	public function index()
	{
		$lessions =  Lession::paginate(20);
		//return $this->collection($lessions, new LessionTransformer);
		return $this->response->paginator($lessions, new LessionTransformer);
		//return \Auth::User();
	}

	public function show($id)
	{
		$lession = Lession::find($id);
		if (!$lession) return $this->errorNotFound();
		return $this->item($lession,new LessionTransformer);
	}
}