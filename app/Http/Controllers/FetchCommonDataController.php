<?php

namespace App\Http\Controllers;

use App\Models\courseModule;
use App\Models\degreeProgramme;
use App\Models\department;
use App\Models\Event;
use App\Models\studentBatch;
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

    //fetch all course module data
    public function fetchCourseModuleData($id)
    {
        if ($id) {
            $courseModule = courseModule::find($id);
            if ($courseModule) {
                return response()->json($courseModule);
            } else {
                return response()->json(['error' => 'Course Module not found'], 404);
            }
        } else {
            $courseModules = CourseModule::all();
            return response()->json($courseModules);
        }
    }

    //fetch all student batch data
    public function fetchStudentBatchData($id)
    {
        if ($id) {
            $studentBatch = studentBatch::find($id);
            if ($studentBatch) {
                return response()->json($studentBatch);
            } else {
                return response()->json(['error' => 'Student Batch not found'], 404);
            }
        } else {
            $studentBatches = studentBatch::all();
            return response()->json($studentBatches);
        }
    }
}
