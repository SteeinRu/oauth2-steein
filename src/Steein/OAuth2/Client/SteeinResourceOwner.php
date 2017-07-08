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

    /***
     * Возвращает идентификатор пользователя
     *
     * @return integer
     */
    public function getId()
    {
        return $this->getValueByKey($this->data, 'id');
    }

    /***
     * Возвращает индивидуальное имя пользователя
     *
     * @return string|null
     */
    public function getUserName()
    {
        return $this->getValueByKey($this->data, 'username');
    }

    /***
     * Возвращает адрес электронной почты
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->getValueByKey($this->data, 'email');
    }

    /***
     * Возвращает полное имя и фамилию
     *
     * @return string|null
     */
    public function getDisplayName()
    {
        return $this->getValueByKey($this->data,'displayName');
    }

    /***
     * Возращает Имя
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->getValueByKey($this->data['name'], 'first_name');
    }

    /***
     * Возращает Фамилию
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->getValueByKey($this->data['name'], 'last_name');
    }

    /***
     * Возращает информацию "О себе"
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->getValueByKey($this->data, 'description');
    }

    /***
     * Возвращает Страну и Город
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->getValueByKey($this->data, 'country');
    }

    /**
     * Возращает ссылку на учетную записи в Steein
     *
     * @return string|null
     */
    public function getLink()
    {
        return $this->getValueByKey($this->data, 'link');
    }

    /***
     * Возвращает статус "Подтврежденной страницы"
     *
     * @return integer
     */
    public function getVerified()
    {
        return $this->getValueByKey($this->data, 'verified');
    }

    /***
     * Возвращает аватарку
     *
     * @return string|null
     */
    public function getAvatar()
    {
        return $this->getValueByKey($this->data, 'avatar');
    }

    /***
     * Возвращает количество подписчиков
     *
     * @return integer
     */
    public function getCountFollowers()
    {
        return $this->getValueByKey($this->data['action'],'followers');
    }

    /***
     * Возвращает количество пидписок
     *
     * @return integer
     */
    public function getCountFollowing()
    {
        return $this->getValueByKey($this->data['action'],'following');
    }

    /***
     * Возвращает количество записей
     *
     * @return integer
     */
    public function getCountPosts()
    {
        return $this->getValueByKey($this->data['action'],'posts');
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