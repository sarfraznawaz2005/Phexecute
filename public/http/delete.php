<?php
$name = $_POST['name'];
$folder = $_POST['folder'];

if ($name && $folder) {
    $snippetsFile = __DIR__ . "/../../storage/data/snippets/$folder/$name.txt";

    $result = @unlink($snippetsFile);

    if ($result === true) {
        echo 'ok';
    }
}
