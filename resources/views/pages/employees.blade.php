@extends('layouts.app')

@section('content')
    <br>
    <input type="hidden" name="hidden_id" id="hidden_id">
    <div id="employees_list">
        <strong style="font-size:20px;">EMPLOYEES MASTER FILE</strong>
        <br><br>
            <table class="table table-striped table-bordered w-100" id="employeesTable">
                <thead class="text-white" style="background-color:#4e71cf;">
                    <tr>
                        <th>EMPLOYEE NO.</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>MIDDLE NAME</th>
                        <th>SUFFIX</th>
                        <th>POSITION</th>
                        <th>BRANCH</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
    </div>

     @if(Auth::user()->user_level == 'ADMIN') {{--To hide --}}
        <button type="button" class="btn btn-primary grow" id="addEmployeeBtn" title="CREATE NEW"><i class="fas fa-user-plus"></i></button>
    @endif
    {{-- Employee Personal Information Form --}}
    <div id="employee_personal_information">
        
        <div class="row">
            <div class="col">
                <strong style="font-size:20px;margin-left:16px;">EMPLOYEE INFORMATION</strong>
                {{-- <button type="button" class="btn btn-primary grow" id="masterListTableBtn" title="SHOW TABLE"><i class="fas fa-table"></i></button> --}}
            </div>
        </div><br>
        {{--Required Fields Head-Title--}}
        <div class="row">
            <div class="col-4">
                <div class="alert alert-warning" id="requiredFields">
                    <strong>NOTE:</strong> Please fill all the required fields
                </div>
            </div>
        </div>

        <fieldset class="border border-primary p-2">
            <legend class="float-none w-auto p-2"><i class="fas fa-info"></i> WORK INFORMATION</legend>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="employee_number" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="employee_number" class="formlabel form-label"><i class="far fa-id-card"></i> EMPLOYEE NO. (Required)</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="date" id="date_hired" placeholder=" " style="background-color:white;">
                            <label for="date_hired" class="formlabel form-label"><i class="fas fa-calendar" aria-hidden="true" style="zoom:120%;"></i> DATE HIRED (Required)</label> 
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control" type="text" id="status" placeholder=" " style="background-color:white;" disabled>
                            <label for="status" class="formlabel form-label"><i class="fas fa-info"></i> STATUS</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="position" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="position" class="formlabel form-label"><i class="fas fa-briefcase"></i> POSITION (Required)</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="branch" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="branch" class="formlabel form-label"><i class="fas fa-building"></i> BRANCH (Required)</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="time" id="shift" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="shift" class="formlabel form-label"><i class="fas fa-clock"></i> SHIFT (Required)</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="tin_number" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="tin_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> TIN NO. (Required)</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="pagibig_number" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="pagibig_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PAG-IBIG NO. (Required)</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="philhealth_number" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="philhealth_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> PHILHEALTH NO. (Required)</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="f-outline">
                            <input class="forminput form-control required_field" type="text" id="account_number" placeholder=" " style="background-color:white;" autocomplete="off">
                            <label for="account_number" class="formlabel form-label"><i class="fas fa-hashtag"></i> ACCOUNT NO. (Required)</label>
                        </div>
                    </div>
                </div>
        </fieldset>
        <br>
            
        <fieldset class="border border-primary p-2">
            <legend class="float-none w-auto p-2"><i class="fas fa-info"></i> PERSONAL INFORMATION</legend>
            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="first_name" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="first_name" class="formlabel form-label"><i class="far fa-address-card"></i> FIRST NAME (Required)</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="last_name" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="last_name" class="formlabel form-label"><i class="far fa-address-card"></i> LAST NAME (Required)</label>
                    </div>
                </div>
                <div class="col">
                    {{-- <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                                <input type="file" id="cover_image" name="cover_image">
                        </div>
                    </form> --}}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="middle_name" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="middle_name" class="formlabel form-label"><i class="far fa-address-card"></i> MIDDLE NAME (Optional)</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="suffix" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="suffix" class="formlabel form-label"><i class="far fa-address-card"></i> SUFFIX (Optional)</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <div class="f-outline">
                        <select class="form-select forminput form-control required_field"  id="gender" placeholder=" " style="background-color:white;" autocomplete="off">
                            <option value="" disabled selected>SELECT GENDER </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="gender" class="formlabel form-label"><i class="fa fa-venus-mars" aria-hidden="true" style="zoom:120%;"></i> GENDER (Required)</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="email_address" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="email_address" class="formlabel form-label"><i class="fas fa-envelope"></i> EMAIL ADDRESS (Required)</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="contact_number" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="contact_number" class="formlabel form-label"><i class="fas fa-phone-square-alt"></i> CONTACT NO. (Required)</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="home_address" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="home_address" class="formlabel form-label"><i class="fas fa-map-marker-alt"></i> HOME ADDRESS (Required)</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="emergency_contact_name" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="name_of_contact" class="formlabel form-label"><i class="fas fa-id-card"></i> IN CASE OF EMERGENCY (Required)</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="emergency_contact_relation" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="relationship" class="formlabel form-label"><i class="fas fa-user-friends"></i> RELATION (Required)</label>
                    </div>
                </div>
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control required_field" type="text" id="emergency_contact_number" placeholder=" " style="background-color:white;" autocomplete="off">
                        <label for="number_of_contact" class="formlabel form-label"><i class="fas fa-phone-square-alt"></i> CONTACT NO. (Required)</label>
                    </div>
                </div>
            </div>

        </fieldset>
        <br>

    <form action="post" id="educational_and_training_backgrounds_form">
        @csrf
        <input type="submit" name="save" id="save" class="btn btn-primary d-none" value="Save">
        <fieldset class="border border-primary p-2">
            <legend class="float-none w-auto p-2"><i class="fas fa-info"></i> EDUCATIONAL AND TRAININGS BACKGROUND</legend>
        {{-- Educational and Trainings Background --}}
        <div class="row">
            <div class="col-2">
                <strong style="font-size:16px;">COLLEGE EDUCATION</strong>
            </div>
            <div class="col">
                <button type="button" name="addCollegeRow" id="addCollegeRow" class="btn btn-primary grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        
            <table class="table table-striped table-bordered" id="college_education_table" style="display:none;">
                <thead class="text-white">
                    <tr>
                        <th>UNIVERSITY/COLLEGE</th>
                        <th>BACHELORS DEGREE</th>
                        <th>INCLUSIVE YEARS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="college_education_body">

                </tbody>
            </table>
        <hr>
    </form> 
         {{-- <div class="row">
            <div class="col-2">
                <strong style="font-size:16px;">VOCATIONAL</strong>
            </div>
            <div class="col">
                <button type="button" name="addVocationalRow" id="addVocationalRow" class="btn btn-primary grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
            <table class="table table-striped table-bordered" id="vocational_table" style="display: none;">
                <thead class="text-white">
                    <tr>
                        <th>NAME OF SCHOOL</th>
                        <th>COURSE</th>
                        <th>INCLUSIVE YEARS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="vocational_body">

                </tbody>
            </table>
        <hr>
        
        <div class="row">
            <div class="col-2">
                <strong style="font-size:16px;">TRAININGS</strong>
            </div>
            <div class="col">
                <button type="button" name="addTrainingRow" id="addTrainingRow" class="btn btn-primary grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
            <table class="table table-striped table-bordered" id="trainings_table" style="display: none;">
                <thead class="text-white">
                    <tr>
                        <th>NAME OF TRAINING SCHOOL</th>
                        <th>TRAINING TITLE</th>
                        <th>INCLUSIVE YEARS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="training_body">

                </tbody>
            </table> --}}
    
        <hr>
        <strong style="font-size:16px;">SECONDARY</strong>
        <br>
            <table class="table table-striped table-bordered" id="">
                <thead class="text-white">
                    <tr>
                        <th>NAME OF SCHOOL</th>
                        <th>ADDRESS</th>
                        <th>INCLUSIVE YEARS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="secondary" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="secondary" class="formlabel form-label"></label>
                            </div>
                        </td>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="secondary_address" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="secondary_address" class="formlabel form-label"></label>
                            </div>
                        </td>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="secondary_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="secondary_inclusive_years" class="formlabel form-label"></label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        <hr>
        <strong style="color: #0d1a80;font-size:20px;">PRIMARY</strong>
        <br>
            <table class="table table-striped table-bordered" id="">
                <thead class="text-white">
                    <tr>
                        <th>NAME OF SCHOOL</th>
                        <th>ADDRESS</th>
                        <th>INCLUSIVE YEARS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="primary" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="primary" class="formlabel form-label"></label>
                            </div>
                        </td>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="primary_address" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="primary_address" class="formlabel form-label"></label>
                            </div>
                        </td>
                        <td class="pb-2 pt-3">
                            <div class="f-outline">
                                <input class="forminput form-control" type="text" id="primary_inclusive_years" placeholder=" " style="background-color:white;" autocomplete="off">
                                <label for="primary_inclusive_years" class="formlabel form-label"></label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        <hr>
    </fieldset>
    <br>

     {{--<fieldset class="border border-primary p-2">
        <legend class="float-none w-auto p-2"><i class="fas fa-info"></i> EMPLOYEE DOCUMENTS</legend>
         Job History
        <div class="row">
            <div class="col-3">
                <strong style="color: #0d1a80;font-size:20px;">JOB HISTORY</strong>
            </div>
            <div class="col">
                <button type="button" name="addJobRow" id="addJobRow" class="btn btn-primary grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
            <h6>Start from the latest</h6>
            <table class="table table-striped table-bordered" id="job_table" style="display:none;">
                <thead class="text-white">
                    <tr>
                        <th>NAME OF COMPANY</th>
                        <th>POSITION</th>
                        <th>COMPANY NAME</th>
                        <th>ADDRESS</th>
                        <th>PHONE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="job_body">
                </tbody>
            </table>
            <hr>
    
            <div class="row">
                <div class="col-3">
                    <strong style="color: #0d1a80;font-size:20px;">MEMOS RECEIVED</strong>
                </div>
                <div class="col">
                    <button type="button" name="addMemoRow" id="addMemoRow" class="btn btn-primary grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
                </div>
            </div>
            
            <table class="table table-striped table-bordered" id="memos_table" style="display:none;">
                <thead class="text-white">
                    <tr>
                        <th>SUBJECT</th>
                        <th>DATE</th>
                        <th>OPTION</th>
                        <th>ATTACH FILE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="memos_body">

                </tbody>
            </table>
        <hr>

        <div class="row">
            <div class="col-3">
                <strong style="color: #0d1a80;font-size:20px;">EVALUATION</strong>
            </div>
            <div class="col">
                <button type="button" name="addEvaluationRow" id="addEvaluationRow" class="btn btn-primary grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
        
            <table class="table table-striped table-bordered" id="evaluation_table" style="display:none;">
                <thead class="text-white">
                    <tr>
                        <th>REASON FOR EVALUATION</th>
                        <th>DATE</th>
                        <th>EVALUATED BY</th>
                        <th>ATTACH FILE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="evaluation_body">
                </tbody>
            </table>
            <hr>

        <div class="row">
            <div class="col-3">
                <strong style="color: #0d1a80;font-size:20px;">CONTRACTS</strong>
            </div>
            <div class="col">
                <button type="button" name="addContractsRow" id="addContractsRow" class="btn btn-primary grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>
            <table class="table table-striped table-bordered" id="contracts_table" style="display: none;">
                <thead class="text-white">
                    <tr>
                        <th>TYPE OF CONTRACT</th>
                        <th>DATE ISSUED</th>
                        <th>ATTACH FILE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="contracts_body">
                </tbody>
            </table>
            <hr>

        <div class="row">
            <div class="col-3">
                <strong style="color: #0d1a80;font-size:20px;">RESIGNATION LETTER</strong>
            </div>
            <div class="col">
                <button type="button" name="addResignationRow" id="addResignationRow" class="btn btn-primary grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>

            <table class="table table-striped table-bordered" id="resignation_table" style="display: none;">
                <thead class="text-white">
                    <tr>
                        <th>RESIGNATION LETTER</th>
                        <th>DATE ISSUED</th>
                        <th>ATTACH FILE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="resignation_body">
                </tbody>
            </table>
            <hr>

        <div class="row">
            <div class="col-3">
                <strong style="color: #0d1a80;font-size:20px;">TERMINATION LETTER</strong>
            </div>
            <div class="col">
                <button type="button" name="addTerminationRow" id="addTerminationRow" class="btn btn-primary grow" title="ADD SECTION"><i class="fas fa-plus-square"></i></button>
            </div>
        </div>

            <table class="table table-striped table-bordered" id="termination_table" style="display:none;">
                <thead class="text-white">
                    <tr>
                        <th>TERMINATION LETTER</th>
                        <th>DATE ISSUED</th>
                        <th>ATTACH FILE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="termination_body">
                </tbody>
            </table>
            <hr>
    </fieldset>
    <br> --}}
        <button type="button" class="btn btn-primary mb-3 float-end" name="btnSave" id="btnSave" title="SAVE"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
        <button type="button" class="btn btn-primary mb-3 float-end" name="btnUpdate" id="btnUpdate" title="UPDATE"><i class="fa fa-pencil" aria-hidden="true"></i></button>
    </div>
@endsection