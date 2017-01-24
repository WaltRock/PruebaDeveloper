<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Employee;

/**
 * Description of ServiceAction
 *
 * @author WalterManuel
 */
final class ServiceAction {

  private $view;
  private $logger;
  private $employee;

  public function __construct(Twig $view, LoggerInterface $logger) {
    $this->view = $view;
    $this->logger = $logger;
    $this->employee = new Employee();
  }

  public function __invoke(Request $request, Response $response, $args) {
    $start = $args['start'];
    $end = $args['end'];
    $newResponse = $response->withHeader('Content-Type', 'text/xml;charset=utf-8');
    $employees = $this->employee->getEmployeesBySalaryRange($start, $end);
    $this->view->render($newResponse , 'service.twig', ["employees" => $employees]);
    return $newResponse ;
  }

}
