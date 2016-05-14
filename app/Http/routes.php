<?php

Route::get('/', 'StreamController@index');
//Route::get('/', function() {
//    dd(\App\Announcement::activeTotal());
//});

Route::get('shout',
    [
        'as'    => 'shout-out',
        'uses'  => 'ShoutController@create'
    ]
);

Route::post('fire',
    [
        'as' 	=> 'store-shout',
        'uses' 	=> 'ShoutController@store',
    ]
);

Route::get('stream',
    [
        'as'    => 'stream',
        'uses'  => 'StreamController@index'
    ]
);

Route::get('stats',
    [
        'as'    => 'stats',
        'uses'  => 'StatsController@index'
    ]
);

Route::get('graphdata',
    [
        'as'    => 'graph-stats',
        'uses'  => 'StatsController@graphData'
    ]
);

Route::get('audit-log',
    [
        'as'    => 'audit-log',
        'uses'  => 'AuditController@index'
    ]
);

Route::get('janitor',
    [
        'as'    => 'janitor',
        'uses'  => 'JanitorController@index'
    ]
);

Route::get('refreshremotes',
    [
        'as'    => 'refresh-remotes',
        'uses'  => 'JanitorController@refreshClients'
    ]
);

Route::get('purgedb',
    [
        'as'    => 'purge-db',
        'uses'  => 'JanitorController@purgeDB'
    ]
);

Route::get('purgeredis',
    [
        'as'    => 'purge-redis',
        'uses'  => 'JanitorController@purgeRedis'
    ]
);

Route::get('mockinvestment',
    [
        'as'    => 'mock-investment',
        'uses'  => 'SystemEventController@mockInvestment'
    ]
);

Route::get('mockfunding',
    [
        'as'    => 'mock-funding',
        'uses'  => 'SystemEventController@mockFunding'
    ]
);

Route::get('mockcodedeploy',
    [
        'as'    => 'mock-code-deploy',
        'uses'  => 'SystemEventController@mockCodeDeploy'
    ]
);
