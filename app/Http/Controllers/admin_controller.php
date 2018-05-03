<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\login;
use App\assignment;
use App\result;
use App\student;
use App\faculty;
use App\enrolled_in;
use App\teaches;


session_start();

class admin_controller extends Controller
{
    public function view_student()
    {
        //email id session insert
        $students= \DB::table('student')->get();
        //echo $students;
        if(count($students))
        {
           return view('/view_student',compact('students'));
        }
    }

     public function view_faculty()
    {
        //email id session insert
        $faculty= \DB::table('faculty')->get();
        //echo $students;
        if(count($faculty))
        {
           return view('/view_faculty',compact('faculty'));
        }
       

    }

    //add faculty
    public function add_faculty(Request $request)
    {
        $post = $request->all();
        $faculty=new faculty;
        $faculty->name=$post["name"];
        $faculty->dept_name=$post["branch"];
        $faculty->email_id=$post["email"];
        $faculty->save();

        $total=$post["course_selected"];
      //  print_r($total);
        $items=count($total);
      //  echo $items;
       // echo $total;
        for ($i=0; $i < $items; $i++) 
        { 
            $faculty_teaches = new teaches;
            $faculty_teaches->email_id=$post["email"];
            $faculty_teaches->course_id=$total[$i];
            $faculty_teaches->save();
        }
          return Redirect::to('/add_faculty')->with('alert', 'Details Updated Successfully...');

    }

     //add faculty
    public function add_student(Request $request)
    {
        $post = $request->all();
        $student=new student;
        $student->name=$post["name"];
        $student->roll_no=$post["roll_no"];
        $student->dept_name=$post["branch"];
        $student->email_id=$post["email"];
        $student->save();

        $total=$post["course_selected"];
     //   print_r($total);
        $items=count($total);
        echo $items;
       // echo $total;
        for ($i=0; $i < $items; $i++) 
        { 
            $student_registered_in = new enrolled_in;
            $student_registered_in->email_id=$post["email"];
            $student_registered_in->course_id=$total[$i];
            $student_registered_in->save();
        }
          return Redirect::to('/add_student')->with('alert', 'Details Updated Successfully...');

    }


    //for filter
    public function filter_student(Request $request)
    {
        $post=$request->all();
        if($request->has('selected_course'))
        {
            $course=$post["selected_course"];
            $students_enrolled= \DB::table('enrolled_in')->where('course_id',$post["selected_course"])->pluck('email_id');
            if(count($students_enrolled)>=1)
            {
                $students=\DB::table('student')->where('email_id',$students_enrolled)->get();
                if(count($students))
                    return view('/view_student',compact('students'));
                else
                    return Redirect::to('/view_student')->with('alert', 'No One registered...');
            }
            else
                return Redirect::to('/view_student')->with('alert', 'No One registered...');

        }
        else
            return Redirect::to('/view_student')->with('alert', 'No One registered...');

      }



     public function filter_faculty(Request $request)
    {
        $post=$request->all();
        if($request->has('selected_course'))
        {
            //echo "fdsa";
            $course=$post["selected_course"];
            $faculty_teaches= \DB::table('teaches')->where('course_id',$post["selected_course"])->pluck('email_id');
            //print_r($faculty_teaches);
            if(count($faculty_teaches)>=1)
            {
                $faculty=\DB::table('faculty')->where('email_id',$faculty_teaches)->get();
               // print_r($faculty);
                if(count($faculty)>=1)
                    return view('/view_faculty',compact('faculty'));
                else
                    return Redirect::to('/view_faculty  ')->with('alert', 'No One registered...');
            }
            else
            {
                    return Redirect::to('/view_faculty  ')->with('alert', 'No One registered...');    
            }
        }
        else
                return Redirect::to('/view_faculty  ')->with('alert', 'No One registered...');    
       
    }

