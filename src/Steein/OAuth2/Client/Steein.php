<?php
/**
 * Copyright (c) 2017 Steein, Inc.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Steein.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */
namespace Steein\OAuth2\Client;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

/**
 *  Class: Steein
 *
 * @version v2.0
 * @package Steein/OAuth2
 */
class Steein extends AbstractProvider
{
    use BearerAuthorizationTrait;

    /**
     *  URL-адрес производственного API.
     *
     * @const string
     */
    const BASE_API_URL = 'https://www.steein.ru';

    /**
     * Доступные разрешения по умолчанию
     *
     * @var array
     */
    public $defaultScopes = ['account email'];

    /**
     * Получает строку, используемую для разделения областей.
     *
     * @return string
     */
    protected function getScopeSeparator()
    {
        return ' ';
    }

    /**
     * Получает URL авторизации для начала потока OAuth
     *
     * @return string
     */
    public function getBaseAuthorizationUrl()
    {
        return static::BASE_API_URL.'/oauth/authorize';
    }

    /**
     * Базовый URL для получения токен ключа
     *
     * @return string
     */
    public function getBaseAccessTokenUrl(array $params)
    {
        return static::BASE_API_URL.'/oauth/token';
    }

    /**
     * Получить URL-адрес поставщика для получения сведений о пользователе
     *
     * @param  AccessToken $token
     *
     * @return string
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return static::BASE_API_URL.'/api/v2.0/account/show';
    }

    /**
     * Возвращает разрешения по умолчанию, используемые этим провайдером.
     *
     * Это не должен быть полный список всех областей,
     * но минимум требуется для пользовательского интерфейса!
     *
     * @return array
     */
    protected function getDefaultScopes()
    {
        return $this->defaultScopes;
    }

    /**
     * Проверьте ответ поставщика на наличие ошибок.
     *
     * @param  ResponseInterface $response
     * @param  string $data Parsed response data
     *
     * @throws IdentityProviderException
     * @return void
     */
    protected function checkResponse(ResponseInterface $response, $data)
    {
        if (isset($data['error']))
        {
            throw new IdentityProviderException($data['error_description'] ?: $response->getReasonPhrase(),
                $response->getStatusCode(),
                $response
            );
        }
    }

    /**
     * Сгенерировать объект пользователя после успешного получения данных пользователя.
     *
     * @param array         $response
     * @param AccessToken   $token
     *
     * @return SteeinResourceOwner
     */
    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return new SteeinResourceOwner($response);
    }

    /**
     * Запрашивает и возвращает владельца ресурса данного токен доступа.
     *
     * @param  AccessToken $token
     * @return \League\OAuth2\Client\Provider\ResourceOwnerInterface|SteeinInterface
     */
    public function getResourceOwner(AccessToken $token)
    {
        return parent::getResourceOwner($token);
    }
}