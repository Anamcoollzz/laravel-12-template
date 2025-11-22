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
                $table->string('pin', 50)->comment('PIN');
                $table->dateTime('datetime')->comment('Date Time');
                $table->tinyInteger('verified')->comment('Verified');
                $table->tinyInteger('status')->comment('Status');

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
