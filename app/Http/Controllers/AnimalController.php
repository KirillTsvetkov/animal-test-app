<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnimalResource;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Kind;
use Faker\Factory as Faker;

class AnimalController extends Controller
{
    public function getAnimal(Request $request)
    {
        $name = $request->name;
        $animal = Animal::where('name','=', $name)->first();

        return AnimalResource::collection($animal);
    }

    public function getAllAnimal(Request $request)
    {
        $animals = Animal::get()->all();
        return AnimalResource::collection($animals);
        //return Animal::with('kind')->get();
    }

    public function createAnimal(Request $request)
    {
        
        $name = $request->name;
        $check_name = Animal::where('name', $name)->first();
        if($check_name != null){
            return response()->json([
                'error' => 'name',
                'data' => 'this animal name exist',
            ]);
        }
       
        $kindName = $request->kindName;
        $kind = Kind::where('name', $kindName)->first();

        $newAnimal = Animal::create([
            'name' => $name,
            'kind_id' => $kind->id,
            'age'  => 0,
            'size' => 1,
        ]);
        
        return response()->json([
            'error' => null,
            'data' => 'ok',
        ]);

    }

    public function makeOld(Request $request)
    {
        $name = $request->name;
        $animal = Animal::where('name', $name)->first();
        $animal->age = $animal->kind->max_age;
        $animal->size = $animal->kind->max_size;
        $animal->save();
        return response()->json([
            'error' => null,
            'data' => 'ok',
        ]);
    }
}
