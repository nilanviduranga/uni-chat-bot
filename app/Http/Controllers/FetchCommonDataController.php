<?php

namespace App\Http\Controllers;

use App\Models\degreeProgramme;
use App\Models\department;
use App\Models\Event;
use Illuminate\Http\Request;

class FetchCommonDataController extends Controller
{
    //fetch all department data
    public function fetchDepartmentData($id)
    {
        if ($id) {
            $department = department::find($id);
            if ($department) {
                return response()->json($department);
            } else {
                return response()->json(['error' => 'Department not found'], 404);
            }
        } else {
            $departments = department::all();
            return response()->json($departments);
        }
    }

    //fetch all event data
    public function fetchEventData($id)
    {
        if ($id) {
            $event = Event::find($id);
            if ($event) {
                return response()->json($event);
            } else {
                return response()->json(['error' => 'Event not found'], 404);
            }
        } else {
            $events = Event::all();
            return response()->json($events);
        }
    }

    //fetch all degree programe data
    public function fetchDegreeProgrammeData($id)
    {
        if ($id) {
            $degreeProgramme = degreeProgramme::find($id);
            if ($degreeProgramme) {
                return response()->json($degreeProgramme);
            } else {
                return response()->json(['error' => 'Degree Programme not found'], 404);
            }
        } else {
            $degreeProgrammes = degreeProgramme::all();
            return response()->json($degreeProgrammes);
        }
    }

}
