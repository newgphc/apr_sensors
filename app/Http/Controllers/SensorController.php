<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use App\Place;
use App\MeasurementUnit;
use App\MeasurementType;
use Auth;
class SensorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = Sensor::with('place')->get();
        return view('admin.sensors.index',compact('sensors'))
        ->with('i', 0);
    }

    /**
     * Display a form for resource creatione.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = Place::pluck('description', 'id');
        $measurements = [];
        $measurement_units = MeasurementUnit::has('measurement_types')->get();
        foreach($measurement_units as $measurement_unit)
            foreach($measurement_unit->measurement_types()->get() as $measurement_type)
                $measurements += [$measurement_type->id => $measurement_unit->name.' \ '.$measurement_type->name];

        return view('admin.sensors.create')
        ->with(['measurements' => $measurements, 'places' => $places]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*request()->validate([
            'name' => 'required',
        ]);*/

        $request->offsetSet('user_id', Auth::user()->id);
        $request->offsetSet('active', $request->active == 'on');

        Sensor::create($request->all());

        return redirect()->route('sensors.index')
                ->with('success','Sensora creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sensor = Sensor::find($id);
        return response($sensor,200);
    }

    /**
     * Display the resource edit form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        $places = Place::pluck('description', 'id');
        $measurements = [];
        $measurement_units = MeasurementUnit::has('measurement_types')->get();
        foreach($measurement_units as $measurement_unit)
            foreach($measurement_unit->measurement_types()->get() as $measurement_type)
                $measurements += [$measurement_type->id => $measurement_unit->name.' \ '.$measurement_type->name];

        return view('admin.sensors.edit', compact('sensor'))
        ->with(['measurements' => $measurements, 'places' => $places]);
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
        $request->offsetSet('active', $request->active == 'on');
        $sensor = Sensor::find($id)->update($request->all());
        return redirect()->route('sensors.index')
                        ->with('success','Sensora  actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sensor::find($id)->delete();
        return response(array(
                'message' =>'Sensor deleted successfully',
               ),200);
    }
}
