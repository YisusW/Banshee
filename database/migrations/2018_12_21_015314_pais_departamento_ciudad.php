<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaisDepartamentoCiudad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // tabla country
        Schema::create('country', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->boolean('status');
            $table->timestamps();
        });

        // tabla state
        Schema::create('state', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->unsignedInteger('country_id');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('country');
        });

        // tabla city
        Schema::create('city', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->unsignedInteger('state_id');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('state');
        });

        $this->register();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('city');
        Schema::dropIfExists('state');
        Schema::dropIfExists('country');
    }

    /**
     *
     *  Function que retorna los registros para los modulos necesarios (básicos)
     *  @return void
     */
    private function register()
    {
         \DB::table('country')->insert(array(
            'description'  => 'Colombia',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
         ));
         \DB::table('state')->insert(array(
            'description'  => 'Antioquia',
            'country_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
         ));
         \DB::table('city')->insert(array(
            'description'  => 'Medellin',
            'state_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
         ));
    }

}
