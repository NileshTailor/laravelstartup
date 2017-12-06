<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEnquiryFollowupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_enquiry_followup', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_enquiry_id');
			$table->bigInteger('user_id');
			$table->bigInteger('vendor_id');
			$table->text('comment');
			$table->string('comment_by');
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
