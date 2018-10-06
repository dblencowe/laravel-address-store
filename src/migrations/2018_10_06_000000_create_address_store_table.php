<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $config = config('address_store');
        Schema::create('clients', function (Blueprint $table) use($config) {
            if ($config['use_uuids']) {
                $table->uuid('id');
                $table->primary('id');
            } else {
                $table->increments('id');
            }

            $table->string('label');
            $table->integer('street_number')->nullable();
            $table->string('number_suffix')->nullable();
            $table->string('street_name');
            $table->string('street_type')->nullable();
            $table->string('street_direction', 2)->nullable();
            $table->string('address_type')->nullable();
            $table->string('address_type_identifier')->nullable();
            $table->string('minor_municipality')->nullable();
            $table->string('major_municipality');
            $table->string('governing_district');
            $table->string('postal_identifier');
            $table->string('country_code', 2);
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
        Schema::dropIfExists('clients');
    }
}
