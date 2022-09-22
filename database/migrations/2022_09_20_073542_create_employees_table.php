<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            //Work Information
            $table->string('employee_number');
            $table->string('date_hired');
            $table->string('status');
            $table->string('position');
            $table->string('branch');
            $table->string('shift');
            $table->string('tin_number');
            $table->string('pagibig_number');
            $table->string('philhealth_number');
            $table->string('account_number');
            //Personal Information
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('suffix');
            $table->string('gender');
            $table->string('email_address');
            $table->string('contact_number');
            $table->string('home_address');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relation');
            $table->string('emergency_contact_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
