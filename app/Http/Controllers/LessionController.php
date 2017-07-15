<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lession;
use App\Transforms\LessionTransform;

class LessionController extends ApiController
{

    public function __construct(LessionTransform $tranformer)
    {
        $this->middleware('auth.basic');
        $this->transformer = $tranformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->response($this->transformer->transforms(lession::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Lession::create($request->all()) ){
            return $this->message('create success')->response('ok');
        } else {
            return $this->message('create error')->responseError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $lession = Lession::find($id);
        if (!$lession) {
            return $this->statusCode(403)->responseError();
        }

        return $this->response($this->transformer->transform($lession));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $lession = Lession::find($id);
        if (!$lession) {
            return $this->responseNouFound();
        }
        return $this->response($this->transformer->transform($lession));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
