<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return response()->json(['status' => true, 'data' => $regions]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $region = Region::create([
            'description' => $request->description
        ]);
        \LogActivity::addToLog('New region added');
        return response()->json(['status' => true, 'data' => $region]);
    }

    public function show(Region $region)
    {
        //
    }

    public function edit(Region $region)
    {
        //
    }

    public function update(Request $request, Region $region)
    {
        //
    }

    public function destroy(Request $request)
    {
        $region = Region::where('id_ref',$request->id)->count();
        if ($region === 0) {
            \LogActivity::addToLog("Region doesn't exists and can't be deleted");
            return response()->json(['status' => false, 'message' => "Region doesn't exists and can't be deleted"]);
        }else{
            $region = Region::destroy($request->id);
            \LogActivity::addToLog('Region deleted');
            return response()->json(['status' => true, 'message' => "Region deleted"]);
        }
    }
}
