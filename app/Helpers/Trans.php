<?php

namespace App\Helpers;

use App\Modules\LanguageManager\Models\Translate;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use App\Modules\LanguageManager\Models\Language;
use Illuminate\Support\Facades\Request;

class Trans
{
    protected $locale;

    public function __construct()
    {
        $this->locale = App::getLocale();
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function locale()
    {
        return $this->locale;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return $this
     */
    public function setLocale($locale = 'en')
    {
        App::setLocale($locale);
        Carbon::setLocale($locale);
        $this->locale = App::getLocale();

        return $this;
    }

    /**
     * Translate interface
     *
     * @param string $key
     * @return string
     */
    public function face($key, $locale = '')
    {
        try {
            $trans = Translate::where('trans_key', $key)->first();
            if ($trans) {
                $faces = unserialize($trans->trans_meta);
                $locale = empty($locale) ? $this->locale() : $locale;
                if (empty($faces[$locale]['trans'])) {
                    throw new \Exception("\"{$key}\" has not translated yet.");
                }
                return $faces[$locale]['trans'];
            }
            throw new \Exception("\"{$key}\" has not translated yet.");
        } catch (\Exception $exception) {
            return "\"{$key}\" has not translated yet.";
        }
    }

    /**
     * Get all languages from DB
     */
    public function languages()
    {
          return Language::with('country')->where('status', true)->orderBy('language_id', 'desc')->get();
    }

    public function currentLocale($url = null)
    {
        $langs = [];
        $languages = $this->languages();
        if ($languages) {
            $currentUrl = Request::url();
            $locale = $this->locale();
            $baseUrl = Request::root();
            $explode = explode("{$baseUrl}/{$locale}", $currentUrl);
            $path = empty($explode[1]) ? '' : $explode[1];
            foreach ($languages as $language) {
                if ($locale == $language->country->locale) {
                    $langs['locale'] = $language->country->locale;
                    $langs['name'] = $language->name;
                    $url = empty($url) ? $path : $url;
                    $langs['url'] = url($language->country->locale . '/' . trim($url, '/'));
                    break;
                }
            }
            $langs['locale'] = isset($langs['locale']) ? $langs['locale'] : $locale;
            $langs['name'] = isset($langs['name']) ? $langs['name'] : $langs['locale'];
            $langs['url'] = isset($langs['url']) ? $langs['url'] : '#';
        }

        return $langs;
    }

    /**
     * List language using switch language
     *
     * @param string $url
     * @return array
     */
    public function switchLanguage($url = '')
    {
        $langs = [];
        $languages = $this->languages();
        if ($languages) {
            $currentUrl = Request::url();
            $locale = $this->locale();
            $baseUrl = Request::root();
            $explode = explode("{$baseUrl}/{$locale}", $currentUrl);
            $path = empty($explode[1]) ? '' : $explode[1];
            foreach ($languages as $language) {
                if ($locale != $language->country->locale) {
                    $langs[$language->country->locale]['locale'] = $language->country->locale;
                    $langs[$language->country->locale]['name'] = $language->name;
                    $url = $url ?: $path;
                    $langs[$language->country->locale]['url'] = url($language->country->locale . '/' . trim($url, '/'));
                }
            }
        }

        return $langs;
    }
}