<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyWordsSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords_suggestions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('keyword_id')->index();
            $table->string('keyword_name');
            $table->json('suggestion');
            $table->string('data_source')->default("");
            $table->string('tool')->default("");
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
        Schema::dropIfExists('keywords_suggestions');
    }
}