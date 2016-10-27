# qyhub/php-sdk


## 安装

使用 Composer

``` bash
$ composer require qyhub/php-sdk
```

## 使用

获取登录用户信息

第一步：获取url，重定向到企业+网站

```php
$sso = new \Qyhub\Sso(YOUR_APP_ID,YOUR_SECRET_ID);
$redirectUrl = $sso->getAuthUrl(YOUR_SSO_CALLBACK_URL,YOUR_APP_URL);
redirect($redirectUrl)
```
第二步：成功在企业+授权成功后，回调到第三方服务商的应用地址

```php
$authUserToken=$_GET["token"];
$user = $sso->getUser($authUserToken);
```

获取token
``` php
$auth = new Qyhub\Auth(YOUR_APP_ID,YOUR_SECRET_ID);
echo $auth->getToken();
```

获取同步的用户数据
``` php
$user = new \Qyhub\User(YOUR_APP_ID);
$users = $user->getSyncData($eid,$token);
```


## 安全

如果您发现了安全问题，请邮件给我们:wave@xfruit.cn，感谢


## 版权

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
