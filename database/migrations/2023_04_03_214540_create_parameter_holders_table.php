<?php

use App\Models\Country;
use App\Models\District;
use App\Models\Province;
use App\Models\Subdistrict;
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
        Schema::create('parameter_holders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email');
            $table->text('no_telp');
            $table->foreignIdFor(Country::class, 'nationality_id');
            $table->foreign('nationality_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->text('address');
            $table->foreignIdFor(Country::class, 'country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Province::class, 'province_id')->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->string('district')->nullable();
            $table->foreignIdFor(District::class, 'district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Subdistrict::class, 'subdistrict_id')->nullable();
            $table->foreign('subdistrict_id')->references('id')->on('subdistricts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('postal_code', 6);
            $table->boolean('is_company')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parameter_holders');
    }
};
