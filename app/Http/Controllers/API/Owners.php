<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Http\Requests\API\OwnerRequest;
use App\Http\Resources\API\OwnerResource;
use App\Http\Resources\API\OwnerListResource;

class Owners extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // needs to return multiple articles
        // so we use the collection method
        return OwnerListResource::collection(Owner::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnerRequest $request)
    {
        //get all resquest data
        //returns an arrary of all the data the user sent
        $data = $request->all();

        // store owner in variable
        $owner = Owner::create($data);

        // return the resource
        return new OwnerResource($owner);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return new OwnerResource($owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnerRequest $request, Owner $owner)
    {
        $owner = Owner::find($id);

        // get the request data
        $data = $request->all();
        // update the owner using the fill method
        // then save it to the database
        $owner->fill($data)->save();

        // return the resource
        return new OwnerResource($owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //delete the owner from DB
        $owner->delete();

        // use a 204 code as there is
        // no content in the response
        return response(null, 204);
    }

    public function animalPost(AnimalRequest $request, Owner $owner)
    {
        // create a new animal, passing in the data from the request JSON
        $animal = new Animal($request->all());

        // stores the animal in the DB while setting the owner_id
        $owner->animal()->save($animal);

        // return the stored animal
        return redirect("/owners/{$owner->id}");

    }
}
