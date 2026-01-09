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
        Schema::dropIfExists('picas');
        if (!in_array('picas', config('stisla.table_excludes')))
            Schema::create('picas', function (Blueprint $table) {
                $table->id();
                $table->string('title', 50)->nullable()->comment('Title');
                $table->text('notes')->nullable()->comment('Notes');
                $table->unsignedBigInteger('function_id')->nullable()->comment('Function');
                $table->foreign('function_id')->references('id')->on('pocari_functions')->onUpdate('set null')->onDelete('set null');
                $table->unsignedBigInteger('category_id')->nullable()->comment('Category');
                $table->foreign('category_id')->references('id')->on('categories')->onUpdate('set null')->onDelete('set null');
                $table->unsignedBigInteger('work_field_id')->nullable()->comment('Work Field');
                $table->foreign('work_field_id')->references('id')->on('work_fields')->onUpdate('set null')->onDelete('set null');
                $table->text('deadline', 50)->comment('Deadline');
                $table->text('kpi_related', 50)->comment('KPI Related');
                $table->text('assigned_to', 50)->comment('Assigned To');
                $table->date('created_date')->comment('Created Date');
                $table->text('problem_identification', 50)->nullable()->comment('Problem Identification');
                $table->text('corrective_action', 50)->nullable()->comment('Corrective Action');
                $table->text('attachment', 50)->nullable()->comment('Attachment');
                $table->text('evidence', 50)->nullable()->comment('Evidence');
                $table->unsignedBigInteger('status_id')->nullable()->comment('Status');
                $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('set null')->onDelete('set null');
                $table->text('revision_notes')->nullable()->comment('Rejection Notes');

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('picas');
    }
};
