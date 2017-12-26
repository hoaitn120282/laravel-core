<?php
Route::group([
    'prefix' => $this->admin,
    'middleware' => ['web', 'admin'],
    'namespace' => 'App\Modules\TemplateManager\Controllers'],
    function () {
        Route::get('templateManager', ['as' => $this->admin . '.templateManager.index', 'uses' => 'TemplateController@index']);
        Route::get('templateManager/install', ['as' => $this->admin . '.templateManager.install', 'uses' => 'TemplateController@install']);
        Route::post('templateManager/install', ['as' => $this->admin . '.templateManager.install', 'uses' => 'TemplateController@installed']);
        Route::get('templateManager/create/{id}', ['as' => $this->admin . '.templateManager.create', 'uses' => 'TemplateController@create']);
        Route::post('templateManager/store', ['as' => $this->admin . '.templateManager.store', 'uses' => 'TemplateController@store']);
        Route::get('templateManager/edit/{id}', ['as' => $this->admin . '.templateManager.edit', 'uses' => 'TemplateController@edit']);
        Route::post('templateManager/update/{id}', ['as' => $this->admin . '.templateManager.update', 'uses' => 'TemplateController@update']);
        Route::post('templateManager/publish/{id}', ['as' => $this->admin . '.templateManager.publish', 'uses' => 'TemplateController@publish']);
        Route::get('templateManager/preview/{id}', ['as' => $this->admin . '.templateManager.preview', 'uses' => 'TemplateController@preview']);
        Route::delete('templateManager/delete/{id}', ['as' => $this->admin . '.templateManager.delete', 'uses' => 'TemplateController@delete']);
        Route::delete('templateManager/uninstall/{id}', ['as' => $this->admin . '.templateManager.uninstall', 'uses' => 'TemplateController@uninstall']);

    });