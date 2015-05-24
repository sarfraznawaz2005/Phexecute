<?php
require_once __DIR__ . '/../../vendor/autoload.php';

set_time_limit(0);

ini_set('output_buffering', false);
ini_set('log_errors', false);
ini_set('display_errors', true);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

$code = '<?php ' . urldecode($_POST['code']);
$code = str_replace("\r\n", "\n", $code);

if (!empty($code)) {
    if (get_magic_quotes_gpc()) {
        $code = stripslashes($code);
    }

    $file = __DIR__ . '/../../storage/temp/file.php';
    file_put_contents($file, $code);

    $phpcs = __DIR__ . '/../../vendor/bin/phpcs';
    exec($phpcs . ' --standard=PSR2 ' . $file . ' 2>&1', $output);
    
    echo '<pre>';

    if (!empty($output)) {
        out($output);
    }
    
    echo '</pre>';
}
