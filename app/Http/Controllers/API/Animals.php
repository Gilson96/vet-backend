<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Http\Requests\API\AnimalRequest;
use App\Http\Resources\API\AnimalResource;
use App\Http\Resources\API\AnimalListResource;

class Animals extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        return AnimalListResource::collection(Animal::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        return new AnimalResource($animal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalRequest $request, Animal $animal)
    {
        $data = $request->only(["name", "type", "dob", "weight", "height", "biteyness"]);

        $animal->update($data);

        $animal->setTreatments($request->get("treatments"));

        return new AnimalResource($animal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal->delete();
        return response(null, 204);
    }
}
