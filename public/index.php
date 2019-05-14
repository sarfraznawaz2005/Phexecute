<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../app/templates',
));

// Create monolog logger and store logger in container as singleton
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('Phexecute');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));

    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../app/templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true,
);

$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Define routes
$app->get('/', function () use ($app) {

    $systemDir = __DIR__ . '/../storage/data/system';
    $snippetsDir = __DIR__ . '/../storage/data/snippets';
    $packageDir = __DIR__ . '/../storage/data/packages';

    $systemFiles = glob($systemDir . '/*.txt');
    $packageFiles = glob($packageDir . '/*.txt');

    $data['system_entries'] = buildMenu($systemFiles);
    $data['package_entries'] = buildMenu($packageFiles);

    // snippets
    $data['snippet_entries'] = [];
    $snippets = dirToArray($snippetsDir);

    if (isset($snippets[0])) {
        unset($snippets[0]);
    }

    foreach ($snippets as $folder => $snippet) {
        $data['snippet_entries'][$folder] = buildMenu($snippet, $folder);
    }

	if ($data['snippet_entries']) {
		asort($data['snippet_entries']);
		//pp($data['snippet_entries']);	
	}


    $app->render('home.twig', $data);
});

function buildMenu($files, $folderName = '')
{
    $menu = array();

    if (!empty($files) && is_array($files)) {
        foreach ($files as $folder => $file) {

            if (!file_exists($file)) {
                $file = __DIR__ . "/../storage/data/snippets/$folderName/$file";
            }

            $dataArray = explode('---', file_get_contents($file));
            // remove spaces
            $dataArray = array_map('trim', $dataArray);

            // don't include items not containing "code" element
            if (empty($dataArray[1])) {
                continue;
            }

            $menu[] = array('name' => ucwords($dataArray[0]), 'code' => $dataArray[1], 'autorun' => $dataArray[2]);
        }
    }

    sort($menu);

    return $menu;
}

function dirToArray($dir)
{
    $result = array();
    $cdir = scandir($dir);

    foreach ($cdir as $key => $value) {
        if (!in_array($value, array(".", ".."))) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                $result[ucwords($value)] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            } else {
                $result[] = ucwords($value);
            }
        }
    }

    asort($result);

    return $result;
}

function pp(array $array)
{
    echo '<pre>';
    print_r($array);
    exit;
}

// Run app
$app->run();
