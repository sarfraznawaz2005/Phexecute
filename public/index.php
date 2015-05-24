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
   'autoescape' => true
);

$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// Define routes
$app->get('/', function () use ($app) {

    $systemDir = __DIR__ . '/../storage/data/system';
    $snippetsDir = __DIR__ . '/../storage/data/snippets';
    $packageDir = __DIR__ . '/../storage/data/packages';

    // get system commands
    $systemFiles = glob($systemDir . '/*.txt');
    $snippetFiles = glob($snippetsDir . '/*.txt');
    $packageFiles = glob($packageDir . '/*.txt');

    $data['system_entries'] = buildMenu($systemFiles);
    $data['snippet_entries'] = buildMenu($snippetFiles);
    $data['package_entries'] = buildMenu($packageFiles);

    $app->render('home.twig', $data);
});

function buildMenu($files)
{
    $menu = array();

    if (!empty($files)) {
        foreach ($files as $file) {
            $dataArray = explode('---', file_get_contents($file));
            // remove spaces
            $dataArray = array_map('trim', $dataArray);

            // don't include items not containing "code" element
            if (empty($dataArray[1])) {
                continue;
            }

            $menu[] = array('name' => $dataArray[0], 'code' => $dataArray[1], 'autorun' => $dataArray[2]);
        }
    }

    return $menu;
}

// Run app
$app->run();
