<?php

use App\Enums\AjuanStatus;
use App\Models\User;
use App\Models\Country;
use App\Models\CreationType;
use App\Models\ApplicationType;
use App\Models\CreationSubtype;
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
        Schema::create('detail_hakciptas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('number')->nullable();
            $table->foreignIdFor(User::class, 'owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(ApplicationType::class, 'application_type_id')->nullable();
            $table->foreign('application_type_id')->references('id')->on('application_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(CreationType::class, 'creation_type_id')->nullable();
            $table->foreign('creation_type_id')->references('id')->on('creation_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(CreationSubtype::class, 'creation_subtype_id')->nullable();
            $table->foreign('creation_subtype_id')->references('id')->on('creation_subtypes')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->date('first_announced_date')->nullable();
            $table->foreignIdFor(Country::class, 'first_announced_country_id')->nullable();
            $table->foreign('first_announced_country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('first_announced_city')->nullable();
            $table->string('status')->default(AjuanStatus::AdminProcess->value);
            $table->boolean('is_submited')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_hakciptas');
    }
};
