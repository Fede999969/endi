<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondominiumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominiums', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("photo")->nullable();
            $table->string("city")->nullable();
            $table->string("province")->nullable();
            $table->string("street")->nullable();
            $table->float("CAP")->nullable();
            $table->float("apartments")->nullable();
            $table->float("consumption")->nullable();
            $table->boolean("remote")->nullable();
            $table->string("accounting")->nullable();
            $table->string("probe")->nullable();
            $table->string("devices")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condominiums');
    }
}
