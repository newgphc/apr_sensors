<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeasurementTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeasurementType::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $measurementType = MeasurementType::create($request->all());
 
        return response()->json($measurementType, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $measurementType = MeasurementType::find($id);
        return response($measurementType,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        MeasurementType::find($id)->update($request->all());
        return response(array(
                'message' =>'MeasurementType updated successfully',
               ),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MeasurementType::find($id)->delete();
        return response(array(
                'message' =>'MeasurementType deleted successfully',
               ),200);
    }
}
