# Steein for OAuth 2.0 Client

This package provides Facebook OAuth 2.0 support for the PHP League's OAuth 2.0 Client.


## Requirements

The following versions of PHP are supported.

PHP >= 5.6 
HHVM

## Usage

### Authorization Code Flow

```php

$provider = new \Steein\OAuth2\Client\Steein([
    'clientId'         =>  '{client_id}',
    'clientSecret'     =>  '{client_secret}',
    'redirectUrl'      =>  '{callback_url}',
    'ApiVersion'       =>  '2.0',
]);
