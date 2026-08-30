<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Day 14: File Uploads - store the path to the student's profile photo
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('photo')->nullable()->after('semester');
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('photo');
        });
    }
};
