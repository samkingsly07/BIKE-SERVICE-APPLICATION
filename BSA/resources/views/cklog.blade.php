<?php  session_start(); 
                  
                  if (isset($_SESSION['user'])) {
               // logged in
             unset($_SESSION['user']);
               header('Refresh: 0; URL = adminlog');
   
             } else {
               // not logged in
               
               header('Refresh: 0; URL = sam');
          
             }
                      
                  
?>