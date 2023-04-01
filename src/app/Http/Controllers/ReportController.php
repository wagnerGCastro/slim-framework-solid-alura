<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Slim\Exception\HttpNotFoundException;
use Exception;
use Illuminate\Database\Capsule\Manager;

final class ReportController
{
    protected LoggerInterface $logger;
    protected Request $request;
    protected Response $response;
    protected array $args;
    protected $db;
    protected $db2;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->db = Manager::connection();
    }

    public function getTest(Request $request, Response $response, array $args): Response
    {

        try {
            $names = [ 'name' => 'wagner', 'email' => 'email4'];

            $users = $this->db->select('select * from users where id = ?', [1]);
            $date = $this->db->select('select now() as date');

            $result = [
                "names" => $names,
                "date" => $date,
                "users" => $users
            ];

            $response->getBody()->write(json_encode(
                $result,
                JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
            ));



            $this->logger->info("report test 2");

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } catch (Exception $e) {
            $this->logger->error("report test =>  $e");
            throw new HttpNotFoundException($this->request, $e->getMessage());
        }
    }
}
