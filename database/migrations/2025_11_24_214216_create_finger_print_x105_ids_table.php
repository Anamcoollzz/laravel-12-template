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
        Schema::dropIfExists('finger_print_x105_ids');
        if (!in_array('finger_print_x105_ids', config('stisla.table_excludes')))
            Schema::create('finger_print_x105_ids', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('machine_id')->nullable()->comment('Nama Mesin');
                $table->foreign('machine_id')->references('id')->on('fingerprint_machines')->onUpdate('set null')->onDelete('set null');
                $table->string('pin', 50)->comment('PIN');
                $table->string('date_time', 50)->comment('DateTime');
                $table->string('verified', 50)->comment('Verified');
                $table->string('status', 50)->comment('Status');
                $table->string('work_code', 50)->comment('Work Code');

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
        Schema::dropIfExists('finger_print_x105_ids');
    }
};
