<?php

namespace App\Widgets\defaultWidget;

use App\Widgets\BaseWidget;

class GMapWidget extends BaseWidget
{
    public function __construct()
    {
        $this->name = "Google Map Widget";
        $this->description = 'This widget for show google map';
        $this->options = [
            'title' => '',
            'api_key' => '',
            'zoom' => 7,
            'latitude' => 0,
            'longitude' => 0,
            'width' => '',
            'height' => 450,
        ];
    }

    public function form()
    {
        return \View::make('widgets.defaultWidget.GMapWidget.form', ['options' => $this->options])->render();
    }

    public function run()
    {
        return \View::make('widgets.defaultWidget.GMapWidget.run', ['options' => $this->options])->render();
    }
}