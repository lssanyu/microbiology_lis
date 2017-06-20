<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicrobiologyTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Drugs table */
        Schema::create('drugs', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name',100)->unique();
            $table->string('description',100)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        /* Organisms table */
        Schema::create('organisms', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->string('name',100)->unique();
            $table->string('description',100)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        /* culture observations table */
        Schema::create('culture_observations', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->string('observation',300);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('test_id')->references('id')->on('unhls_tests');
        });

        /* isolated organisms table */
        Schema::create('isolated_organisms', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->integer('organism_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('test_id')->references('id')->on('unhls_tests');
            $table->foreign('organism_id')->references('id')->on('organisms');
        });

        /* drug susceptibility measures table */
        Schema::create('drug_susceptibility_measures', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('symbol',2);
            $table->string('interpretation',60);
        });

        /* drug susceptibility table */
        Schema::create('drug_susceptibility', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('drug_id')->unsigned();
            $table->integer('isolated_organism_id')->unsigned();
            $table->integer('drug_susceptibility_measure_id')->unsigned();
            $table->integer('zone_diameter')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('isolated_organism_id')->references('id')->on('isolated_organisms');
            $table->foreign('drug_susceptibility_measure_id')->references('id')->on('drug_susceptibility_measures');
        });

        Schema::create('gram_stain_ranges', function($table)
        {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('gram_stain_results', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->integer('gram_stain_range_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('test_id')->references('id')->on('unhls_tests');
            $table->foreign('gram_stain_range_id')->references('id')->on('gram_stain_ranges');
        });

        Schema::create('gram_break_points', function($table)
        {
            $table->increments('id');
            $table->integer('drug_id')->unsigned();
            $table->integer('gram_stain_range_id')->unsigned();
            $table->decimal('resistant_max', 4, 1)->nullable();
            $table->decimal('intermediate_min', 4, 1)->nullable();
            $table->decimal('intermediate_max', 4, 1)->nullable();
            $table->decimal('sensitive_min', 4, 1)->nullable();

            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('gram_stain_range_id')->references('id')->on('gram_stain_ranges');
        });

        /* gram drug susceptibility table */
        Schema::create('gram_drug_susceptibility', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('drug_id')->unsigned();
            $table->integer('gram_stain_result_id')->unsigned();
            $table->integer('drug_susceptibility_measure_id')->unsigned();
            $table->integer('zone_diameter')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('drug_id')->references('id')->on('drugs');
            $table->foreign('gram_stain_result_id')->references('id')->on('gram_stain_results');
            $table->foreign('drug_susceptibility_measure_id')->references('id')->on('drug_susceptibility_measures');
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gram_drug_susceptibility');
        Schema::dropIfExists('gram_break_points');
        Schema::dropIfExists('gram_stain_results');
        Schema::dropIfExists('gram_stain_ranges');
        Schema::dropIfExists('drug_susceptibility');
        Schema::dropIfExists('drug_susceptibility_measures');
        Schema::dropIfExists('isolated_organisms');
        Schema::dropIfExists('culture_observations');
        Schema::dropIfExists('culture_durations');
        Schema::dropIfExists('organisms');
        Schema::dropIfExists('drugs');
    }

}
