<?php namespace Tobias\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateTobiasMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('tobias_movies_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('genre_title');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tobias_movies_genres');
    }
}
