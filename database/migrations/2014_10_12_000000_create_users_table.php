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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('whatsapp_no');
            $table->string('refrence_by')->nullable();
            $table->string('profile_created_by_type')->nullable();
            $table->string('password');

            // Personal Details -
            $table->string('userId')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('birth_time')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('complexion')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->string('occupation')->nullable();
            $table->string('religion')->nullable();
            $table->longText('candidate_community')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('physical_status')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('candidate_income')->nullable();
            $table->longText('candidates_address')->nullable();

            $table->longText('photo')->nullable();
            $table->longText('id_proof')->nullable()->comment("Adhar Card, PAN Card, Voter Id, Driving Licence, COVID, Ayushman, Religion Id.");

            $table->boolean('terms_and_conditions')->nullable();
            $table->enum('profile_status', ["pending", "verified", "rejected"])->default("pending");
            $table->longText('profile_rejected_reason')->nullable();
            $table->enum('account_status',["active","inactive"])->default("active");
            $table->string('role_type')->default(0)->comment("1= superadmin ,0=Candidate or user");
            $table->string('created_by')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
