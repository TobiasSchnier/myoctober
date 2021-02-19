<?php namespace Tobias\Movies\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Config;
use Tobias\Movies\Models\Actor;

class ActorBox extends FormWidgetBase{
    
    public function widgetDetails(){
        return [
            'name' => 'Actorbox',
            'description' => 'Field for adding actors',
        ];
    }

    public function render(){
        $this->prepareVars();
        // dump($this->vars['selectedValues']);
        return $this->makePartial('widget');
    }

    public function prepareVars(){
        $this->vars['id'] = $this->model->id;
        $this->vars['actors'] = Actor::all()->lists('full_name', 'id');
        $this->vars['name'] = $this->formField->getName() . '[]';
        if(!empty($this->getLoadValue())){
            $this->vars['selectedValues'] = $this->getLoadValue();
        }else{
            $this->vars['selectedValues'] = [];
        }
    }

    public function getSaveValue($actors){
        $newArray = [];
        foreach ($actors as $actorID) {
            if (!is_numeric($actorID)) {
                $newActor = new Actor;
                $nameLastname = explode(' ', $actorID);
                $newActor->name = $nameLastname[0];
                $newActor->lastname = $nameLastname[1];
                $newActor->save();
                $newArray[] = $newActor->id;
            }else{
                $newArray[] = $actorID;
            }
        }
        // dd($newArray);

        return $newArray;
    }

    public function loadAssets(){
        
        $this->addCss('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
        $this->addJs('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js');
    }

}