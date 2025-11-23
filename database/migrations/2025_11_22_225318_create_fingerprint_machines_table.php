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
        Schema::dropIfExists('fingerprint_machines');
        if (!in_array('fingerprint_machines', config('stisla.table_excludes')));
        Schema::create('fingerprint_machines', function (Blueprint $table) {
            $table->id();
            $table->string('machine_name', 50)->comment('Nama Mesin');
			$table->string('ip', 50)->comment('IP');
			$table->string('key', 50)->comment('Key');
			$table->unsignedBigInteger('machine_id')->nullable()->comment('ID Mesin');
			$table->foreign('machine_id')->references('id')->on('machines')->onUpdate('set null')->onDelete('set null');
			$table->string('fn', 50)->comment('FN');

            // wajib
            $table->timestamps();
            
            $table->unsignedBigInteger('created_by_id')->nullable()->comment('Created By');
            $table->unsignedBigInteger('last_updated_by_id')->nullable()->comment('Last Updated By');
            $table->foreign('created_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('last_updated_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fingerprint_machines');
    }
};
