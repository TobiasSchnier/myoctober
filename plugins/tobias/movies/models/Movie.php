<?php namespace Tobias\Movies\Models;

use Model;

/**
 * Model
 */
class Movie extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'tobias_movies_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    // protected $jsonable = ['actors'];

    /* Relations */

    public $belongsToMany =[
        'genres' => 
        [
            'Tobias\Movies\Models\Genre',
            'table' =>'tobias_movies_movies_genres',
            'order' => 'genre_title'
        ],
        'actors' => 
        [
            'Tobias\Movies\Models\Actor',
            'table' =>'tobias_movies_actors_movies',
            'order' => 'name'
        ]
    ];

    public $attachOne =[
        'poster' => 'System\Models\File'
    ];
    public $attachMany =[
        'movie_gallery' => 'System\Models\File'
    ];
}
