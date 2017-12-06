<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('vendor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->string('firm_name');
            $table->string('username');
            $table->string('password');
            $table->bigInteger('mobile_no');
            $table->string('email',50);
            $table->bigInteger('land_line_no');
            $table->text('address');
            $table->text('landmark');
            $table->string('photo',100);
			$table->softDeletes();
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
        //
    }
}
