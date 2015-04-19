<?php

namespace Clapit\Service;

use Silex;
use Silex\Application;

use Clapit\Helper\ClapitHelpers;
use Clapit\Validator\Constraints\UserExistValidator;
use Clapit\Validator\Constraints\UserNotExistValidator;
use Clapit\Validator\Constraints\UserActiveValidator;
use Clapit\Validator\Constraints\PostalCodeValidator;

class ClapitServiceProvider implements Silex\ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['clapit.helpers'] = $app->share(function ($app) {
            return new ClapitHelpers($app['config.global']['website']);
        });


        $app['validator.userExist'] = $app->share(function ($app) {
            $validator =  new UserExistValidator();
            $validator->setDb($app["db"]);
            return $validator;
        });
        $app['validator.userNotExist'] = $app->share(function ($app) {
            $validator =  new UserNotExistValidator();
            $validator->setDb($app["db"]);
            $validator->setSession($app["session"]);
            return $validator;
        });

        $app['emails.service'] = $app->share(function ($app) {
            return new EmailsService($app["db"], $app['api'], $app['orm.em'], $app['twig'], $app['mailer'], $app['config.email'], $app['config.global']['website'] );
        });


        $app['users.service'] = $app->share(function ($app) {
            return new UsersService($app["db"], $app['api'], $app['orm.em']);
        });
    }

    public function boot(Application $app) {}
}