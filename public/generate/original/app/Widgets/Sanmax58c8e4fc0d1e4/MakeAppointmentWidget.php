<?php

namespace App\Widgets\Sanmax58c8e4fc0d1e4;

use App\Widgets\BaseWidget;

class MakeAppointmentWidget extends BaseWidget
{
    public function __construct() {
        $this->name = "Make Appointment Widget";
        $this->description = 'This widget for make appointment';
        $this->options = [
            "avatar" => "",
            "name" => "",
            "description" => "",
            "make_appointment" => ""
            ];
    }

    public function form(){
        return \View::make('widgets.Sanmax58c8e4fc0d1e4.MakeAppointmentWidget.form',['options'=>$this->options, 'theme'=>"Sanmax58c8e4fc0d1e4", 'widget'=>"MakeAppointmentWidget"])->render();
    }

    public function run(){
        return \View::make('widgets.Sanmax58c8e4fc0d1e4.MakeAppointmentWidget.run',['options'=>$this->options])->render();
    }
}