<?php

namespace App\Widgets;

use App\Facades\XCollection;

abstract class BaseWidget
{
    protected $id;
    public $name;
    public $description;
    public $options;

    public function __construct()
    {
        $this->name = get_class($this);
        $this->description = 'No Descriptions';
        $this->options = [
            "baseID" => str_random(10),
            "title" => $this->name,
            "visibility" => ''
        ];
    }

    public function init($options)
    {
        $this->id = $options['baseID'];
        $this->options = XCollection::array_unique_key(array_merge($this->options, $options), SORT_REGULAR);
    }

    abstract protected function form();

    abstract protected function run();
}