<?php

use App\Models\CreationType;
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
        Schema::create('creation_subtypes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(CreationType::class, 'type_id');
            $table->foreign('type_id')->references('id')->on('creation_types')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creation_subtypes');
    }
};
