<?php

namespace App\Repositories;

use App\Entities\GalleryImages;
use InfyOm\Generator\Common\BaseRepository;

class GalleryImagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image_name',
        'image_title',
        'image_description',
        'gallery_id',
        'image_status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GalleryImages::class;
    }

    public function create(array $attributes)
    {
        $model = parent::create($attributes);
        foreach ($attributes['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->image_title = $input['image_title'];
            $model->translateOrNew($locale)->image_description = $input['image_description'];
        }
        $model->save();

        return $model;
    }

    public function update(array $attributes, $id)
    {
        $model = parent::update($attributes, $id);
        foreach ($attributes['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->image_title = $input['image_title'];
            $model->translateOrNew($locale)->image_description = $input['image_description'];
        }
        $model->save();

        return $model;
    }
}
