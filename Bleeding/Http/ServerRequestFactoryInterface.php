<?php

/**
 * @author Masaru Yamagishi <m-yamagishi@infiniteloop.co.jp>
 * @copyright 2020- Masaru Yamagishi
 */

declare(strict_types=1);

namespace Bleeding\Http;

use Psr\Http\Message\ServerRequestInterface;

/**
 * ServerRequest createFromGlobals
 * @package Bleeding\Http
 */
interface ServerRequestFactoryInterface
{
    /**
     * Create PSR-7 ServerRequest from globals
     *
     * @return ServerRequestInterface
     */
    public function createFromGlobals(): ServerRequestInterface;
}
