<?php 
include "../assets/db/config.php";
include "../php/func-validation.php";



if (isset($_POST['full_name']) && isset($_POST['study_level'])  && isset($_POST['country']) ) {                                
                                    
    $full_name = $_POST['full_name'];
    $study_level = $_POST['study_level'];
    $country = $_POST['country'];  
    
    
    
     if (!empty($full_name )) {
        
        $sql = "INSERT INTO users (full_name,study_level,country_id) VALUES (?,?,?) "; 
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$full_name,$study_level,$country]);
        if ($res) {
         $sm = " The User Successfully Added!";
         header("Location:../?page=add-user&success=$sm");
         exit;
        }else {
         $em = "Unknown Error Occured";
         header("Location:../?page=add-user&error=$em");
         exit;
        }
        } else {
           
             $em = "Unknown Error Occured";
             header("Location:../?page=add-user&error=$em");
             exit;
            
        }
           
        


    
  
}else {
    header("Location:../?page=admin");
    exit;
}

?>