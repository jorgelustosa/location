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
        Schema::create('country', function (Blueprint $table) {
            $table->id();
            $table->string('iso',2)->nullable(false);
            $table->string('iso3',3)->nullable(true);
            $table->string('iso_numeric',3)->nullable(true);
            $table->string('fips',2)->nullable(true);
            $table->string('country',100)->nullable(false);
            $table->string('capital',1024)->nullable(false);
            $table->bigInteger('area')->nullable(true);
            $table->bigInteger('population')->nullable(true);
            $table->string('continent',10)->nullable(true);
            $table->string('tld',100)->nullable(true);
            $table->string('currency_code',45)->nullable(true);
            $table->string('currency_name',100)->nullable(true);
            $table->string('phone',60)->nullable(true);
            $table->string('postalcode_format',45)->nullable(true);
            $table->string('postalcode_regex',255)->nullable(true);
            $table->string('languages',255)->nullable(true);
            $table->string('geonameid',100)->nullable(true);
            $table->string('neighbours',255)->nullable(true);
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
        Schema::dropIfExists('country');
    }
};
