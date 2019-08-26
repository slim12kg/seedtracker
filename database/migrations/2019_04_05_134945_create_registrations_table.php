<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('applicant_firstname');
            $table->string('applicant_lastname');
            $table->string('phone');
            $table->string('email');
            $table->string('business_name')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->default('Nigeria');
            $table->longText('place_of_businesses')->nullable();
            $table->string('category_of_business')->nullable();
            $table->longText('name_of_proprietors')->nullable();
            $table->longText('name_of_board_of_directors')->nullable();
            $table->string('how_long_in_seed_business')->nullable();
            $table->longText('list_of_crop_to_be_handled')->nullable();
            $table->string('type_of_seeds')->nullable();
            $table->string('detail_of_seeds')->nullable();
            $table->string('source_of_parent_material')->nullable();
            $table->string('land_area')->nullable();
            $table->string('farm_machinery_implementation')->nullable();
            $table->string('seed_processing_grading_equipment')->nullable();
            $table->string('seed_processing_packaging_equipment')->nullable();
            $table->string('seed_storage_warehouse')->nullable();
            $table->string('seed_testing_lab_quality_control_equipment')->nullable();
            $table->string('other_facilities_available')->nullable();
            $table->string('trained_breeder')->nullable();
            $table->string('trained_seed_analyst')->nullable();
            $table->string('trained_agronomist')->nullable();
            $table->string('finance_to_cover_operation')->nullable();
            $table->string('evidence_of_inc')->nullable();
            $table->string('trainings_received')->nullable();
            $table->date('last_reviewed_by_admin')->nullable();
            $table->string('application_status')->default('pending');
            $table->boolean('provisional')->nullable();
            $table->string('status_reason')->nullable();
            $table->string('certificate_id')->nullable();
            $table->string('qr')->nullable();
            $table->longText('trainings')->nullable();
            $table->date('certification_start_date')->nullable();
            $table->date('certification_end_date')->nullable();

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
        Schema::dropIfExists('registrations');
    }
}
