<?php

namespace App\Widgets\Sanmax59bbae1140c4e;

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
        return \View::make('widgets.Sanmax59bbae1140c4e.MakeAppointmentWidget.form',['options'=>$this->options, 'theme'=>"Sanmax59bbae1140c4e", 'widget'=>"MakeAppointmentWidget"])->render();
    }

    public function run(){
        return \View::make('widgets.Sanmax59bbae1140c4e.MakeAppointmentWidget.run',['options'=>$this->options])->render();
    }
}