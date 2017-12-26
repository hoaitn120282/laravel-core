<?php

namespace App\Widgets\Sanmax58d21c22a3a35;

use App\Widgets\BaseWidget;
use App\Modules\ContentManager\Models\Articles;

class OurDoctorsWidget extends BaseWidget
{
    public function __construct() {
        $this->name = "Our Doctors Widget";
        $this->description = 'This widget for show our doctors';
        $this->options = [
            'title'=>'',
            'show'=>'3',
            'description'=>'',
        ];
    }

    public function form(){
        return \View::make('widgets.Sanmax58d21c22a3a35.OurDoctorsWidget.form',['options'=>$this->options])->render();
    }

    public function run(){
        $model = Articles::where("post_type","doctor")->take($this->options['show'])->skip(0)->get();
        return \View::make('widgets.Sanmax58d21c22a3a35.OurDoctorsWidget.run',['options'=>$this->options,'model'=>$model])->render();
    }
}