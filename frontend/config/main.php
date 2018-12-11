<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'uz',
    'sourceLanguage' => 'uz',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'socialShare' => [
            'class' => \ymaker\social\share\configurators\Configurator::class,
            'enableDefaultIcons' => true,
            'socialNetworks' => [
                'facebook' => [
                    'class' => \ymaker\social\share\drivers\Facebook::class,
                    'label' => Yii::t('app', 'Facebook'),
                ],
                'twitter' => [
                    'class' => \ymaker\social\share\drivers\Twitter::class,
                    'label' => Yii::t('app', 'Twitter'),
                    'config' => [
                        'account' => $params['twitterAccount']
                    ],
                ],
                'telegram' => [
                    'class' => \ymaker\social\share\drivers\Telegram::class,
                    'label' => Yii::t('app', 'Telegram'),
                ],
                'vkontakte' => [
                    'class' => \ymaker\social\share\drivers\Vkontakte::class,
                    'label' => Yii::t('app', 'Vkontakte'),
                ],
            ],
            'options' => [
                'class' => 'tag-cloud-link',
            ],
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceLanguage' => 'uz',
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'dosamigos\google\maps\MapAsset' => [
                'options' => [
                    'key' => 'AIzaSyBfD9qj4WStl9jPUxXIvr2dlcMvtOPmr1Q',
                    'language' => 'en',
                    'version' => '3.20',
                    ]
                ]
            ]
        ],
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['en', 'ru', 'uz'],
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                'language/<ln>'=>'site/language',
            ],
        ],
    ],
    
    'params' => $params,

    'modules' => [
       'gridview' =>  [
            'class' => '\kartik\grid\Module',
        ],
    ],
];
