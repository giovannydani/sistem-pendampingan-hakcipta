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
        Schema::create('comment_hakciptas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DetailHakcipta::class, 'detail_hakcipta_id');
            $table->foreign('detail_hakcipta_id')->references('id')->on('detail_hakciptas')->onDelete('cascade')->onUpdate('cascade');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_hakciptas');
    }
};