    public function delete_student(Request $request)
    {
        if(isset($_POST['delete']))
        {
            $post=$request->all();
            if($request->has('deleted_items'))
            {
                $deleted_student=$post["deleted_items"];
                $items=count($deleted_student);
                if($items==0)
                    return Redirect::to('/view_student')->with('alert', 'No Student deleted...');
                else
                {
                    for ($i=0; $i < $items; $i++)
                    {
                        $students=\DB::table('student')->where('email_id',$deleted_student[$i])->delete();
                        $students=\DB::table('enrolled_in')->where('email_id',$deleted_student[$i])->delete();
                    }
                    return Redirect::to('/view_student')->with('alert', 'Students successfully deleted...');
                }

            }
            else
                return Redirect::to('/view_student')->with('alert', 'No Student deleted...');

        }
        elseif (isset($_POST['edit']))
        {
          //  echo "eradda";
            $post=$request->all();
            if($request->has('deleted_items'))
            {
                $edited_student=$post["deleted_items"];
                $items=count($edited_student);
                if($items==0)
                    return Redirect::to('/view_student')->with('alert', 'No Student edited...');
                else
                {
                    return view('/edit_student',compact('edited_student'));
                }
            }
            else
            {
                return Redirect::to('/view_student')->with('alert', 'No Student Edited...');
            }

        }
    } 


    public function delete_faculty(Request $request)
    {
        if(isset($_POST['delete']))
        {
            $post = $request->all();
            if ($request->has('deleted_items')) {
                $delete_faculty = $post["deleted_items"];
                $items = count($delete_faculty);
                if ($items == 0)
                    return Redirect::to('/view_faculty')->with('alert', 'No faculty deleted...');
                else {
                    for ($i = 0; $i < $items; $i++) {
                        $faculty = \DB::table('faculty')->where('email_id', $delete_faculty[$i])->delete();
                        $faculty = \DB::table('teaches')->where('email_id', $delete_faculty[$i])->delete();

                    }
                    return Redirect::to('/view_faculty')->with('alert', 'faculty successfully deleted...');
                }

            } else
                return Redirect::to('/view_faculty')->with('alert', 'No faculty deleted...');
        }
        elseif (isset($_POST['edit']))
        {
            //  echo "eradda";
            $post=$request->all();
            if($request->has('deleted_items'))
            {
                $edited_student=$post["deleted_items"];
                $items=count($edited_student);
                if($items==0)
                    return Redirect::to('/view_faculty')->with('alert', 'No faculty edited...');
                else
                {
                    return view('/edit_faculty',compact('edited_student'));
                }
            }
            else
            {
                return Redirect::to('/view_faculty')->with('alert', 'No Faculty Edited...');
            }

        }
                             
    }

    public function edited_student(Request $request)
    {
        $post=$request->all();
      //  print_r($post);
        $email_id=$post["email_id"];
        $students=\DB::table('enrolled_in')->where('email_id',$email_id)->get();
        $items=count($students);
        for ($i=0; $i < $items; $i++)
        {
            $student=\DB::table('enrolled_in')->where('email_id',$email_id)->delete();
        }

        $total=$post["course_selected"];
    //      print_r($total);
        $items=count($total);
        for ($i=0; $i < $items; $i++)
        {
            $student_registered_in = new enrolled_in;
            $student_registered_in->email_id=$post["email_id"];
            $student_registered_in->course_id=$total[$i];
            $student_registered_in->save();
        }
        return Redirect::to('/view_student')->with('alert', 'Details Updated Successfully...');
    }

    public function edited_faculty(Request $request)
    {
        $post=$request->all();
        //  print_r($post);
        $email_id=$post["email_id"];
        $students=\DB::table('teaches')->where('email_id',$email_id)->get();
        $items=count($students);
        for ($i=0; $i < $items; $i++)
        {
            $student=\DB::table('teaches')->where('email_id',$email_id)->delete();
        }

        $total=$post["course_selected"];
        //      print_r($total);
        $items=count($total);
        for ($i=0; $i < $items; $i++)
        {
            $student_registered_in = new teaches;
            $student_registered_in->email_id=$post["email_id"];
            $student_registered_in->course_id=$total[$i];
            $student_registered_in->save();
        }
        return Redirect::to('/view_faculty')->with('alert', 'Details Updated Successfully...');
    }

}

