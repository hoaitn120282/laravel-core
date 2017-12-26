<?php

namespace App\Widgets\defaultWidget;

use App\Widgets\BaseWidget;

class ContactFormWidget extends BaseWidget
{
    public function __construct()
    {
        $this->name = "Contact form Widget";
        $this->description = 'This widget for show contact form';
        $this->options = [
            'title' => '',
            'description' => ''
        ];
    }

    public function form()
    {
        return \View::make('widgets.defaultWidget.ContactFormWidget.form', ['options' => $this->options])->render();
    }

    public function run()
    {
        return \View::make('widgets.defaultWidget.ContactFormWidget.run', ['options' => $this->options])->render();
    }
}