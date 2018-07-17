<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('category');
            $table->string('type');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('description');
            $table->string('venue');
            $table->string('contact_person');
            $table->string('contact_no');
            $table->string('user_id');
            $table->string('status')->default("Saved");
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('template')->default(true);
            $table->string('url')->nullable();
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
}
