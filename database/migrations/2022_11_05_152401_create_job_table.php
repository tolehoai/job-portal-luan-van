<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('title');
            $table->boolean('is_active');
            $table->double('salary');
            $table->longText('job_desc');
            $table->longText('job_requirements');
            $table->integer('job_type_id');
            $table->integer('job_level_id');
            $table->integer('technology_id');
            $table->timestamps()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
