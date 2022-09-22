<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\College;
use DataTables;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listOfEmployees(){
        $employees = Employee::all();
        return DataTables::of($employees)
        ->addColumn('action',function($employees){
            return '<a href="#" class="btn btn-primary edit" title="EDIT" id="'.$employees->id.'"><i class="fas fa-edit"></i></a>';
        })
        ->make(true);
    }
    public function save(Request $request){

        //Handle File Upload

        // if($request->hasFile('cover_image')){
        //     //Get filename with the extension
        //     $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //     //Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     //Get just ext
        //     $extension = $request->file('cover_image')->getClientOriginalExtension();
        //     //Filename to store
        //     $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //     //Upload Image
        //     $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        // }
        // else{
        //     $fileNameToStore = 'noimage.jpg';
        // }

        $employees = new Employee;
        //Work Information
        $employees->employee_number = $request->employee_number;
        $employees->date_hired = $request->date_hired;
        $employees->status = $request->status;
        $employees->position = $request->position;
        $employees->branch = $request->branch;
        $employees->shift = $request->shift;
        $employees->tin_number = $request->tin_number;
        $employees->pagibig_number = $request->pagibig_number;
        $employees->philhealth_number = $request->philhealth_number;
        $employees->account_number = $request->account_number;
        //Personal Information
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->middle_name = $request->middle_name;
        $employees->suffix = $request->suffix;
        $employees->gender = $request->gender;
        $employees->email_address = $request->email_address;
        $employees->contact_number = $request->contact_number;
        $employees->home_address = $request->home_address;
        $employees->emergency_contact_name = $request->emergency_contact_name;
        $employees->emergency_contact_relation = $request->emergency_contact_relation;
        $employees->emergency_contact_number = $request->emergency_contact_number;

        $sql = $employees->save();//To save data 

        return $sql ? 'true' : 'false';
    }

    public function fetch(Request $request){
        $employees = Employee::where('id',$request->id)->first();
        return $employees;
    }

    public function insert(Request $request){

        $college_name = $request->college_name;
        $college_degree = $request->college_degree;
        $college_inclusive_years = $request->college_inclusive_years;

        for($count = 0; $count < count($company_name); $count++){
            $data = array(
                'college_name' => $company_name[$count],
                'college_degree' => $college_degree[$count],
                'college_inclusive_years' => $college_inclusive_years[$count]
            );
            $insert_data[] = $data;
        }
        $sql = College::insert($insert_data);
    }
}
