<?php
/**
 * @author Masaru Yamagishi <m-yamagishi@infiniteloop.co.jp>
 * @copyright 2020- Masaru Yamagishi
 */

declare(strict_types=1);

ini_set("xhprof.output_dir", "/tmp/xhprof");
ini_set("xhprof.sampling_interval", "100"); // default 100000
require_once(__DIR__.'/../xhprof/xhprof_lib/utils/xhprof_runs.php');
xhprof_sample_enable();

register_shutdown_function(function () {
    $runs = new XHProfRuns_Default();
    $runs->save_run(xhprof_disable(), (string)microtime(true));
});

define('ENTRY_TIME', microtime(true));

// autoload
require implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'vendor', 'autoload.php']);

$exitCode = (new Edge\Applications\WebApplication)->run();

exit($exitCode);
