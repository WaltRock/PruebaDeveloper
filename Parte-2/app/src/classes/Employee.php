<?php

/**
 * Description of employee
 *
 * @author Walter Manuel
 */
class Employee {

  public function getEmployees() {
    $str = file_get_contents(__DIR__ . "/jsonBD/employees.json");
    $json = json_decode($str, true);
    return $json;
  }

  public function getEmployeeById($id) {
    $str = file_get_contents(__DIR__ . "/jsonBD/employees.json");
    $json = json_decode($str, true);
    foreach ($json as $employee) {
      if ($employee['id'] == $id) {
        return $employee;
      }
    }
    return array();
  }

  private function getSalary($salary) {

    $dots = array(",");
    $salary2 = str_replace($dots, "", $salary);
    $data = floatval(substr($salary2, 1, strlen($salary)));
    
    return $data;
  }

  public function getEmployeesBySalaryRange($start, $end) {
    $str = file_get_contents(__DIR__ . "/jsonBD/employees.json");
    $json = json_decode($str, true);
    $listEmployees = array();
    foreach ($json as $employee) {
      if ($this->getSalary($employee['salary']) >= $start && $this->getSalary($employee['salary']) <= $end) {
        $listEmployees[] = $employee;
      }
    }
    return $listEmployees;
  }

}
