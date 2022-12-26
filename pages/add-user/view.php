<?php 
include "./assets/db/config.php";
include "./php/func-users.php";
include "./php/func-country.php";


include "./php/func-validation.php";

$users = get_all_users($conn);
$countries = get_all_countries($conn);


if (isset($_GET['full_name'])) {
    $full_name = $_GET['full_name'];
}else $full_name = '';

if (isset($_GET['study_level'])) {
    $study_level = $_GET['study_level'];
}else $study_level = '';

if (isset($_GET['country_id'])) {
    $country_id = $_GET['country_id'];
}else $country_id = 0;


?>
<form action="./php/add-user.php" method="POST" enctype="multipart/form-data" class="shadow p-4 rounded mt-5"
    style="width:90%; max-width:50rem;">
    <h1 class="text-center pb-4 display-4 fs-3">Add New User</h1>
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
        <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>">


    </div>
    <div class="mb-3">
        <label class="form-label">Study Level</label>
        <input type="text" class="form-control" name="study_level" value="<?php echo $study_level; ?>">


    </div>
    <div class="mb-3">
        <label class="form-label">Country</label>

        <select name="country" id="" class="form-control">
            <option value="0">Select Country</option>
            <?php if ($countries == 0) { ?>
            # do nothing!
            <?php }else { ?>
            <?php foreach ($countries as $country ) {
                if ($country_id == $country['id']) {  ?>
            <option selected value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>



            <?php }else { ?>
            <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
            <?php }  } } ?>
        </select>

    </div>
    <button type="submit" class="btn btn-primary ">Add New Book</button>


</form>