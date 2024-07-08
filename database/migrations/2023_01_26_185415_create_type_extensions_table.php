<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_extensions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('project_types')->cascadeOnDelete();
            $table->foreignId('ext_id')->constrained('extensions')->cascadeOnDelete();
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
        Schema::dropIfExists('type_extensions');
    }
};
