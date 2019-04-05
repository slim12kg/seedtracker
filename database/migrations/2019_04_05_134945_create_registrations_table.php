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
            $table->string('applicant_firstname');
            $table->string('applicant_lastname');
            $table->string('phone');
            $table->string('email');
            $table->string('business_name');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->longText('place_of_businesses');
            $table->string('category_of_business');
            $table->longText('name_of_proprietors');
            $table->longText('name_of_board_of_directors');
            $table->string('how_long_in_seed_business');
            $table->longText('list_of_crop_to_be_handled');
            $table->string('type_of_seeds');
            $table->string('detail_of_seeds');
            $table->string('source_of_parent_material');
            $table->string('land_area');
            $table->string('farm_machinery_implementation');
            $table->string('seed_processing_grading_equipment');
            $table->string('seed_processing_packaging_equipment');
            $table->string('seed_storage_warehouse');
            $table->string('seed_testing_lab_quality_control_equipment');
            $table->string('other_facilities_available');
            $table->string('trained_breeder');
            $table->string('trained_seed_analyst');
            $table->string('trained_agronomist');
            $table->string('finance_to_cover_operation');
            $table->string('evidence_of_equipment');
            $table->boolean('application_status');
            $table->string('certificate_id');
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
