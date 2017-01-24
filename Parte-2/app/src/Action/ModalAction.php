<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Employee;

/**
 * Description of ModalAction
 *
 * @author WalterManuel
 */
final class ModalAction {

  private $view;
  private $logger;
  private $employee;

  public function __construct(Twig $view, LoggerInterface $logger) {
    $this->view = $view;
    $this->logger = $logger;
    $this->employee = new Employee();
  }

  public function __invoke(Request $request, Response $response, $args) {
    $id = $request->getAttribute('id');
    
    $employee = $this->employee->getEmployeeById($id);
    $this->view->render($response, 'modal.twig', ["employee" => $employee]);
    return $response;
  }

}
