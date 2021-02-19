<?php namespace Tobias\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateTobiasMovies3 extends Migration
{
    public function up()
    {
        Schema::table('tobias_movies_', function($table)
        {
            $table->dropColumn('actors');
        });
    }
    
    public function down()
    {
        Schema::table('tobias_movies_', function($table)
        {
            $table->text('actors')->nullable();
        });
    }
}
