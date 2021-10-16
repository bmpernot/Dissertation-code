<?php
  class Car_Problem {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    public function getProblems($user_data){
      $query = "SELECT * FROM Car_Problem LEFT JOIN Car
      ON Car_Problem.CarID = Car.CarID
      WHERE DateRecieved >= :date";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "date" => $user_data['date']
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProblem($user_data){
      $query = "SELECT * FROM Car_Problem LEFT JOIN Car
      ON Car_Problem.CarID = Car.CarID
      WHERE ProblemID = :ProblemID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "ProblemID" => $user_data['car_problem_id']
      ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProblemParts($user_data){
      $query = "SELECT * FROM Parts_Used LEFT JOIN Part_Inventory
      ON Parts_Used.PartID = Part_Inventory.PartID
      WHERE ProblemID = :ProblemID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "ProblemID" => $user_data['car_problem_id']
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProblemStaff($user_data){
      $query = "SELECT * FROM Staff_Who_Helped LEFT JOIN Staff
      ON Staff_Who_Helped.StaffID = Staff.StaffID
      WHERE ProblemID = :ProblemID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "ProblemID" => $user_data['car_problem_id']
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function staffExists($user_data){
      $query = "SELECT * FROM Staff_Who_Helped LEFT JOIN Staff
      ON Staff_Who_Helped.StaffID = Staff.StaffID
      WHERE ProblemID = :ProblemID
      AND Staff_Who_Helped.StaffID = :StaffID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "ProblemID" => $user_data['car_problem_id'],
      "StaffID" => $_SESSION['user_data']['StaffID']
      ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function partExists($user_data){
      $query = "SELECT * FROM Parts_Used
      WHERE ProblemID = :ProblemID
      AND PartID = :PartID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "ProblemID" => $user_data['car_problem_id'],
      "PartID" => $user_data['select_part_add']
      ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function removeStaffFromProblems($user_data){
      $query = "DELETE FROM Staff_Who_Helped
      WHERE StaffID = :StaffID
      AND ProblemID = :ProblemID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "StaffID" => $user_data['select_staff'],
      "ProblemID" => $user_data['car_problem_id']
      ]);
      return true;
    }

    public function removePartsFromProblems($user_data){
      $query = "UPDATE Part_Inventory INNER JOIN Parts_Used
      ON Parts_Used.PartID = Part_Inventory.PartID
      SET Stock = Stock + Quantity WHERE Parts_Used.PartID = :PartID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "PartID" => $user_data['select_part_remove']
      ]);
      $query = "DELETE FROM Parts_Used
      WHERE PartID = :PartID
      AND ProblemID = :ProblemID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "PartID" => $user_data['select_part_remove'],
      "ProblemID" => $user_data['car_problem_id']
      ]);
      return true;
    }

    public function addPartToProblem($user_data){
      $query = "INSERT INTO Parts_Used (ProblemID, PartID, Quantity)
      VALUES (:ProblemID, :PartID, :Quantity)";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "ProblemID" => $user_data['car_problem_id'],
      "PartID" => $user_data['select_part_add'],
      "Quantity" => $user_data['part_quantity']
      ]);

      $query = "UPDATE Part_Inventory SET Stock = Stock - :Quantity WHERE PartID = :PartID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "PartID" => $user_data['select_part_add'],
      "Quantity" => $user_data['part_quantity']
      ]);
      return true;
    }

    public function addStaffToProblems($user_data){
      $query = "INSERT INTO Staff_Who_Helped (ProblemID, StaffID, Hours)
      VALUES (:ProblemID, :StaffID, :Hours)";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "ProblemID" => $user_data['car_problem_id'],
      "StaffID" => $_SESSION['user_data']['StaffID'],
      "Hours" => $user_data['hours']
      ]);
      return true;
    }

    public function total($user_data){
      $query = "SELECT COALESCE((SELECT SUM(Part_Inventory.Price*Parts_Used.Quantity)
                FROM Car_Problem
                LEFT JOIN Parts_Used
                ON Car_Problem.ProblemID = Parts_Used.ProblemID
                LEFT JOIN Part_Inventory
                ON Parts_Used.PartID = Part_Inventory.PartID
                WHERE Car_Problem.ProblemID = :ProblemID), 0)
                +
                (SELECT COALESCE((SELECT SUM(Staff_Who_Helped.Hours)
                FROM Car_Problem
                LEFT JOIN Staff_Who_Helped
                ON Car_Problem.ProblemID = Staff_Who_Helped.ProblemID
                WHERE Car_Problem.ProblemID = :ProblemID), 0)
                *
                (SELECT COALESCE((SELECT (Staff.Salary/2500) FROM Car_Problem
                LEFT JOIN Staff_Who_Helped
                ON Car_Problem.ProblemID = Staff_Who_Helped.ProblemID
                LEFT JOIN Staff
                ON Staff_Who_Helped.StaffID = Staff.StaffID
                WHERE Car_Problem.ProblemID = :ProblemID), 0)))";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "ProblemID" => $user_data['car_problem_id']
      ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function finishProblem($user_data){
      $total = $this->total($user_data);

      $query = "UPDATE Car_Problem SET DateFixed = CURDATE(),
                Cost = $total WHERE ProblemID = :ProblemID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "ProblemID" => $user_data['car_problem_id']
      ]);
      return true;
    }
}
