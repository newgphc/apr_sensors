<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alarm;
use App\Sensor;
use App\User;
use App\AlarmUser;
use App\Place;
use Auth;

class AlarmController extends Controller
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
      $alarms = Alarm::with('sensor', 'sensor.place')->get();
      return view('admin.alarms.index',compact('alarms'))
      ->with('i', 0);
  }

  /**
   * Display a form for resource creatione.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $users_list = new \ArrayObject();
      $users = User::where('customer_id', Auth::user()->customer_id)->get();

      foreach($users as $user)
      {
          $user_item = new \stdClass();
          $user_item->id = $user->id;
          $user_item->name = $user->name;
          $user_item->isActive = Auth::user()->id == $user->id;
          $users_list->append($user_item);
      }

      $sensors = [];
      echo Auth::user()->customer_id;
      $places_list = Place::with('sensors')->where('customer_id', Auth::user()->customer_id)->get();


      foreach ($places_list as $place)
          foreach ($place->sensors as $sensor)
              $sensors += [$sensor->id => $place->name.' \ '.$sensor->description];

      return view('admin.alarms.create')
      ->with(['sensors' => $sensors, 'users' => $users_list]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      request()->validate([
          'name',
          'sensor_id',
          'alarm_type',
          'value'
      ]);

      $request->offsetSet('user_id', Auth::user()->id);

      $alarm = Alarm::create($request->all());

      foreach($request->user as $key => $user)
      {
          AlarmUser::create(
            [
                'alarm_id' => $alarm->id,
                'user_id' => $key
            ]
          );
      }

      return redirect()->route('alarms.index')
                      ->with('success','Alarma creado correctamente!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $alarm = Alarm::find($id);
      return response($alarm,200);
  }

  /**
   * Display the resource edit form.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit(Alarm $alarm)
  {
      $users_list = new \ArrayObject();
      $users = User::where('customer_id', Auth::user()->customer_id)->get();

      $users_to_notify = Alarm::with('alarm_users')->find($alarm->id);

      $selected_users = $users_to_notify->alarm_users()->get();

      $selected_users_ids = [];
      foreach ($selected_users as $selected_user)
          $selected_users_ids[] = $selected_user->id;


      foreach($users as $user)
      {
          $user_item = new \stdClass();
          $user_item->id = $user->id;
          $user_item->name = $user->name;
          $user_item->isActive = in_array($user->id, $selected_users_ids);
          $users_list->append($user_item);
      }

      $sensors = [];
      $places_list = Place::with('sensors')->where('customer_id', Auth::user()->customer_id)->get();
      foreach ($places_list as $place)
          foreach ($place->sensors as $sensor)
              $sensors += [$sensor->id => $place->name.' \ '.$sensor->description];

      return view('admin.alarms.edit',compact('alarm'))
              ->with(['sensors' => $sensors, 'users' => $users_list]);
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
      $alarm = Alarm::find($id)->update($request->all());
      return redirect()->route('alarms.index')
                      ->with('success','Alarma  actualizado correctamente!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      Alarm::find($id)->delete();
      return response(array(
              'message' =>'Alarm deleted successfully',
             ),200);
  }
}
