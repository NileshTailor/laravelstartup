<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->date('dob');
            $table->bigInteger('mobile_no');
            $table->string('spouse_name');
            $table->bigInteger('spouce_mobile_no');
            $table->string('email',50);
            $table->bigInteger('land_line_no');
            $table->string('father_name');
            $table->text('address');
            $table->text('landmark');
            $table->longtext('hobby',100);
            $table->string('emergancy_contact_detail',150);
            $table->bigInteger('annual_income');
            $table->enum('use_smart_phone',['Yes', 'No'])->default('No');
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
         Schema::dropIfExists('user');
    }
}
