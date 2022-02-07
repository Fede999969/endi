<?php

namespace App\Http\Controllers;

use App\Models\Condominium;
use Illuminate\Http\Request;

class CondominiumsController extends Controller
{
    public function list() {
        return Condominium::orderBy('id', 'desc')->get();
    }

    public function detail ($id) {
        return Condominium::where("id", $id)->first();
    }

    public function create(Request $req) {
        $condominiumData = json_decode($req->getContent());

        $condominium = new condominium();

        $condominium->name = $condominiumData->name;
        $condominium->photo = $condominiumData->photo;
        $condominium->city = $condominiumData->city;
        $condominium->province = $condominiumData->province;
        $condominium->street = $condominiumData->street;
        $condominium->CAP = $condominiumData->CAP;
        $condominium->apartments = $condominiumData->apartments;
        $condominium->consumption = $condominiumData->consumption;
        $condominium->remote = $condominiumData->remote;
        $condominium->accounting = $condominiumData->accounting;
        $condominium->probe = $condominiumData->probe;
        $condominium->devices = $condominiumData->devices;

        $condominium->save();

        return response()->json($condominium, 201);
    }

        public function modify(Request $req, $id) {
            $condominium = condominium::where("id", $id)->first();
    
            // Get data from request
            $condominiumData = json_decode($req->getContent());
    
            $condominium->name = $condominiumData->name;
            $condominium->photo = $condominiumData->photo;
            $condominium->city = $condominiumData->city;
            $condominium->province = $condominiumData->province;
            $condominium->street = $condominiumData->street;
            $condominium->CAP = $condominiumData->CAP;
            $condominium->apartments = $condominiumData->apartments;
            $condominium->consumption = $condominiumData->consumption;
            $condominium->remote = $condominiumData->remote;
            $condominium->accounting = $condominiumData->accounting;
            $condominium->probe = $condominiumData->probe;
            $condominium->devices = $condominiumData->devices;
    
            $condominium->save();
    
            return response()->json($condominium, 200);
        }

        public function destroy($id) {
            return Condominium::destroy($id);
        }
    
}
