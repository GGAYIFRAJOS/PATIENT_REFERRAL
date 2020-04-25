<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();

            $table->string('title');
            $table->longText('diagnosis');
            $table->longText('procedure');
            $table->longText('lab_report');
            $table->longText('drug_allergies');
            $table->longText('drugs_offered');
            $table->longText('recommendations');
            $table->string('next_of_kin');
            $table->date('set_date')->nullable();
            $table->string('status')->default('SENT')->nullable();
            $table->string('sending_hospital');
            $table->string('sending_doctor');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('hospital_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('user_id');




            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('referrals');
    }
}
