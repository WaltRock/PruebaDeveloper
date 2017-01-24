<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Employee;

final class HomeAction {

  private $view;
  private $logger;
  private $employee;

  public function __construct(Twig $view, LoggerInterface $logger) {
    $this->view = $view;
    $this->logger = $logger;
    $this->employee = new Employee();
  }

  public function __invoke(Request $request, Response $response, $args) {
    $this->logger->info("Home page action dispatched");
    $employeeList = $this->employee->getEmployees();
    /**
     * Si en el metodo get viene un parametro llamado email
     * se filtrara para los emails que coincidan con el parametro
     */
    if (array_key_exists('email', $_GET) && strlen($_GET['email'])>0) {
      $newList = array();
      foreach ($employeeList as $employee) {
        if (strpos($employee['email'], $_GET['email']) !== false) {
          $newList[] = $employee;
        }
      }
      $employeeList = $newList;
    }

    $this->view->render($response, 'home.twig', ["employeeList" => $employeeList]);
    return $response;
  }

}
