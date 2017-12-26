<?php

namespace App\Helpers;

class XCollection
{
    /**
     * Return array unique if dupplicate key
     *
     * @param string $key
     * @param array $data
     * @return array
     */
    function array_unique_key($data)
    {
        $out = array();
        foreach ($data as $k => $v) {
            $out[$k] = $v;
        }

        return $out;
    }
}
