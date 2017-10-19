<?php
$name = $_POST['name'];

if ($name) {
    $snippetsFile = __DIR__ . '/../../storage/data/snippets/' . $name . '.txt';

    $result = @unlink($snippetsFile);
	
	if ($result === true) {
		echo 'ok';
	}
}
