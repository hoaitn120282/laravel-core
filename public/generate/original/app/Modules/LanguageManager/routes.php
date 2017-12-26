<?php
Route::group([
    'prefix' => $this->admin,
    'middleware' => ['web', 'admin'],
    'namespace' => 'App\Modules\LanguageManager\Controllers'],
    function () {
        Route::get('language-manager', ['as' => $this->admin . '.languageManager.language.index', 'uses' => 'LanguageController@index']);
        Route::any('language-manager/create', ['as' => $this->admin . '.languageManager.language.create', 'uses' => 'LanguageController@create']);
        Route::any('language-manager/edit/{id}', ['as' => $this->admin . '.languageManager.language.edit', 'uses' => 'LanguageController@edit']);
        Route::any('language-manager/destroy/{id?}', ['as' => $this->admin . '.languageManager.language.destroy', 'uses' => 'LanguageController@destroy']);

        // Routes translate
        Route::get('translate', ['as' => "{$this->admin}.languageManager.translate.index", 'uses' => 'TranslateController@index']);
        Route::get('translate/create', ['as' => "{$this->admin}.languageManager.translate.create", 'uses' => 'TranslateController@create']);
        Route::post('translate', ['as' => "{$this->admin}.languageManager.translate.store", 'uses' => 'TranslateController@store']);
        Route::get('translate/{id}/edit', ['as' => "{$this->admin}.languageManager.translate.edit", 'uses' => 'TranslateController@edit']);
        Route::put('translate/{id}', ['as' => "{$this->admin}.languageManager.translate.update", 'uses' => 'TranslateController@update']);
        Route::delete('translate/{id}', ['as' => "{$this->admin}.languageManager.translate.destroy", 'uses' => 'TranslateController@destroy']);
});