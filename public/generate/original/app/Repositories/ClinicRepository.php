<?php

namespace App\Repositories;

use App\Entities\Clinic;
use InfyOm\Generator\Common\BaseRepository;

class ClinicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'domain',
        'is_sanmax_hosting',
        'contact_info',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Clinic::class;
    }
}
