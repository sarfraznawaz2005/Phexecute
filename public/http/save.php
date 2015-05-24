<?php
$code = urldecode($_POST['code']);
$name = $_POST['name'];

if ($code && $name) {
    $sep = PHP_EOL . '---' . PHP_EOL;
    $snippetsFile = __DIR__ . '/../../storage/data/snippets/' . $name . '.txt';

    $data = $name . $sep . $code . $sep . 'false';

    if (false !== file_put_contents($snippetsFile, $data)) {
        echo "Snippet saved successfully, page reload needed";
    } else {
        echo "Error saving snippet :(";
    }
}
