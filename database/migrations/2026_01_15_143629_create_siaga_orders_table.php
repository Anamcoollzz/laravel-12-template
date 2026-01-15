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
        Schema::dropIfExists('siaga_orders');
        if (!in_array('siaga_orders', config('stisla.table_excludes')))
            Schema::create('siaga_orders', function (Blueprint $table) {
                $table->id();
                $table->string('full_name', 50)->nullable()->comment('Nama Lengkap');
                $table->string('phone_number', 50)->nullable()->comment('No HP');
                $table->string('lokasi_keberangkatan', 191)->nullable()->comment('Lokasi Keberangkatan');
                $table->string('alamat_tujuan', 191)->nullable()->comment('Alamat Tujuan');
                $table->string('car_type', 50)->nullable()->comment('Jenis Mobil');
                $table->date('tgl_penggunaan')->nullable()->comment('Tanggal Penggunaan');
                $table->time('perkiraan_jam')->nullable()->comment('Perkiraan Jam');
                $table->text('additional_notes')->nullable()->comment('Catatan Tambahan');
                $table->string('status', 50)->nullable()->comment('Status');

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
        Schema::dropIfExists('siaga_orders');
    }
};
