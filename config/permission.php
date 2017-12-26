<?php
return array(
    'page' => array(
        'page@index','page@create','page@edit','page@update','page@destroy'
    ),
    'post' => array(
        'post@index','post@create','post@edit','post@update','post@destroy'
    ),
    'category' => array(
        'category@index','category@create','category@edit','category@update','category@destroy'
    ),
    'tag' => array(
        'tag@index','tag@create','tag@edit','tag@update','tag@destroy'
    ),
    'comment' => array(
        'comment@approve','comment@destroy'
    ),
    'menu'=>array(
        'menu@index','menu@create','menu@edit','menu@update','menu@destroy'
    ),
    'media'=>array(
        'media@index','media@upload','media@destroy'
    ),
    'theme'=>array(
        'theme@index','theme@edit','theme@destroy'
    ),
    'widget'=>array(
        'widget@index','widget@create','widget@edit','widget@destroy'
    ),
    'galleries'=>array(
        'galleries@index','galleries@create','galleries@edit','galleries@destroy'
    ),
    'gallery-images'=>array(
        'galleryimages@index','galleryimages@create','galleryimages@edit','galleryimages@destroy'
    ),
    'contact'=>array(
        'contact@index','contact@destroy'
    ),
    'roles'=>array(
        'roles@index','roles@create','roles@edit','roles@destroy'
    ),
    'users'=>array(
        'users@create','users@edit','users@destroy','users@profile'
    ),
    'setting'=>array('setting@index'),
    'contacts-us'=>array(
        'contacts-us@index','contacts-us@send-message'
    ),
);