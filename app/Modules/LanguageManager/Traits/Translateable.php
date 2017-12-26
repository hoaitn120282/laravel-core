<?php

namespace App\Modules\LanguageManager\Traits;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Exception;

trait Translatable
{
    protected $defaultLocale;

    /**
     * Save translation
     *
     */
    public function saveTranslations()
    {
        $saved = true;


        return $saved;
        if (parent::save()) {

        }
    }


    /**
     * @return string
     */
    public function getTranslationModelName()
    {
        return $this->translationModel ?: $this->getTranslationModelNameDefault();
    }

    /**
     * @return string
     */
    public function getTranslationModelNameDefault()
    {
        $config = app()->make('config');
        return get_class($this).$config->get('translatable.translation_suffix', 'Translation');
    }

    /**
     * @return string
     */
    private function getTranslationsTable()
    {
        return app()->make($this->getTranslationModelName())->getTable();
    }
}