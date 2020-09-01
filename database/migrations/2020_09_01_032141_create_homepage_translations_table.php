<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('homepage_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content');

            $table->unique(['homepage_id', 'locale']);
            $table->foreign('homepage_id')->references('id')->on('homepages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homepage_translations');
    }
}
