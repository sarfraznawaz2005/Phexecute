<?php
$code = urldecode($_POST['code']);
$name = $_POST['name'];
$categoryName = $_POST['categoryName'];

if ($code && $name && $categoryName) {
    $sep = PHP_EOL . '---' . PHP_EOL;

    @mkdir(__DIR__ . '/../../storage/data/snippets/');

    $dir = __DIR__ . '/../../storage/data/snippets/' . $categoryName;
    @mkdir($dir, 0777);

    $snippetsFile = $dir . '/' . $name . '.txt';

    $data = $name . $sep . $code . $sep . 'false';

    if (false !== file_put_contents($snippetsFile, $data)) {
        echo "Snippet saved successfully, page reload needed";
    } else {
        echo "Error saving snippet :(";
    }
}
