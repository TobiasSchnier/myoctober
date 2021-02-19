<?php namespace Tobias\Movies\Components;

use Cms\Classes\ComponentBase;
use Input;
use Validator;
use Redirect;
use Tobias\Movies\Models\Actor;
use Flash;

class ActorForm extends ComponentBase 
{
    public function componentDetails(){
        return 
        [
            'name'=>'Actor Form',
            'description' => 'Simple form to add actors',
        ];
    }

    public function onSave(){
        $actor = new Actor();

        $actor->name = Input::get('name');
        $actor->lastname = Input::get('lastname');
        $actor->actorimage = Input::file('actorimage');

        $actor->save();

        Flash::success('Actor added');
        return redirect()->back();
    }
}

