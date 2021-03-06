<?php

function out(array $array)
{
    $lines = '';
    $array = arrayRemovEmptyItems($array);

    foreach ($array as $line) {
        $lines .= $line . '<br>';
    }

    echo $lines;
}

function arrayRemovEmptyItems($haystack)
{
    foreach ($haystack as $key => $value) {
        if (is_array($value)) {
            $haystack[$key] = arrayRemovEmptyItems($haystack[$key]);
        }

        if (empty($haystack[$key])) {
            unset($haystack[$key]);
        }
    }

    return $haystack;
}

function pr(array $array)
{
    ob_start();
    var_dump($array);
    $output = ob_get_clean();

    // Add formatting
    $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);

    $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dashed #888; padding: 10px; margin: 10px 0; text-align: left;">' . $output . '</pre>';

    echo $output;
}

function p($s)
{
    if (!$s) {
        echo '';
    }

    echo "<div style='background:#ccc; font-weight:bold; padding:5px;'>$s</div>";
}

// generates textual tables from given data

/*
Example:
table($array);
 */

function table($data)
{
    $keys = array_keys(end($data));
    $size = array_map('strlen', $keys);

    foreach (array_map('array_values', $data) as $e) {
        $size = array_map('max', $size,
            array_map('strlen', $e));
    }

    foreach ($size as $n) {
        $form[] = "%-{$n}s";
        $line[] = str_repeat('-', $n);
    }

    $form = '| ' . implode(' | ', $form) . " |\n";
    $line = '+-' . implode('-+-', $line) . "-+\n";
    $rows = array(vsprintf($form, $keys));

    foreach ($data as $e) {
        $rows[] = vsprintf($form, $e);
    }

    echo "<pre>\n";
    echo $line . implode($line, $rows) . $line;
    echo "</pre>\n";
}

// generates random string
function generate_rand($l)
{
    $c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    srand((double) microtime() * 1000000);
    for ($i = 0; $i < $l; $i++) {
        $rand .= $c[rand() % strlen($c)];
    }

    return $rand;
}

// lists contents of specified folder
function ls($dir)
{
    if (is_dir($dir)) {
        if ($handle = opendir($dir)) {
            while (($file = readdir($handle)) !== false) {
                if ($file != "." && $file != ".." && $file != "Thumbs.db") {
                    echo '<a target="_blank" href="' . $dir . $file . '">' . $file . '</a><br>' . "\n";
                }
            }
            closedir($handle);
        }
    }
}
