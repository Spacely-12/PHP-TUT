<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB; // Add this line
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->timestamps();
        });

        // Insert default user types
        DB::table('user_types')->insert([
            ['type' => 'admin'],
            ['type' => 'user'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('user_types');
    }
};
