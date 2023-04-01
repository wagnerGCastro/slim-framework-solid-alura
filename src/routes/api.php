<?php

declare(strict_types=1);

use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
// use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Application\Database\Bootstrap as BootstrapEloquent;
use App\Models\User;
use App\Models\Report;

return function (App $app) {

    $container = $app->getContainer();
    BootstrapEloquent::load($container);


    // $app->options('/{routes:.*}', function (Request $request, Response $response) {
    //     // CORS Pre-Flight OPTIONS Request Handler
    //     return $response;
    // });


    $app->get('/teste-user', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world! 2');
        // $response->getbody()->write(json_encode(User::offset(0)->limit(10)->get()));

        // $result = Report::offset(0)->limit(2)->get();
        // $response->getbody()->write(json_encode($result));

        return $response;
    });


    $app->group('/api', function (Group $group) {
        // $group->get('', ReportController::class . ':getTest');
        // $group->get('/{id}', ViewUserAction::class);

        $group->group('/test', function (Group $group) {
            $group->get('', ReportController::class . ':getTest');
        });

        $group->group('/user', function (Group $group) {
            $group->get('', UserController::class . ':getTest');
        });
    });
};
