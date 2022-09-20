<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('category')->nullable()->index();
            $table->enum('lead_type', ['individual', 'business'])->default('business')->index();
            $table->string('email')->nullable()->index();
            $table->string('phone_number')->nullable()->index();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->string('gender')->nullable()->index();
            $table->string('source')->nullable();
            $table->string('source_key')->nullable();
            $table->string('status')->default('New');
            $table->nullableMorphs('stakeholder');
            $table->location();
            $table->coordinates();
            $table->userstamp();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
