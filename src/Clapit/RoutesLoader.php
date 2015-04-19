<?php

namespace Clapit;

use Silex\Application;

use Symfony\Component\HttpFoundation\JsonResponse;

class RoutesLoader
{
    private $app;

    private $logUser;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->instantiateControllers();
        $this->instantiateFilter();

    }

    private function instantiateControllers()
    {
        $this->app['users.controller'] = $this->app->share(function () {
            return new Controller\UsersController($this->app['users.service'], $this->app['emails.service']);
        });
        $this->app['contacts.controller'] = $this->app->share(function () {
            return new Controller\ContactsController($this->app['emails.service']);
        });
    }

    private function instantiateFilter(){
        $this->logUser = function ($request, $app) {
            try {
                if( $user = $this->app['users.service']->authentificate($request) ) {
                    $app['session']->set('user', $user);
                } else {
                    $app['session']->remove('user');
                    return new JsonResponse(array(), 403);
                }
            } catch (\Exception $e){

                return new JsonResponse(array(
                    'error' => $e->getMessage()
                ), 403);
            }
        };
    }

    public function bindRoutesToControllers()
    {
        $api = $this->app['controllers_factory'];

        $api->post('/contacts', 'contacts.controller:sendContact');

        $api->post('/users', 'users.controller:registerUser');
        $api->post('/users/forgetpassword', 'users.controller:forgetPassword');
        $api->get('/users/me', 'users.controller:getUser')->before($this->logUser);
        $api->put('/users/me', 'users.controller:editUser')->before($this->logUser);



        $this->app->error(function (\Exception $e, $code) {
            if (404 == $code) {
                return new JsonResponse("No endpoint for this request", 404);
            }
        });

        $this->app->mount('/'.$this->app['api']['version'], $api);
    }
}

