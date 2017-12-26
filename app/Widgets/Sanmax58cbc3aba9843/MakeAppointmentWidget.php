<?php

namespace App\Widgets\Sanmax58cbc3aba9843;

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
        return \View::make('widgets.Sanmax58cbc3aba9843.MakeAppointmentWidget.form',['options'=>$this->options, 'theme'=>"Sanmax58cbc3aba9843", 'widget'=>"MakeAppointmentWidget"])->render();
    }

    public function run(){
        return \View::make('widgets.Sanmax58cbc3aba9843.MakeAppointmentWidget.run',['options'=>$this->options])->render();
    }
}