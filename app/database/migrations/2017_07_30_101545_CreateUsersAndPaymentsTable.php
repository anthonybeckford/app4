<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAndPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('email')->unique();
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('password', 64);
            $table->string('remember_token', 64);
			$table->timestamps();
		});

        Schema::create('user_payments', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('amount', 5, 2);
            $table->string('payment_id');
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
		Schema::drop('users');

        Schema::table('user_payments', function ($table) {
            $table->dropForeign('user_payments_user_id_foreign');
        });

        Schema::dropIfExists('user_payments');
	}

}
