<?php

use Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

final class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('clients', function (Blueprint $table) {
            $table->id();

            $table->text('full_name')->nullable();
            $table->text('mother_full_name')->nullable();
            $table->text('document_number')->nullable();
            $table->dateTime('birth_date')->nullable();

            $table->string('cell_phone')->nullable();
            $table->boolean('cell_phone_is_whatsapp')->default(true);
            $table->string('other_phone_number')->nullable();
            $table->string('email')->nullable();

            $table->boolean('person_type')->default(0);

            $table->text('company_name')->nullable();
            $table->text('fantasy_name')->nullable();
            $table->text('responsible_agent_name')->nullable();

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
        $this->schema->dropIfExists('clients');
    }
};
