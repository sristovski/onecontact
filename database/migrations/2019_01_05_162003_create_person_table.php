<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->increments('person_id');
            $table->char('Person_Type', 10)->nullable(true)->default(null);
            $table->char('person_status', 10)->nullable(true)->default(null);
            $table->char('First_name', 20)->nullable(true)->default(null);
            $table->char('Middle_Name', 20)->nullable(true)->default(null);
            $table->char('Last_Name', 20)->nullable(true)->default(null);
            $table->char('Phone', 20)->nullable(true)->default(null);
            $table->char('Mobile', 50)->nullable(true)->default(null);
            $table->char('EMail', 50)->nullable(true)->default(null);
            $table->char('Login_ID', 20)->nullable(true)->default(null);
            $table->char('password', 20)->nullable(true)->default(null);
            $table->date('DOB')->nullable(true)->default(null);
            $table->string('street_address', 50)->nullable(true)->default(null);
            $table->string('City', 50)->nullable(true)->default(null);
            $table->string('State_Province', 50)->nullable(true)->default(null);
            $table->string('Country', 50)->nullable(true)->default('Canada');
            $table->string('PostCode_ZipCode', 10)->nullable(true)->default(null);
            $table->binary('image')->nullable(true)->default(null);;
            $table->geometry('geolocation')->nullable(true)->default(null);
            $table->string('Created_by', 50)->nullable(true)->default(null);
            $table->dateTime('Created_dt')->nullable(true)->default(null);
            $table->string('Modified_by', 50)->nullable(true)->default(null);
            $table->dateTime('Modified_dt')->nullable(true)->default(null);
            $table->integer('grade')->nullable(true)->default(null);
            $table->decimal('radius', 4, 1)->nullable(true)->default(null);
            $table->string('remember_token', 255)->nullable(true)->default(null);
            $table->enum('person_status_copy1', ['REG_EMAIL', 'PROFILE_START', 'BG_CHECK', 
            'INTERVIEW_SCH', 'PROFILE_COMP'])->default('REG_EMAIL');
            $table->string('email_token', 255)->nullable(true)->default(null);
            $table->string('forget_token', 255)->nullable(true)->default(null);
            $table->string('interview_token', 255)->nullable(true)->default(null);
            $table->boolean('emailnotification')->default(0);
            $table->boolean('mobilenotification')->default(0);
            $table->boolean('isdeleted')->default(0);
            $table->decimal('latitude', 10, 6)->nullable(true)->default(null);
            $table->decimal('longitude', 10, 6)->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person');
    }
}