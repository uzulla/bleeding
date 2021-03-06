<?php

/**
 * @author Masaru Yamagishi <m-yamagishi@infiniteloop.co.jp>
 * @copyright 2020- Masaru Yamagishi
 */

declare(strict_types=1);

namespace Bleeding\Http\Exceptions;

/**
 * 405 Method not allowed HTTP Exception
 * @package Bleeding\Http\Exceptions
 */
final class MethodNotAllowedException extends BadRequestException
{
    /** {@inheritdoc} */
    protected const MESSAGE = 'Method Not Allowed';

    /** @var int Exception code */
    protected const CODE = 405;
}
