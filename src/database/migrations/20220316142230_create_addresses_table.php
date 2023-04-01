<?php

use Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

final class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('addresses', function (Blueprint $table) {
            $table->id();

            $table->text('postal_code')->nullable();
            $table->text('address')->nullable();
            $table->text('number')->nullable();
            $table->text('neighborhood')->nullable();
            $table->text('city')->nullable();
            $table->string('state')->nullable();
            $table->json('complement')->nullable();

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
        $this->schema->dropIfExists('addresses');
    }
};
