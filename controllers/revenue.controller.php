<?php
// 
require "./_classes/controller.php";
require "./models/revenue.model.php";

// controller for the admin
class revenueController extends controller{
   // getting all the revenue from the model
   public function revenue(){
        // calling the modal to get the revenue
        $revenue = new revenue();
        $data['revenue'] = $revenue->getRevnue();
        // returning the data with the view
        return $this->view("revenue",$data);

   }    
}