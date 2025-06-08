<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nomor_kk')->nullable()->after('name');
            $table->string('nomor_nik')->nullable()->after('nomor_kk');
            $table->string('tempat_lahir')->nullable()->after('nomor_nik');
            $table->date('tanggal_lahir')->nullable()->after('tempat_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable()->after('tanggal_lahir');
            $table->string('pekerjaan')->nullable()->after('jenis_kelamin');
            $table->string('status')->nullable()->after('pekerjaan');
            $table->text('alamat_rt005')->nullable()->after('status');
            $table->text('alamat_ktp')->nullable()->after('alamat_rt005');
            $table->string('role')->default('user')->after('alamat_rt005');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nomor_kk',
                'nomor_nik',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'pekerjaan',
                'status',
                'alamat_rt005',
                'alamat_ktp',
                'role',
            ]);
        });
    }
};
