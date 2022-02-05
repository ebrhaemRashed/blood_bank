<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->integer('city_id')->unsigned();
			$table->string('hospital_name');
			$table->integer('patient_age');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('bags_num');
			$table->string('hospital_address');
			$table->string('datails');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->nullOnDelete();		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
