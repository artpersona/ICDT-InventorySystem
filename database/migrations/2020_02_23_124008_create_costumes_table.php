<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumes', function (Blueprint $table) {
            $table->string('costume_prefix',20);
            $table->string('costume_id',20);
            $table->string('costume_name',30);
            $table->string('costume_category',20);
            $table->string('costume_status',20);
            $table->string('costume_borowee',40);
            $table->date('costume_deadline');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costumes');
    }
}
