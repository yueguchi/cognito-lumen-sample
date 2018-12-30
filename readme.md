# aws-cfn-template-with-lumen

CloudFormation Template付きのLumen テストAPIプロジェクト

## 概要

- 認証
    - Cognito -> APIGateway http proxy -> 認証済みのAuthorizationヘッダにてAPIが呼ばれる

- サーバ構成
    - ALB -> web AutoScaling multiAZ
    - RDS -> Aurora multiAZ Read Replica

- 導入CMD

```
$ composer --version
Composer version 1.7.2 2018-08-16 16:57:12
$ lumen --version
Lumen Installer version 1.0.2
$ composer create-project laravel/lumen aws-cfn-template-with-lumen "5.7.*"
```


## CloudFormation環境構築

```
aws-cfn-template-with-lumen.templateをCFNに流し込むだけです。
起動時パラメータに指定したENVによって、「.env.[ENV]」が.envに昇格します。
```

## 環境構築

### Editor

- PHPStorm
- PHP7.2

### ショートカット

- Cmd + Option + l
    - 自動フォーマット
- Ctl + Option + o
    - import最適化


### コーディング規約PSR2設定

```
1. #composer global require "squizlabs/php_codesniffer=*"
2. #which phpcs
3. PHPStormのpreferrenceの「PHP Code Sniffer」にwhichで取得したpathをLocalに設定
4. PHPStormのpreferrenceのEditor->InspectionsのQualityTools->OHO Code Sniffer validationsのCodeStandardをCustomにし、PJルートのphpcs.xmlを設定する
```

### バグチェッカー実行

```
#vendor/bin/phpmd . text phpmd.xml --suffixes php --exclude resources,storage,vendor
```

### local mac mysqlメモ

```
mysqld_safe --skip-grant-tables &
(enter)

my.cnf(mysql --help | grep my.cnfであたりつける)
mt.cnfに以下を記述
skip-grant-tables
default_authentication_plugin= mysql_native_password

何かわからないが、root passwordを設定できず、けどno passwordで入るには、これをやらないと。。
dockerにしとけばよかった。。
```

## License

under the [MIT license](http://opensource.org/licenses/MIT)
