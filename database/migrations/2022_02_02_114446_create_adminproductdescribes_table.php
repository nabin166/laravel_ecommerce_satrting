<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminproductdescribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminproductdescribes', function (Blueprint $table) {
            $table->id();
         // $table->foreignId('users')->constrained();
            $table->string('uid')->nullable();
            $table->string('product');
            $table->string('item_name');
            $table->double('price');
            $table->mediumText('description');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adminproductdescribes');
    }
}
