<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('templates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('creator_id')->unsigned();
			$table->boolean('is_active');
			$table->string('name')->unique();
			$table->text('body');
			$table->timestamps();

			$table->foreign('creator_id')
				->references('id')
				->on('users');
		});

		Schema::table('emails', function(Blueprint $table)
		{
			$table->integer('template_id')->unsigned()->default(0)->index();
			$table->foreign('template_id')
				->references('id')
				->on('templates');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('templates');

		Schema::table('emails', function(Blueprint $table)
		{
			$table->dropColumn('tamplate_id');
		});
	}

}
