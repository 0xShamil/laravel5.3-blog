<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blog_name');
            $table->string('blog_title');
            $table->string('blog_description');
            $table->text('blog_about')->nullable();
            $table->text('blog_copyright')->nullable();
            $table->text('blog_privacy')->nullable();
            $table->string('blog_facebook')->nullable();
            $table->string('blog_twitter')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
