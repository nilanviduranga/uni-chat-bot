<?php

namespace App\Http\Controllers;

use App\Models\BusSchedule;
use App\Models\CafeteriaMenu;
use App\Models\courseModule;
use App\Models\CourseModuleSchedule;
use App\Models\degreeProgramme;
use App\Models\department;
use App\Models\Event;
use App\Models\semester;
use App\Models\studentBatch;
use App\Models\User;
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

    //fetch all course module schedule data
    public function fetchCourseModuleScheduleData($id)
    {
        if ($id) {
            $courseModuleSchedule = CourseModuleSchedule::find($id);
            if ($courseModuleSchedule) {
                return response()->json($courseModuleSchedule);
            } else {
                return response()->json(['error' => 'Course Module Schedule not found'], 404);
            }
        } else {
            $courseModuleSchedules = CourseModuleSchedule::all();
            return response()->json($courseModuleSchedules);
        }
    }

    public function fetchLectureScheduleByStudent(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'date_format:Y-m-d|nullable', // Optional date filter
        ]);
        $user = User::find($request->student_id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $studentBatch = studentBatch::where('id', $user->batch_id)->first();
        if (!$studentBatch) {
            return response()->json(['error' => 'Student Batch not found'], 404);
        }

        // $degreeProgramme = degreeProgramme::where('id', $user->degree_programme_id)->first();
        // if (!$degreeProgramme) {
        //     return response()->json(['error' => 'Degree Programme not found'], 404);
        // }

        $semester = semester::where('id', $studentBatch->semester_id)->first();
        if (!$semester) {
            return response()->json(['error' => 'Semester not found'], 404);
        }

        $userCourseModules = courseModule::where('semester_id', $studentBatch->semester_id)
            ->where('degree_programme_id', $user->degree_programme_id)
            ->get();

        if ($userCourseModules->isEmpty()) {
            return response()->json(['error' => 'No course modules found for this user'], 404);
        }

        $courseModuleSchedules = CourseModuleSchedule::whereIn('course_code', $userCourseModules->pluck('course_code'));
        if ($request->date) {
            $courseModuleSchedules->where('class_date', $request->date);
        }
        $courseModuleSchedules = $courseModuleSchedules->with('module')->get();

        return response()->json($courseModuleSchedules);
    }


    //fetch bus route data
    public function fetchBusRouteData($id)
    {
        if ($id) {
            $busRoute = BusSchedule::find($id);
            if ($busRoute) {
                return response()->json($busRoute);
            } else {
                return response()->json(['error' => 'Bus Route not found'], 404);
            }
        } else {
            $busRoutes = BusSchedule::all();
            return response()->json($busRoutes);
        }
    }

    //fetch cafeteria menu data
    public function fetchCafeteriaMenuData($id)
    {
        if ($id) {
            $cafeteriaMenu = CafeteriaMenu::find($id);
            if ($cafeteriaMenu) {
                return response()->json($cafeteriaMenu);
            } else {
                return response()->json(['error' => 'Cafeteria Menu not found'], 404);
            }
        } else {
            $cafeteriaMenus = CafeteriaMenu::all();
            return response()->json($cafeteriaMenus);
        }
    }
}
