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

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

/****
 *  Class: Steein
 *
 * @version v2.0
 * @package Steein/OAuth2
 */
class SteeinResourceOwner implements ResourceOwnerInterface, SteeinInterface
{
    use ArrayAccessorTrait;

    /**
     *  Массив, где хранится данные пользователя
     *
     * @var array
     */
    protected $data;

    /**
     * Конструктор
     *
     * @param  array $response
     */
    public function __construct(array $response)
    {
        $this->data = $response;
    }

    /**
     * Возвращает идентификатор пользователя в виде строки, если она присутствует.
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->getValueByKey($this->data, 'id');
    }

    /**
     * Возвращает имя пользователя ресурса
     *
     * @return string|null
     */
    public function getUserName()
    {
        return $this->getValueByKey($this->data, 'username');
    }

    /**
     * Возвращает адрес электронной почты владельца учетной записи
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getValueByKey($this->data, 'email');
    }

    /**
     * Возвращает URL-путь к учетной записи
     *
     * @return string|null
     */
    public function getLink()
    {
        return $this->getValueByKey($this->data, 'url');
    }

    /**
     * Возвращает имя в виде строки, если она присутствует.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->getValueByKey($this->data['name'], 'first_name');
    }

    /**
     * Возвращает фамилию в виде строки, если она присутствует.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->getValueByKey($this->data['name'], 'last_name');
    }

    /**
     * Возвращает локализацию пользователя в виде строки, если она доступна.
     *
     * @return string|null
     */
    public function getLocale()
    {
        return $this->getValueByKey($this->data, 'language');
    }

    /**
     * Возвращает аватарку профиля пользователя в виде строки, если она присутствует.
     *
     * @return string|null
     */
    public function getAvatarUrl()
    {
        return $this->getValueByKey($this->data, 'avatar_original');
    }

    /**
     * Возвращает все данные, полученные о пользователе.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}