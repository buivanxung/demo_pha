<?php
     include('core/includes/constant_common.php');  
  class leftMenu{
     
      var $sessAdmin = '';
      var $sessAccount = '';
      var $sessAgent = '';                  
      var $sessCustommer = '';                        
      var $sessSubCustomer = '';
      var $sessCurName = '';
      var $sessCurPowerType = '';
      var $sessCurPower = '';
      var $sessUserId = '';
      var $sessUserName = '';
      var $arrPowerChange = array();
      function leftMenu(){
         $sessAdmin         = $_SESSION['user']['admin'];
         $sessAccount       = $_SESSION['user']['account'];
         $sessAgent         = $_SESSION['user']['agent'];
         $sessCustommer     = $_SESSION['user']['customer'];
         $sessSubCustomer   = $_SESSION['user']['subcustomer'];
         $sessCurName       = $_SESSION['user']['curname'];
         $sessCurPowerType  = $_SESSION['user']['powertype'];
         $sessCurPower      = $_SESSION['user']['power'];     
         $sessUserId        = $_SESSION['user']['id'];
         $sessUserName      = $_SESSION['user']['name'];
      } 
      
      function createChangeUser(){
          
          
      }
       
  }
?>
