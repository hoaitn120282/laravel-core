<?php

namespace App\Widgets;

use App\Modules\ContentManager\Models\WidgetGroups;
use Theme;

class Widget
{
    public function group($nameGroup)
    {
        $themeActive = Theme::getID();
        //$themeActive
        $group = WidgetGroups::where("name", $nameGroup)->where('theme_id', $themeActive)->first();
        if (!empty($group))
            foreach ($group->widget() as $value) {
                $class = new $value->class_name();
                $class->init(unserialize($value->options));
                echo $class->run();
            }
    }

    /**
     * Check group has items
     *
     * @param string $nameGroup
     * @return bool
     */
    public function existsGroup($nameGroup)
    {
        $themeActive = Theme::getID();
        $group = WidgetGroups::where("name", $nameGroup)->where('theme_id', $themeActive)->first();

        return (empty($group) ? false : ($group->widget()->count() > 0) ? true : false);
    }
}