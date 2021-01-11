<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\API\TreatmentListResource;
use App\Models\Treatment;

class Treatments extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TreatmentListResource::collection(Treatment::all());
    }
       
}