<?php

namespace App\Widgets;

use App\Modules\ContentManager\Models\WidgetGroups;
use Illuminate\Support\Facades\Route;
use Theme;
use Trans;

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
                if ($this->visibilityPages($value->getOptions('visibility'))) {
                    $class->init(unserialize($value->options));
                    echo $class->run();
                }
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

    /**
     * Check widget visibility on pages
     *
     * @param string $visibility
     * @return bool
     */
    private function visibilityPages($visibility = '')
    {
        try {
            if (!empty($visibility)) {
                if ('*' != $visibility) {
                    $request = request();
                    $locale = Trans::locale();
                    $route = Route::current()->getName();
                    $urls = explode("\r\n", $visibility);
                    // Visibility all pages
                    if (in_array('*', $urls) ||
                        in_array('/*', $urls) ||
                        in_array('*/', $urls) ||
                        in_array('/*/', $urls)
                    ) {
                        return true;
                    }
                    if ((in_array('/', $urls) ||
                            in_array('<front>', $urls)) &&
                        ("front" == $route)
                    ) {
                        return true;
                    }
                    // Visibility all posts
                    if (
                        (in_array('post/*', $urls) ||
                            in_array('/post/*', $urls)) &&
                        ("{$locale}.post.show" == $route)
                    ) {
                        return true;
                    }
                    // Visibility all pages
                    if ((in_array('page/*', $urls) ||
                            in_array('/page/*', $urls)) &&
                        ("{$locale}.page.show" == $route)
                    ) {
                        return true;
                    }
                    // Visibility all category
                    if ((in_array('category/*', $urls) ||
                            in_array('/category/*', $urls)) &&
                        (in_array($route, ["{$locale}.category.show", "{$locale}.category.news"]))
                    ) {
                        return true;
                    }
                    // Visibility all doctor
                    if ((in_array('doctor/*', $urls) ||
                            in_array('/doctor/*', $urls)) &&
                        ("{$locale}.doctor.show" == $route)
                    ) {
                        return true;
                    }
                    // Visibility all doctor
                    if ((in_array('doctors/*', $urls) ||
                            in_array('/doctors/*', $urls)) &&
                        (in_array($route, ["{$locale}.doctors.show", "{$locale}.doctors.team"]))
                    ) {
                        return true;
                    }

                    foreach ($urls as $url) {
                        $fullUrl = $locale . '/' . trim($url, '/');
                        if ($request->is($fullUrl)) {
                            return true;
                        }
                    }
                    return false;
                }
            }

            return true;
        } catch (\Exception $exception) {
            return false;
        }

    }
}