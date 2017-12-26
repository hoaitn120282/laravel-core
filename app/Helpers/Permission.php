<?php

namespace App\Helpers;

use URL;
use Illuminate\Support\Facades\Facade;
use Admin as Ad;

class Permission extends Facade
{

    private $permissionAsigned = array();

    public function permissionJson($role = null, $permissionAsigned = null)
    {
        $this->permissionAsigned = !empty($permissionAsigned) ? \GuzzleHttp\json_decode($permissionAsigned) : $this->permissionAsigned;
        $permissionsList = config("permission");

        return \GuzzleHttp\json_encode($this->passing($permissionsList, $role));
    }

    public function permissionList($role = null, $permissionAsigned = null)
    {
        $this->permissionAsigned = !empty($permissionAsigned) ? \GuzzleHttp\json_decode($permissionAsigned) : $this->permissionAsigned;
        $permissionsList = empty($role) ? config("permission") : config("permission.{$role}");

        $permissionUI = "<ul class='list-group'><li class='list-group-item'><label><input type='checkbox' id='" . $role . "-role' name='fullaccess' value='" . $role . "'> Allow All Access</label></li>";
        $permissionUI .= $this->passingUI($role, $permissionsList);
        $permissionUI .= '</ul>';

        return $permissionUI;
    }

    /**
     * Passing permission to array
     *
     * @param array $array
     * @param array $role
     * @return mixed
     */
    public function passing($role, $array)
    {
        $item = [];
        $permissionAsigned = [];
        if ($this->permissionAsigned != null) {
            $permissionAsigned = $this->permissionAsigned;
        }
        foreach ($array as $key => $elem) {
            if (!is_array($elem)) {
                $fieldData = explode('@', $key);
                $route = [
                    'controller' => $fieldData[0],
                    'action' => $fieldData[1]
                ];
                $findParentKey = $this->recursive_array_search($key, $permissionAsigned);
                $item[] = [
                    'route' => $route,
                    'text' => $elem,
                    'checked' => $findParentKey
                ];
            } else {
                $item[] = [
                    'route' => '',
                    'text' => $key,
                    'children' => self::passing($elem, $role)
                ];
            }
        }

        return $item;
    }

    /**
     * Passing permission to UI (ul li)
     * @param array $array
     * @param array $role
     * @return mixed
     */
    public function passingUI($role, $array)
    {
        $permissionAsigned = [];
        if ($this->permissionAsigned != null) {
            $permissionAsigned = $this->permissionAsigned;
        }
        $out = "<ul class='list-group'>";
        foreach ($array as $key => $elem) {
            if (!is_array($elem)) {
                $fieldData = explode('@', $key);
                $route = [
                    'controller' => $fieldData[0],
                    'action' => $fieldData[1]
                ];
                $findParentKey = $this->recursive_array_search($key, $permissionAsigned);
                $out .= "<li class='list-group-item'><label><input id='checkBoxChild-{$role}' name='permission[{$route['controller']}][]' type='checkbox' value='{$route['action']}' " . ($findParentKey ? 'checked' : '') . "> {$elem}</label></li>";
            } else {
                $out .= "<button type='button' class='btn btn-info' data-toggle='collapse' data-target='#" . str_slug($key) . "'> {$key}  <span class='glyphicon glyphicon-plus'></span></button><div id='" . str_slug($key) . "' class='collapse'>";
                $out .= "<li class='list-group-item'>" . $this->passingUI($role, $elem) . "</li></div>";

            }
        }

        return $out;
    }

