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
        Schema::create('child_cases', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female', 'Non-binary', 'Other']);
            $table->string('guardian_information'); // Store as a string (could be serialized JSON if needed)
            $table->string('case_number')->unique();
            $table->enum('status', ['Open', 'Closed', 'In Progress']);
            $table->enum('risk_level', ['Low', 'Medium', 'High', 'Critical']);
            $table->date('date_opened');
            $table->date('date_closed')->nullable();
            $table->text('notes_comments')->nullable();
            $table->enum('ethnicity', ['Caucasian', 'African American', 'Hispanic', 'Asian', 'Other']);
            $table->boolean('disability_status')->default(false);
            $table->string('school_information')->nullable();
            $table->string('special_needs')->nullable();
            $table->timestamp('last_updated_at')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Lookup to User
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_cases');
    }
};
