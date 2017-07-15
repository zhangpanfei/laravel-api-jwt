<?php

	Route::get('/',function(){
		return 123;
	})->middleware('throttle:5,1');