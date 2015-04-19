<?php
use Silex\Application AS SilexApplication;
use Symfony\Component\Console\Application AS ConsoleApplication;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

chdir(dirname(__DIR__));

$loader = require_once 'vendor/autoload.php';

set_time_limit(0);

$app = new SilexApplication();

$cli = true;


$env = 'dev';

require_once('src/app.php');

$console = new ConsoleApplication('Clapit', '1.0');

/*
* Doctrine CLI
*/
$helperSet = new HelperSet(array(
	'db' => new ConnectionHelper($app['orm.em']->getConnection()),
	'em' => new EntityManagerHelper($app['orm.em'])
));


$console->setHelperSet($helperSet);

ConsoleRunner::addCommands($console);

$console->run();