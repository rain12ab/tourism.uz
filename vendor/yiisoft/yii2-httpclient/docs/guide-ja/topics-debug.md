HTTP クライアント・デバッグ・パネルを使う
=========================================

yii2 HTTP Client エクステンションは、yii のデバッグ・モジュールと統合可能なデバッグ・パネルを提供し、
実行された HTTP リクエストを表示します。

次のコードをあなたのアプリケーションの構成情報に追加するとデバッグ・パネルが有効になります
(既にデバッグ・モジュールを有効にしている場合は、パネルの構成情報を追加するだけで十分です)。

```php
    // ...
    'bootstrap' => ['debug'],
    'modules' => [
        'debug' => [
            'class' => 'yii\\debug\\Module',
            'panels' => [
                'httpclient' => [
                    'class' => 'yii\\httpclient\\debug\\HttpClientPanel',
                ],
            ],
        ],
    ],
    // ...
```

このパネルによって、ログに記録された HTTP リクエストを実行して、そのレスポンスを確認することが出来ます。
レスポンスはテキスト表現として表示することも、また、ブラウザに直接渡すことも出来ます。

> Note: デバッグ・パネルによって実行できるのは、ログに記録された通常の HTTP リクエストだけです。バッチ送信されたリクエストは実行できません。
  また、ログに記録されたリクエストのコンテントは、[[\yii\httpclient\Client::contentLoggingMaxSize]] に従って切り詰められているかも知れず、従って、
  実行に失敗したり、予期しない結果を生じたりする場合があることを心に留めておいてください。