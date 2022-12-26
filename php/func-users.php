<?php 
function get_all_users($con)
{
    $sql  = "SELECT * FROM users ORDER BY id DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
       $users = $stmt->fetchAll();
    }else {
        $users = 0;
    }
    return $users;
}

# Get Book bu ID
function get_user($con ,$id)
{
    $sql  = "SELECT * FROM users WHERE id=? ";
    $stmt = $con->prepare($sql);
    $stmt->execute([$id]);
    if ($stmt->rowCount() > 0) {
       $user = $stmt->fetch();
    }else {
        $user = 0;
    }
    return $user;
}

?>