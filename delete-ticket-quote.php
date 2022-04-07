<?php 

require 'flight/Flight.php'; 

 

 

Flight::register('db', 'Database', array('crm')); 

$json_podaci = file_get_contents("php://input"); 

Flight::set('json_podaci', $json_podaci ); 




Flight::route('DELETE /quote/@id', function($id){ 

    header ("Content-Type: application/html; charset=utf-8"); 
    
    $db = Flight::db(); 
    
    if ($db->delete("prequest", array("id"),array($id))){ 
    
    $odgovor["poruka"] = "Quote je uspešno izbrisan"; 
    
    $json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE); 
    
    echo $json_odgovor; 
    
    return false; 
    
    } else { 
    
    $odgovor["poruka"] = "Došlo je do greške prilikom brisanja quote-a"; 
    
    $json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE); 
    
    echo $json_odgovor; 
    
    return false; 
    
     
    
    } 
    
     
    
    });

    Flight::route('DELETE /ticket/@id', function($id){ 

      header ("Content-Type: application/html; charset=utf-8"); 
      
      $db = Flight::db(); 
      
      if ($db->delete("ticket", array("id"),array($id))){ 
      
      $odgovor["poruka"] = "Ticket je uspešno izbrisan"; 
      
      $json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE); 
      
      echo $json_odgovor; 
      
      return false; 
      
      } else { 
      
      $odgovor["poruka"] = "Došlo je do greške prilikom brisanja ticket-a"; 
      
      $json_odgovor = json_encode ($odgovor,JSON_UNESCAPED_UNICODE); 
      
      echo $json_odgovor; 
      
      return false; 
      
       
      
      } 
      
       
      
       
      
      });

    



      Flight::route('GET /firstticket', function(){ 

        header ("Content-Type: application/html; charset=utf-8"); 
        
        $db = Flight::db(); 
        
        $db->select("ticket", "*", null); 
        
        $red=$db->getResult()->fetch_object(); 
        
        
        
        $json_niz = json_encode ($red,JSON_UNESCAPED_UNICODE); 
        
        echo $json_niz; 
        
        return false; 
        
        }); 





 

Flight::start(); 

?>