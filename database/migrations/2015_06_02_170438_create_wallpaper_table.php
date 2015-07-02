<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWallpaperTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wallpaper', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('cat');
            $table->string('walltitle');
            $table->string('wallslug');
            $table->string('walldir');
            $table->string('wallresolution');
            $table->integer('wallfilesize');
            $table->string('wallimg');
            $table->timestamp('walldate');
            $table->integer('wallview');
            $table->integer('walldownload');
            $table->string('walltags');
            $table->string('wallcolors');
            $table->timestamp('walllastview');
			$table->timestamp('walllastdownload');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wallpaper');
	}

}
