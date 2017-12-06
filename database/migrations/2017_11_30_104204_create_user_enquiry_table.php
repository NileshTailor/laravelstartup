<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEnquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('user_enquiry', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
			$table->bigInteger('user_id');
			$table->bigInteger('vendor_id');
			$table->bigInteger('zone_id');
			$table->bigInteger('category_id');
            $table->string('mobiles_no');
            $table->text('address');
            $table->text('query');
			$table->text('status');
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
