<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function save(Request $req)
    {
        $type = Type::where("id", $req["id"])->with("machines")->get()[0];
        if ($type != null) {
            $type->ref = $req["ref"];
            $type->nom = $req["nom"];
            $type->disc = $req["disc"];
            $type->fournisseur = $req["fournisseur"];
            $type->save();

            return response()->json($type);
        }
    }

    public function add(Request $req)
    {
       $type = new Type();
        $type->ref = $req["ref"];
        $type->nom = $req["nom"];
        $type->disc = $req["disc"];
        $type->fournisseur = $req["fournisseur"];
        $type->save();
        
        $type = Type::all();
        return response()->json($type);
        
    }
    public function deleteType(Request $req)
    {
        $ma = Type::find($req["id"]);
        $ma->delete();
        return $req["id"];
    }
}
