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
        Schema::dropIfExists('focus_items');
        if (!in_array('focus_items', config('stisla.table_excludes')))
        Schema::create('focus_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('name');

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
        Schema::dropIfExists('focus_items');
    }
};
