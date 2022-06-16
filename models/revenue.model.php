<?php
require "_classes/model.php";

class revenue extends Model{
    // getting all the revnue from the data base
    public function getRevnue(){
        // sql query
        $sql = "SELECT * FROM revenue INNER JOIN project ON revenue.project=project.projectid";
        // getting the result as a associative array
        $result = $this->con->query($sql);
        // if there is a result
        if($result->rowCount() > 0){
            // getting the result as an associative array
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            // returning the data
            return $data;
        }
    }
}