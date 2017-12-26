<?php

namespace App\Entities;

use Eloquent as Model;
use Dimsav\Translatable\Translatable;

/**
 * Class GalleryImages
 * @package App\Entities
 * @version November 1, 2016, 7:46 am UTC
 */
class GalleryImagesTranslation extends Model
{
    public $table = 'gallery_image_translations';
    protected $primaryKey = 'gallery_image_id';
    public $timestamps = true;

    public $fillable = [
        'gallery_image_id',
        'locale',
        'image_title',
        'image_description',
    ];

}
