<?php 
    include 'layouts/header.html';
    include '../classes/User.php';
    include 'navbar.php';

    $user = new User;
    
    $user_row = $user-> getUsers();

?>

<div class="container w-50 mt-5">
    <h3 class="text-center">EDIT USER</h3>
    <?php foreach($user_row as $user): ?>
        <form action="../actions/edit-user.php?id=<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
             <?php if($user['photo']) :?>
                <div class="row w-50 mx-auto mb-2">
                    <div style="max-width: 100%; overflow: hidden; " class="px-auto">
                        <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="img-fluid">
                    </div>                    
                </div>
             <?php endif; ?>
                <input type="file" name="photo" id="photo" class="form-control w-50 mx-auto">
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" name="first_name" id="" class="form-control" value="<?=$user['first_name']?>">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" name="last_name" id="" class="form-control" value="<?=$user['last_name']?>">
            </div>
            <div class="mb-4">
                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" name="username" id="" class="form-control" value="<?=$user['username']?>">
            </div>
            <div class="text-end">
                <button type="submit" name="cansel" class="btn btn-sm btn-secondary">Cancel</button>
                <button type="submit" name="btn_save" class="btn btn-sm btn-warning w-25">Save</button>            
            </div>
        </form>   
    <?php endforeach; ?> 
</div>



<?php include 'layouts/footer.html'?>