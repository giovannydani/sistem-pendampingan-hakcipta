<?php

use App\Models\DetailHakcipta;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attachment_hakciptas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(DetailHakcipta::class, 'detail_hakcipta_id');
            $table->foreign('detail_hakcipta_id')->references('id')->on('detail_hakciptas')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('salinan_resmi_akta_pendirian_badan_hukum');
            $table->string('turnitin');
            $table->string('scan_npwp');
            $table->string('contoh_ciptaan');
            $table->text('link_contoh_ciptaan')->nullable();
            $table->string('scan_ktp');
            $table->string('surat_pernyataan');
            $table->string('bukti_pengalihan_hak_cipta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachment_hakciptas');
    }
};
