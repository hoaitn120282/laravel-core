<?php

namespace App\Widgets\Sanmax58ca5a5444f9c;

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
        return \View::make('widgets.Sanmax58ca5a5444f9c.MakeAppointmentWidget.form',['options'=>$this->options, 'theme'=>"Sanmax58ca5a5444f9c", 'widget'=>"MakeAppointmentWidget"])->render();
    }

    public function run(){
        return \View::make('widgets.Sanmax58ca5a5444f9c.MakeAppointmentWidget.run',['options'=>$this->options])->render();
    }
}