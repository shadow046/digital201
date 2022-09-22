@extends('layouts.app')

@section('content')
<br>
    <div id="users_list">
        <strong style="color: #0d1a80;font-size:20px;">USERS TABLE</strong>
        <table class="table table-striped table-bordered" id="users_table">
            <thead class="text-white" style="background-color:#4e71cf;">
                <tr>
                    <th>NAME</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary grow" id="addUserBtn" title="CREATE NEW USER"><i class="fas fa-user-plus"></i></button>
    </div>

    <div id="users_form">
        <fieldset class="border border-primary p-2 center">
            <legend class="float-none w-auto p-2"><i class="fas fa-user"></i> ADD USER</legend>
            <input type="hidden" id="hidden_id">
            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="text" id="name" name="name" placeholder=" ">
                        <label for="name" class="formlabel form-label">Fullname</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="email" id="email" name="email" placeholder=" ">
                        <label for="email" class="formlabel form-label">Email</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="f-outline">
                        <input class="forminput form-control" type="password" id="password" name="password" placeholder=" ">
                        <label for="password" class="formlabel form-label">Password</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="f-outline">
                        <input type="button" name="btnSave" id="btnSave" class="btn btn-primary bp float-end" value="SAVE">
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
@endsection