<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pet;
use App\Http\Resources\Pet as PetResource;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get pets
        $pets = Pet::paginate(15);

        // Return collection of articles as a resource
        return PetResource::collection($pets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pet = $request->isMethod('put') ? Pet::findOrFail($request->pet_id) : new Pet;

        $pet->id = $request->input('pet_id');
        $pet->name = $request->input('name');
        $pet->species = $request->input('species');
        $pet->age = $request->input('age');

        if($pet->save()) {
            return new PetResource($pet);
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
        // Get Pet
        $pet = Pet::findOrFail($id);

        // Return single pet as a resource
        return new PetResource($pet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get Pet
        $pet = Pet::findOrFail($id);

        if($pet->delete()) {
            return new PetResource($pet);
        }
        
    }
}
