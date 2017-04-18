# Steein for OAuth 2.0 Client

This package Steein OAuth 2.0 support for the PHP League's OAuth 2.0 Client.


## Requirements
The following versions of PHP are supported.

PHP >= 5.6 

HHVM

## Installation

To install, use composer:

```
composer require steein/oauth2-steein
```


## Usage

### Authorization Code Flow

```php

$provider = new \Steein\OAuth2\Client\Steein([
    'clientId'         =>  '{client_id}',
    'clientSecret'     =>  '{client_secret}',
    'redirectUrl'      =>  '{callback_url}',
    'ApiVersion'       =>  '2.0',
]);


if (!isset($_GET['code']))
{
    // Если у нас нет кода авторизации,
    $authUrl = $provider->getAuthorizationUrl();

    echo '<a href="'.$authUrl.'">Авторизация через Steein!</a>';
    
} else {
    // Попробуйте получить токен доступ (используя грант кода авторизации)
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code'],
        'grant_type' => 'authorization_code'
    ]);

    try {
        // Теперь у нас есть токен доступ, давайте теперь узнаем подробности пользователя.
        $user = $provider->getResourceOwner($token);
        
        // $user->get...();
        echo $user->getAvatarUrl().'<br />';
        echo $user->getFirstName().'<br />';
    } catch (Exception $e) {
        exit('Что та пошло не так');
    }
}

```
## License

The MIT License (MIT). Please see [License File](https://github.com/SteeinRu/oauth2-steein/blob/master/LICENSE) for more information.
