<?php 
include "./assets/db/config.php";
include "./php/func-users.php";
include "./php/func-country.php";


include "./php/func-validation.php";

$id =$_GET['id'];
$user = get_user($conn ,$id);
$countries = get_all_countries($conn);

if (!isset($_GET['id'])) {
    header("Location: ./?page=admin");
    exit;
}

if ($user == 0) {
    header("Location:./?page=admin");
    exit;
}


?>
<form action="./php/edit-user.php" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded mt-5"
    style="width:90%; max-width:50rem;">
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
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="user_id" value="<?php echo $user['id']; ?>" hidden>
        <input type="text" class="form-control" name="full_name" value="<?php echo $user['full_name']; ?>">


    </div>
    <div class="mb-3">
        <label class="form-label">Study Level</label>
        <input type="text" class="form-control" name="study_level" value="<?php echo $user['study_level']; ?>">


    </div>
    <div class="mb-3">
        <label class="form-label">Country</label>

        <select name="country" id="" class="form-control">
            <option value="0">Select Country</option>
            <?php if ($countries == 0) { ?>
            # do nothing!
            <?php }else { ?>
            <?php foreach ($countries as $country ) {
                if ($user['country_id'] == $country['id']) {  ?>
            <option selected value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>



            <?php }else { ?>
            <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
            <?php }  } } ?>
        </select>

    </div>

    <button type="submit" class="btn btn-primary ">Update User</button>


</form>