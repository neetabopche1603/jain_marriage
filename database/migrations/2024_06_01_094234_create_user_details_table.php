<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->comment("belongs to users table");

            //  If NRI-
            $table->string('if_nri')->nullable();
            $table->string('candidate_visa')->nullable();
            $table->string('address_nri_citizen')->nullable()->comment("NRI Citizen");

            // Family Details -
            $table->string('father_name')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('residence_type')->nullable();
            $table->string('family_status')->nullable();
            $table->string('family_type')->nullable();
            $table->longText('gotra')->nullable();
            $table->longText('family_community')->nullable();
            $table->longText('family_sub_community')->nullable();
            $table->longText('family_address')->nullable();


            // Siblings Details -
            $table->string('brother')->nullable();
            $table->string('sister')->nullable();
            $table->longText('other_family_details')->nullable();
            $table->string('calling_no')->nullable();
            $table->string('are_you_manglik')->nullable();

            // Partner Preference -
            $table->string('partner_age_group_from')->nullable();
            $table->string('partner_age_group_to')->nullable();
            $table->string('partner_income')->nullable();
            $table->longText('partner_country')->nullable();
            $table->longText('partner_state')->nullable();
            $table->longText('partner_city')->nullable();
            $table->longText('partner_education')->nullable();
            $table->longText('partner_education_desc')->nullable();
            $table->longText('partner_occupation')->nullable();
            $table->longText('partner_profession')->nullable();
            $table->longText('partner_hobbies')->nullable();
            $table->string('partner_manglik')->nullable();

            $table->string('partner_marital_status')->nullable();
            $table->string('partner_acccept_kid')->nullable()->comment('wit kit,without kit,any');
            $table->longText('partner_kid_discription')->nullable();

            $table->string('astrology_matching')->nullable();
            $table->longText('expectation_partner_details')->nullable();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
