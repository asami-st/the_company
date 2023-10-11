<?php 
    include 'layouts/header.html';
    include '../classes/User.php';
    include 'navbar.php';
    $user = new User;  

    $all_users = $user->displayUsers();
?>

<div class="container">
    <table class="table mt-5 table-bordered table-striped">
        <thead class="table-dark">
            <th></th>
            <th>NAME</th>
            <th>LAST NAME</th>
            <th>USERNAME</th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach($all_users as $user): ?>
                <tr>
                    <td style="width: 110px;">
                        <div style="max-width: 100px; overflow: hidden; " class="px-auto">
                            <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="img-fluid">
                        </div>       
                    </td>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td>
                     <?php if($user['id'] == $_SESSION['id']): ?>
                        <a href="edit-user.php" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="../actions/delete-user.php" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                     <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- <div class="container">
    <div class="row mt-5 mx-auto w-50">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="table-dark">
                    <th></th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>USERNAME</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                // $user->displayUsers();
            ?>
            </tbody>
        </table>
    </div>
</div> -->



<?php include 'layouts/footer.html'?>   