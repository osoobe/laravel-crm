<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('category')->nullable()->index();
            $table->string('industry')->nullable();
            $table->string('email')->nullable()->index();
            $table->string('phone_number')->nullable()->index();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->location();
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
        Schema::dropIfExists('companies');
    }
}
