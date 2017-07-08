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


interface SteeinInterface
{
    /***
     * Возвращает идентификатор пользователя
     *
     * @return integer
     */
    public function getId();

    /***
     * Возвращает индивидуальное имя пользователя
     *
     * @return string|null
     */
    public function getUserName();

    /***
     * Возвращает адрес электронной почты
     *
     * @return string|null
     */
    public function getEmail();

    /***
     * Возвращает полное имя и фамилию
     *
     * @return string|null
     */
    public function getDisplayName();

    /***
     * Возращает Имя
     *
     * @return string|null
     */
    public function getFirstName();

    /***
     * Возращает Фамилию
     *
     * @return string|null
     */
    public function getLastName();

    /***
     * Возращает информацию "О себе"
     *
     * @return string|null
     */
    public function getDescription();

    /***
     * Возвращает Страну и Город
     *
     * @return string|null
     */
    public function getCountry();

    /**
     * Возращает ссылку на учетную записи в Steein
     *
     * @return string|null
     */
    public function getLink();

    /***
     * Возвращает статус "Подтврежденной страницы"
     *
     * @return integer
     */
    public function getVerified();

    /***
     * Возвращает аватарку
     *
     * @return string|null
     */
    public function getAvatar();

    /***
     * Возвращает количество подписчиков
     *
     * @return integer
     */
    public function getCountFollowers();

    /***
     * Возвращает количество пидписок
     *
     * @return integer
     */
    public function getCountFollowing();

    /***
     * Возвращает количество записей
     *
     * @return integer
     */
    public function getCountPosts();
}