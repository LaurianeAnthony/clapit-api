<?php

$app = new Silex\Application();

$app->register(new Igorw\Silex\ConfigServiceProvider(__DIR__."/../config/$env.yml"));

$app['debug'] = isset($app['config.global']) ?: false;

// enable use PUT with form-data for file transfer (use it with _method => PUT)
Symfony\Component\HttpFoundation\Request::enableHttpMethodParameterOverride();

$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider(), array(
    'validator.validator_service_ids' => array(
        'validator.userExist' => 'validator.userExist',
        'validator.userNotExist' => 'validator.userNotExist',
        'validator.userActive' => 'validator.userActive',
        'validator.postalCode' => 'validator.postalCode',
    )
));
$app->register(new Silex\Provider\FormServiceProvider());

// Register Doctrine DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider(), array('db.options' => $app['config.database']));
// Register Doctrine ORM
$app->register(new Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider(), array(
    "orm.proxies_dir" => __DIR__ . '/../cache/doctrine/proxy',
    'orm.auto_generate_proxies' => true,
    "orm.em.options" => array(
        "mappings" => array(
            array(
                'type'      => 'annotation',       // entity definition 
                'namespace' => 'Clapit\Entity', // your classes namespace
                "path" => __DIR__."/Clapit/Entity",
                "use_simple_annotation_reader" => false,
            ),
        ),
    ),
));

$app['orm.em']->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

$app->register(new JDesrosiers\Silex\Provider\JmsSerializerServiceProvider(), array(
    "serializer.srcDir" => __DIR__ . "/../vendor/jms/serializer/src",
));

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale' => 'fr',
    'translator.messages' => array()
));
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/Clapit/Ressources/views/',
));
$app->register(new Silex\Provider\SwiftmailerServiceProvider());

//load services
$app->register(new Clapit\Service\ClapitServiceProvider());

//load routes
$routesLoader = new Clapit\RoutesLoader($app);
$routesLoader->bindRoutesToControllers();

return $app;