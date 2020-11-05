<?php
/**
 * @author Masaru Yamagishi <m-yamagishi@infiniteloop.co.jp>
 * @copyright 2020- Masaru Yamagishi
 */

declare(strict_types=1);

//ini_set("xhprof.output_dir", "/tmp/xhprof");
//ini_set("xhprof.sampling_interval", "100"); // default 100000
//require_once(__DIR__.'/../xhprof/xhprof_lib/utils/xhprof_runs.php');
//xhprof_sample_enable();
//
//register_shutdown_function(function () {
//    $runs = new XHProfRuns_Default();
//    $runs->save_run(xhprof_disable(), (string)microtime(true));
//});

ini_set("xhprof.output_dir", "/tmp/xhprof");
define("XHPROF_START_TIME", microtime(true));
require_once __DIR__ . '/../xhprof/xhprof_lib/utils/xhprof_runs.php';
xhprof_enable(XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
register_shutdown_function(function () {
    $consume_time = (microtime(true) - XHPROF_START_TIME);
    $data = xhprof_disable();
    $runs = new XHProfRuns_Default();
    $xhprof_id = preg_replace('|/|u', "／", $_SERVER['REQUEST_URI']);
    $xhprof_id = preg_replace('/[^a-zA-Z0-9／]/u', "-", $xhprof_id);
    $xhprof_id = $xhprof_id . "_use_" . sprintf("%d", ($consume_time * 1000)) . "ms_";
    $runs->save_run($data, $xhprof_id);
});

define('ENTRY_TIME', microtime(true));

// autoload
require implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'vendor', 'autoload.php']);

$exitCode = (new Edge\Applications\WebApplication)->run();

exit($exitCode);