    /**
     * recursive array search
     * @param string $needle
     * @param array $haystack
     * @return mixed
     */
    public function recursive_array_search($needle, $haystack)
    {
        $fieldData = explode('@', $needle);
        foreach ($haystack as $key => $value) {
            if ($fieldData[0] == $key) {
                if (is_array($value) && in_array($fieldData[1], $value)) {
                    return true;
                } elseif ($fieldData[1] == $value) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Check if user has Route or not
     * @param Object $user
     * @param String $routeName
     * @return boolean
     */
    public function userHasRoute($user, $routeName)
    {
        if ($user->is_admin) {
            return true;
        }

        $role = $user->roles;
        if (!empty($role)) {
            if ('0' === $role->status) {
                return false;
            }
        }
        if ($user->hasRoute($routeName)) {
            return true;
        }
        return false;
    }

    /**
     * Generate Admin menu
     *
     * @param User $user current user login
     * @param  array $array array menu
     * @return html
     */
    public function adminMenu($user, $array)
    {
        $curentRotue = \Route::getCurrentRoute();
        $currentAction = $curentRotue->getAction();
        $routeName = isset($currentAction['as']) ? $currentAction['as'] : null;
        $out = "<ul class='nav side-menu'>";
        $out .= $this->generateMenu($user, $array, $routeName);
        $out .= "</ul>";

        return $out;
    }

    /**
     * Generate menu
     * @param array $array
     * @return UIhtml
     */
    public function generateMenu($user, $array, $routeName = null)
    {
        $out = "";
        foreach ($array as $element) {
            $routeActive = '';
            if (empty($element['items']) && (
                    empty($element['route']) ||
                    !$this->userHasRoute($user, Ad::routeName($element['route']))
                )
            ) {
                unset($element);
            }
            // Check active menu
            if (!empty($element['route']) &&
                ($routeName == Ad::routeName($element['route']))
            ) {
                $routeActive = 'active';
            }
            if (!empty($element['actives']) &&
                in_array($routeName, preg_filter('/^/', Ad::prefix_admin(), $element['actives']))
            ) {
                $routeActive = 'active';
            }

            if (!empty($element)) {
                $childrens = '';
                if (!empty($element['items'])) {
                    $i = 0;
                    $items = 0;
                    $oldItems = count($element['items']);
                    foreach ($element['items'] as $item) {
                        if (!empty($item['route']) && !$this->userHasRoute($user, Ad::routeName($item['route']))) {
                            unset($element['items'][$i]);
                            $items++;
                        }
                        $i++;
                    }
                    if ($oldItems != $items) {
                        $childrens .= "<ul class='nav child_menu'>";
                        $childrens .= $this->generateMenu($user, $element['items'], $routeName);
                        $childrens .= "</ul>";
                        $out .= "<li class='" . $routeActive . "'>";
                        $paramsRoute = empty($element['paramsRoute']) ? [] : $element['paramsRoute'];
                        $out .= "  <a" . (!empty($element['route']) ? " href='". Ad::route($element['route'], $paramsRoute)."'" : '') . ">";
                        if (!empty($element['class'])) {
                            $out .= "   <i class='{$element['class']}'></i>";
                        }
                        if (!empty($element['name'])) {
                            $out .= "{$element['name']}";
                        }
                        if (!empty($element['items'])) {
                            $out .= "<span class='fa fa-chevron-down'></span>";
                        }
                        $out .= "  </a>";
                        $out .= $childrens;
                        $out .= "</li>";
                    }
                }else {
                    $out .= "<li class='" . $routeActive . "'>";
                    $paramsRoute = empty($element['paramsRoute']) ? [] : $element['paramsRoute'];
                    $out .= "  <a" . (!empty($element['route']) ? " href='". Ad::route($element['route'], $paramsRoute)."'" : '') . ">";
                    if (!empty($element['class'])) {
                        $out .= "   <i class='{$element['class']}'></i>";
                    }
                    if (!empty($element['name'])) {
                        $out .= "{$element['name']}";
                    }
                    if (!empty($element['items'])) {
                        $out .= "<span class='fa fa-chevron-down'></span>";
                    }
                    $out .= "  </a>";
                    $out .= "</li>";
                }


            }
        }

        return $out;
    }

}
