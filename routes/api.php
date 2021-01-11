<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Owners;
use App\Http\Controllers\API\Animals;
use App\Http\Controllers\API\Treatments;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// use array syntax to point to controller
// tidier and harder to make typos

// all of the routes are in the /owners end-point
Route::group(["prefix" => "owners"], function () {

    // GET /owners: show all owners
    Route::get("", [Owners::class, "index"]);

    // POST /owners: create a new owner
    Route::post("", [Owners::class, "store"]);

    
    // all these routes also have an owner ID in the
    // end-point, e.g. /owner/8
    Route::group(["prefix" => "{owner}"], function () {

        // GET /owners/8: show the owner
        Route::get("", [Owners::class, "show"]);

        // PUT /owners/8: update the owner
        Route::put("", [Owners::class, "update"]);

        // DELETE /owners/8: delete the owner
        Route::delete("", [Owners::class, "destroy"]); 
    });     
});
    
Route::group(["prefix" => "animals"], function(){

    Route::get("", [Animals::class, "index"]);

    Route::group(["prefix" => "{animal}"], function(){

        Route::get("", [Animals::class, "show"]);

        Route::put("", [Animals::class, "update"]);

        Route::delete("", [Animals::class, "destroy"]);       
    });
});

Route::group(["prefix" => "treatments"], function(){
    
    Route::get("", [Treatments::class, "index"]);
});