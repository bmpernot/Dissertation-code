<?php
  class Appointments {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    public function getAllCustomerProblems(){
      $query = "SELECT * FROM Car_Problem LEFT JOIN Car
      ON Car_Problem.CarID = Car.CarID
      WHERE CustomerID = :CustomerID
      AND DateRecieved >= CURDATE()";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "CustomerID" => $_SESSION['user_data']['CustomerID']
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function submitProblem($user_data){
      if($user_data['reason'] != "other"){
        $problem = $user_data['reason'];
        }
      else{
        $problem = $user_data['description'];
        }
      $query = "INSERT INTO Car_Problem (
        CarID, Problem, DateRecieved, TimeID
      ) VALUES (
        :CarID, :Problem, :DateRecieved, :TimeID
      )";

      $stmt = $this->Conn->prepare($query);

      return $stmt->execute(array(
        "CarID" => $user_data['select_car'],
        "Problem" => $problem,
        "DateRecieved" => $user_data['appointment_date'],
        "TimeID" => $user_data['appointment_time']
      ));
    }

    public function removeProblem($user_data){
      $query = "DELETE FROM Car_Problem
      WHERE ProblemID = :ProblemID";

      $stmt = $this->Conn->prepare($query);

      return $stmt->execute(array(
        'ProblemID' => $user_data['select_appointment']
      ));
    }
  }
