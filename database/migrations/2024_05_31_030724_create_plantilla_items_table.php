<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantillaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('plantilla_items', function (Blueprint $table) {
        $table->id();
        $table->string('item_number')->unique();
        $table->string('position_title');
        $table->string('salarygrade');
        $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
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
        Schema::dropIfExists('plantilla_items');
    }
}
