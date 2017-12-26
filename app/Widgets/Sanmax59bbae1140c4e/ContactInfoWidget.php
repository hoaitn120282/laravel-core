<?php

namespace App\Widgets\Sanmax59bbae1140c4e;

use App\Widgets\BaseWidget;
use Trans;

class ContactInfoWidget extends BaseWidget
{
	public function __construct() {
    	$locale = Trans::locale();
        $this->name = "Contact Information Widget";
        $this->description = 'This widget for show contact information';
        foreach (Trans::languages() as $language) {
            $this->options["title_{$language->country->locale}"] = "";
            $this->options["description_{$language->country->locale}"] = "";
        }
        $this->options = array_merge(["title_{$locale}" => '', "description_{$locale}" => ''], $this->options);
    }

    public function form(){
        return \View::make('widgets.Sanmax59bbae1140c4e.ContactInfoWidget.form',['options'=>$this->options])->render();
    }

    public function run(){
        return \View::make('widgets.Sanmax59bbae1140c4e.ContactInfoWidget.run',['options'=>$this->options])->render();
    }

}