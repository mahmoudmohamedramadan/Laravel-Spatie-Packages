<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

class UserLogsActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::get();
        /* you can also, get the latest activity using `last` method */
        // $activities = Activity::all()->last();
        /* returns the state of activity like `created` or `updated` */
        // $activities->description;
        /* returns the instance of User that was created */
        // $activities->object;
        /* returns the columns which `created` or `updated` or `deleted` like that ['attributes' => ['name' => 'Mahmoud Mohamed Ramadan', 'email' => 'test@gmail.com']]; */
        // $activities->changes;
        return view('logs_activity.index', compact('activities'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($activity)
    {
        Activity::findOrFail($activity)->delete();

        return redirect()->route('activitiy_logs.index');
    }
}
