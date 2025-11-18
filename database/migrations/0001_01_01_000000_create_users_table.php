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
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('email', 191)->nullable()->unique();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->dateTime('last_login')->nullable();
            $table->string('email_token', 191)->nullable();
            $table->string('verification_code', 6)->nullable();
            $table->boolean('is_locked')->default(0);
            $table->string('phone_number', 50)->nullable();
            $table->string('birth_place', 100)->nullable();
            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->dateTime('last_password_change')->nullable();
            $table->string('twitter_id', 30)->nullable()->unique();
            $table->text('file_upload')->nullable();
            $table->tinyInteger('wrong_login')->default(0);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_majalengka')->default(0);
            $table->string('province_code', 20)->nullable();
            $table->string('city_code', 20)->nullable();
            $table->string('district_code', 20)->nullable();
            $table->string('village_code', 20)->nullable();
            // $table->foreign('province_code')->references('code')->on('regions')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('city_code')->references('code')->on('regions')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('district_code')->references('code')->on('regions')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('village_code')->references('code')->on('regions')->onUpdate('cascade')->onDelete('set null');
            $table->string('blocked_reason')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->dateTime('last_seen_at')->nullable();
            $table->boolean('is_anonymous')->default(0);
            $table->string('gender', 30)->nullable();
            $table->string('nik', 50)->nullable();
            $table->uuid()->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('last_updated_by_id')->nullable();
            $table->foreign('last_updated_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('deleted_by_id')->nullable();
            $table->foreign('deleted_by_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');

            // student
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->foreign('religion_id')->references('id')->on('religions')->onUpdate('cascade')->onDelete('set null');
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->unsignedBigInteger('school_class_id')->nullable();
            $table->foreign('school_class_id')->references('id')->on('school_classes')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('class_level_id')->nullable();
            $table->foreign('class_level_id')->references('id')->on('class_levels')->onUpdate('cascade')->onDelete('set null');
            $table->string('room', 50)->nullable();

            $table->string('father_nik', 50)->nullable();
            $table->string('father_name')->nullable();
            $table->date('father_birth_date')->nullable();
            $table->string('father_education', 100)->nullable();
            $table->unsignedBigInteger('father_work_id')->nullable();
            $table->foreign('father_work_id')->references('id')->on('works')->onUpdate('cascade')->onDelete('set null');
            $table->double('father_income')->nullable();

            $table->string('mother_nik', 50)->nullable();
            $table->string('mother_name')->nullable();
            $table->date('mother_birth_date')->nullable();
            $table->string('mother_education', 100)->nullable();
            $table->unsignedBigInteger('mother_work_id')->nullable();
            $table->foreign('mother_work_id')->references('id')->on('works')->onUpdate('cascade')->onDelete('set null');
            $table->double('mother_income')->nullable();

            $table->string('guardian_nik', 50)->nullable();
            $table->string('guardian_name')->nullable();
            $table->date('guardian_birth_date')->nullable();
            $table->string('guardian_education', 100)->nullable();
            $table->unsignedBigInteger('guardian_work_id')->nullable();
            $table->foreign('guardian_work_id')->references('id')->on('works')->onUpdate('cascade')->onDelete('set null');
            $table->double('guardian_income')->nullable();
            // end student

            // start teacher
            $table->string('teacher_nuptk')->nullable();
            $table->string('teacher_mother_name')->nullable();
            $table->string('teacher_employee_status', 100)->nullable();
            $table->string('teacher_gtk_type', 100)->nullable();
            $table->string('teacher_position', 100)->nullable();

            $table->unsignedBigInteger('education_level_id')->nullable();
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
