<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Day 11: link students to courses (a Student belongsTo a Course)
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreignId('course_id')
                  ->nullable()
                  ->after('roll_no')
                  ->constrained('courses')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropConstrainedForeignId('course_id');
        });
    }
};
