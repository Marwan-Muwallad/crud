<?php 
function get_all_countries($con)
{
    $sql  = "SELECT * FROM country ";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
       
       $countries = $stmt->fetchAll();
    }else {
        $countries = 0;
    }
    return $countries;
}

# Get Author bu ID
function get_country($con ,$id)
{
    $sql  = "SELECT * FROM country WHERE id=? ";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
    if ($stmt->rowCount() > 0) {
       $country = $stmt->fetch();
    }else {
        $country = 0;
    }
    return $country;
}

?>