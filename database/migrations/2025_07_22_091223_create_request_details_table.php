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
            $table->string('old_reg_number')->nullable();           // Made nullable
            $table->string('reg_state');
            $table->string('reg_office');
            $table->date('fitness_valid_upto')->nullable();         // Made nullable
            $table->date('registration_valid_upto')->nullable();    // Made nullable

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
            $table->string('manufacture_month_year')->nullable();   // Made nullable
            $table->string('body_type');

            // NOC Information - Made nullable
            $table->string('noc_number')->nullable();
            $table->date('noc_issue_date')->nullable();

            // Insurance Information
            $table->string('insurance_type');
            $table->string('insurance_company');
            $table->string('insurance_policy_number');
            $table->date('insurance_from_date')->nullable();        // Made nullable
            $table->date('insurance_to_date')->nullable();          // Made nullable

            // PUCC Information
            $table->string('pucc_number');
            $table->string('pucc_form')->nullable();                // Made nullable
            $table->date('pucc_upto')->nullable();                  // Made nullable

            // Permit Information - Made nullable
            $table->string('permit_number')->nullable();
            $table->string('permit_type')->nullable();
            $table->date('permit_valid_from')->nullable();
            $table->date('permit_valid_upto')->nullable();

            // Tax Information - Made nullable
            $table->string('tax_type')->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->date('tax_from')->nullable();
            $table->date('tax_upto')->nullable();

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
