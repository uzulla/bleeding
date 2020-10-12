<?php

/**
 * @author Masaru Yamagishi <m-yamagishi@infiniteloop.co.jp>
 * @copyright 2020- Masaru Yamagishi
 */

declare(strict_types=1);

namespace Bleeding\Routing;

use function trim;
use function strtoupper;

/**
 * Route
 *
 * @package Bleeding\Routing
 */
final class Route
{
    /** @var string */
    private string $method;

    /** @var string */
    private string $path;

    /** @var callable */
    private $func;

    /** @var string function path for caching */
    private string $filePath;

    /** @var string[] */
    private array $middlewares;

    public function __construct(
        string $path,
        string $method,
        callable $func,
        string $filePath,
        $middlewares = []
    ) {
        $this->method = strtoupper($method);
        $this->path = '/' . trim($path, '/');
        $this->func = $func;
        $this->filePath = $filePath;
        $this->middlewares = (array)$middlewares;
    }

    /**
     * get HTTP method
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * get Path
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * get controller function
     * @return callable
     */
    public function getFunc(): callable
    {
        return $this->func;
    }

    /**
     * get route specific middlewares
     * @return string[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
