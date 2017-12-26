<?php
Route::group([
    'prefix' => $this->admin,
    'middleware' => ['web', 'admin'],
    'namespace' => 'App\Modules\SiteManager\Controllers'],
    function () {
        Route::get('site-manager/list/{theme_type_id?}/{status?}', ['as' => $this->admin . '.siteManager.index', 'uses' => 'SiteController@index']);
        Route::get('site-detail/{id}', ['as' => $this->admin . '.siteManager.preview', 'uses' => 'SiteController@getSiteDetail']);
        Route::get('site-manager/edit-info/{id}', ['as' => $this->admin . '.siteManager.edit-info', 'uses' => 'SiteController@editInfo']);
        Route::post('site-manager/edit-info/{id}', ['as' => $this->admin . '.siteManager.edit-info', 'uses' => 'SiteController@updateInfo']);
        Route::get('site-manager/update-template/{id}/{theme_type?}', ['as' => $this->admin . '.siteManage.update-template', 'uses'=> 'SiteController@updateTemplate'])->where('theme_type', '[0-9]+');
        Route::get('site-manager/save-template/{id}', ['as' => $this->admin . '.siteManager.save-template', 'uses' => 'SiteController@saveTemplate']);

//        Route::get('site-manager/save-template/{id}', ['as' => $this->admin . '.siteManage.save-template', 'uses' => 'SiteController@saveTemplate']);

        Route::get('site-manager/select-template/{theme_type?}', ['as' => $this->admin . '.siteManager.select-template', 'uses' => 'SiteController@selectTemplate'])->where('theme_type', '[0-9]+');
        Route::any('site-manager/add-info', ['as' => $this->admin . '.siteManager.add-info', 'uses' => 'SiteController@addInfo']);
        Route::post('site-manager/create-info', ['as' => $this->admin . '.siteManager.create-info', 'uses' => 'SiteController@createInfo']);
        Route::any('site-manager/template-id/{id?}', ['as' => $this->admin . '.siteManager.template-id', 'uses' => 'SiteController@toggleTemplateSession']);
        Route::any('site-manager/update-template-id/{id?}', ['as' => $this->admin . '.siteManager.update-template-id', 'uses' => 'SiteController@toggleUpdateTemplateSession']);
        Route::any('site-manager/delete-info/{clinicid}', ['as' => $this->admin . '.siteManager.destroy', 'uses' => 'SiteController@destroyInfo']);

        // Generate Website
        Route::any('site-manager/generate/compress', ['as' => $this->admin . '.siteManager.compress', 'uses' => 'GenerateController@compress']);

        //Send mail
        Route::post('site-manage/send-email/' , ['as' => $this->admin . '.siteManager.send-email', 'uses' => 'SiteController@sendEmail']);

        // Download Route
        Route::get('download/{filename}' , ['as' => $this->admin . '.siteManager.download', 'uses' => 'SiteController@download']);

    });