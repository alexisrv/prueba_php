<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Region;
use Illuminate\Http\Request;
use Validator;

class CommuneController extends Controller
{
    public function index()
    {
        $communes = Commune::all();
        return response()->json(['status' => true, 'data' => $communes]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $commune = Commune::create([
            'fk_reg' => $request->region,
            'description' => $request->description
        ]);
        \LogActivity::addToLog('New commune added');
        return response()->json(['status' => true, 'data' => $commune]);
    }

    public function show(Commune $commune)
    {
        //
    }

    public function edit(Commune $commune)
    {
        //
    }

    public function update(Request $request, Commune $commune)
    {
        //
    }

    public function destroy(Request $request)
    {
        $commune = Commune::where('id_com',$request->id)->count();
        if ($commune === 0) {
            \LogActivity::addToLog("Commune doesn't exists and can't be deleted");
            return response()->json(['status' => false, 'message' => "Commune doesn't exists and can't be deleted"]);
        }else{
            $commune = Commune::destroy($request->id);
            \LogActivity::addToLog('Commune deleted');
            return response()->json(['status' => true, 'message' => "Commune deleted"]);
        }
    }
}
