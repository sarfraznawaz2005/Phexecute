<?php

require_once __DIR__ . '/../../vendor/autoload.php';

ini_set('log_errors', false);
ini_set('display_errors', true);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

$code = urldecode($_POST['code']);

if (!empty($code)) {
    if (get_magic_quotes_gpc()) {
        $code = stripslashes($code);
    }

    ob_start();

    list($usec, $sec) = explode(" ", microtime());
    $start = ((float) $usec + (float) $sec);

    eval($code);

    list($usec, $sec) = explode(" ", microtime());
    $end = ((float) $usec + (float) $sec);

    if (isset($start)) {
        $timeTaken = round(($end - $start), 4);
    } else {
        $timeTaken = '?';
    }


    $result = ob_get_clean();

    $error = error_get_last();
    $isError = isset($error['type']) && false !== stripos(getErrorName($error['type']), 'error');

    $result = array(
       'time' => $timeTaken,
       'line' => $error['line'],
       'result' => $result
    );

    if ($isError) {
        $result['line'] = $error['line'];
        $result['result'] = getErrorName($error['type']) . ' : ' . $error['message'];
    }

    echo json_encode($result);
}

function getErrorName($errorCode)
{
    $errortypes = array(
       E_NOTICE => 'NOTICE',
       E_ERROR => 'ERROR',
       E_USER_NOTICE => 'USER NOTICE',
       E_WARNING => 'WARNING',
       E_PARSE => 'PARSE ERROR',
       E_CORE_ERROR => 'CORE ERROR',
       E_CORE_WARNING => 'CORE WARNING',
       E_COMPILE_ERROR => 'COMPILE ERROR',
       E_COMPILE_WARNING => 'COMPILE WARNING',
       E_USER_ERROR => 'USER ERROR',
       E_USER_WARNING => 'USER WARNING',
    );

    return $errortypes[$errorCode];
}
