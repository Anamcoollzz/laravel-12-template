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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('job_name', 50);
			$table->string('department', 50);

            // wajib
            $table->timestamps();
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->unsignedBigInteger('last_updated_by_id')->nullable();
            $table->foreign('created_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('last_updated_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
