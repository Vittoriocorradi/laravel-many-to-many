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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title', 75)->unique();
            $table->string('slug', 100);
            $table->string('image')->nullable();
            $table->string('status', 30);
            $table->date('starting_date');
            $table->date('finish_date')->nullable();
            $table->text('overview');
            $table->string('objectives');
            $table->text('roadmap')->nullable();
            $table->string('priority', 30)->nullable();
            $table->text('contributors')->nullable();
            $table->tinyInteger('is_finished')->default(0);

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
        Schema::dropIfExists('projects');
    }
};
