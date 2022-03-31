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
        Schema::create('postcode', function (Blueprint $table) {
            $table->id();
            $table->char('country',2)->index()->nullable(false);
            $table->string('code',20)->index()->nullable(false);
            $table->string('place_name',180)->nullable(true);
            $table->string('admin_name1',100)->nullable(true);
            $table->string('admin_code1',20)->nullable(true);
            $table->string('admin_name2',100)->nullable(true);
            $table->string('admin_code2',20)->nullable(true);
            $table->string('admin_name3',100)->nullable(true);
            $table->string('admin_code3',20)->nullable(true);
            $table->string('latitude',20)->nullable(true);
            $table->string('longitude',20)->nullable(true);
            $table->integer('accuracy')->nullable(true);
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
        Schema::dropIfExists('postcode');
    }
};
