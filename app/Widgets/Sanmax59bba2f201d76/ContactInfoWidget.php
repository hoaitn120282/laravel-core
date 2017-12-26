<?php

namespace App\Widgets\Sanmax59bba2f201d76;

use App\Widgets\BaseWidget;
use Trans;

class ContactInfoWidget extends BaseWidget
{
	public function __construct() {
    	$locale = Trans::locale();
        $this->name = "Contact Information Widget";
        $this->description = 'This widget for show contact information';
        $this->options = ['icon_class' => 'fa'];
        foreach (Trans::languages() as $language) {
            $this->options["title_{$language->country->locale}"] = "";
            $this->options["description_{$language->country->locale}"] = "";
        }
        $this->options = array_merge(["title_{$locale}" => '', "description_{$locale}" => ''], $this->options);
    }

    public function form(){
        return \View::make('widgets.Sanmax59bba2f201d76.ContactInfoWidget.form',['options'=>$this->options])->render();
    }

    public function run(){
        return \View::make('widgets.Sanmax59bba2f201d76.ContactInfoWidget.run',['options'=>$this->options])->render();
    }

}