<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('phone');
			$table->string('email');
			$table->string('password');
			$table->date('d_o_b');
            $table->string('blood_type');
            $table->string('api_token')->unique()->nullable();
			$table->date('last_donation_date');
			$table->integer('city_id')->unsigned();
			$table->string('pin_code');


		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
