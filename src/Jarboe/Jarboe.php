<?php

namespace Yaro\Jarboe;

use Illuminate\Support\Facades\Route;
use Yaro\Jarboe\Table\CRUD;

class Jarboe
{
    public function crud($uri, $controller)
    {
        $delimiter = CRUD::BASE_URL_DELIMITER;
        $uri = rtrim($uri, '/');

        Route::get($uri, $controller .'@list');
        Route::post($uri . $delimiter .'search', $controller .'@search');
        Route::post($uri . $delimiter .'search/relation', $controller .'@searchRelation');
        Route::post($uri . $delimiter .'inline', $controller .'@inline');
        Route::get($uri . $delimiter .'per-page/{per_page}', $controller .'@perPage');
        Route::get($uri . $delimiter .'order/{column}/{direction}', $controller .'@orderBy');
        Route::get($uri . $delimiter .'create', $controller .'@create');
        Route::post($uri . $delimiter .'create', $controller .'@store');
        Route::get($uri . $delimiter .'{id}', $controller .'@edit');
        Route::post($uri . $delimiter .'{id}', $controller .'@update');
        Route::post($uri . $delimiter .'{id}/delete', $controller .'@delete');
        Route::any($uri . $delimiter .'toolbar/{toolbar}', $controller .'@toolbar');
    }

    public function routeGroupOptions(bool $availableForGuest = false): array
    {
        $middleware = $availableForGuest ? 'web' : 'jarboe';
        $isSubdomainBasedPanel = config('jarboe.admin_panel.subdomain_panel_enabled', false);

        $options = [
            'middleware' => $middleware,
        ];
        if ($isSubdomainBasedPanel) {
            $options['domain'] = config('jarboe.admin_panel.domain');
        } else {
            $options['prefix'] = config('jarboe.admin_panel.prefix');
        }

        return $options;
    }
}