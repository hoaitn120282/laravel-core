<?php

namespace App\Widgets\Sanmax5a32349390add;

use App\Widgets\BaseWidget;
use App\Modules\ContentManager\Models\Articles;

class RecommendedDoctorsWidget extends BaseWidget
{
    public function __construct()
    {
        $this->name = "Recommended Doctors Widget";
        $this->description = 'This widget for show recommended doctors';
        $this->options = [
            'title' => '',
            'show' => '3',
            'description' => '',
        ];
    }

    public function form()
    {
        return \View::make('widgets.Sanmax5a32349390add.RecommendedDoctorsWidget.form', ['options' => $this->options])->render();
    }

    public function run()
    {
        $model = Articles::where("post_type", "doctor")->take($this->options['show'])->skip(0)->get();
        return \View::make('widgets.Sanmax5a32349390add.RecommendedDoctorsWidget.run', ['options' => $this->options, 'model' => $model])->render();
    }
}