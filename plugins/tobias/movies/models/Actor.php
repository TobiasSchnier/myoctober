<?php namespace Tobias\Movies\Models;

use Model;

/**
 * Model
 */
class Actor extends Model
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
    public $table = 'tobias_movies_actors';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany =[
        'movies' => 
        [
            'Tobias\Movies\Models\Movie',
            'table' =>'tobias_movies_actors_movies',
            'order' => 'name'
        ]
    ];

    public $attachOne =[
        'actorimage' => 'System\Models\File',
    ];

    public function getFullNameAttribute(){
        return $this->name . " " . $this->lastname;
    }
}
