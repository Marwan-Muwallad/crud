<?php 
include "./assets/db/config.php";
include "./php/func-users.php";
include "./php/func-country.php";


$users = get_all_users($conn);
$countries = get_all_countries($conn);

?>

<?php if ($users == 0) { ?>
div class="alert alert-warning text-center p-5 " role="alert">
<img src="./img/box.png" width="100"><br>
There is no user in Database!
</div>

<?php }else { ?>
<h4>All users</h4>
<?php if (isset($_GET['error'])) { ?>
<div class="alert alert-danger" role="alert">
    <?php echo htmlspecialchars($_GET['error']); ?>
</div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
<div class="alert alert-success" role="alert">
    <?php echo htmlspecialchars($_GET['success']); ?>
</div>

<?php } ?>
<table class="table table-bordered shadow">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Study Level</th>
            <th scope="col">Country</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php  
        $i = 0;
        foreach($users as $user) { 
        $i++;    
            ?>


        <tr>
            <td scope="row"><?php echo $i; ?></td>

            <td><?php echo $user['full_name']; ?>
            <td><?php echo $user['study_level']; ?>

            </td>

            <td><?php  $user['country_id']; ?>
                <?php if ($countries == 0) {
                echo "Undefined";
            }else {
                foreach($countries as $country){
                    if ($country['id'] == $user['country_id']) {
                        echo $country['name'];
                    }
                }
            }?>
            </td>


            <td>
                <a href="./?page=edit-user&id=<?php echo $user['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="./php/delete-user.php?id=<?php echo $user['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php }?>
</table>
<?php } ?>


</form>