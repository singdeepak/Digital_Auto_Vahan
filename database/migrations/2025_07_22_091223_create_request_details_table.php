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
        Schema::create('request_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->constrained('requests')->onDelete('cascade');
            $table->string('reg_number');
            $table->string('old_reg_number');
            $table->string('reg_state');
            $table->string('reg_office');
            $table->date('fitness_valid_upto');
            $table->date('registration_valid_upto');

            // Finance Information
            $table->string('financer');

            // Owner Information
            $table->string('owner_name');
            $table->string('swdo_of');
            $table->string('ownership_serial');
            $table->string('mobile_number');
            $table->text('current_address');
            $table->text('permanent_address');

            // Vehicle Information
            $table->string('maker');
            $table->string('model');
            $table->string('vehicle_class');
            $table->string('vehicle_category');
            $table->string('emission_norms');
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->integer('seating_capacity');
            $table->integer('standing_capacity');
            $table->integer('sleeper_capacity');
            $table->integer('number_of_cylinders');
            $table->integer('unladen_weight');
            $table->integer('laden_weight');
            $table->string('fuel');
            $table->string('color');
            $table->integer('wheelbase');
            $table->integer('cubic_capacity');
            $table->string('manufacture_month_year');
            $table->string('body_type');

            // NOC Information
            $table->string('noc_number');
            $table->date('noc_issue_date');

            // Insurance Information
            $table->string('insurance_type');
            $table->string('insurance_company');
            $table->string('insurance_policy_number');
            $table->date('insurance_from_date');
            $table->date('insurance_to_date');

            // PUCC Information
            $table->string('pucc_number');
            $table->string('pucc_form');
            $table->date('pucc_upto');

            // Permit Information
            $table->string('permit_number');
            $table->string('permit_type');
            $table->date('permit_valid_from');
            $table->date('permit_valid_upto');

            // Tax Information
            $table->string('tax_type');
            $table->decimal('tax_amount', 10, 2);
            $table->date('tax_from');
            $table->date('tax_upto');

            // Optional PDF upload
            $table->string('document')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_details');
    }
};
