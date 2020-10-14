<?php

/**
 * @author Masaru Yamagishi <m-yamagishi@infiniteloop.co.jp>
 * @copyright 2020- Masaru Yamagishi
 */

declare(strict_types=1);

namespace Edge\User;

/**
 * @package Edge\User
 */
interface IUserRepository
{
    /**
     * @param string $username
     * @return ?UserEntity
     */
    public function findByName(string $username): ?UserEntity;
}
