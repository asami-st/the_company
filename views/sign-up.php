<?php include 'layouts/header.html'?>


<body class="bg-light">
    <div style="height:100vh">
    <div class="row h-100 m-0">
        <div class="card my-auto mx-auto w-25">
            <div class="card-header bg-white border-0 py-3">
                <h1 class="text-center">Register</h1>
            </div>
            <div class="card-body">
                <form action="../actions/sign-up.php" method="post">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First name</label>
                        <input type="text" name="first_name" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last name</label>
                        <input type="text" name="last_name" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" name="username" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <div class="form-text">
                            Password must be 8 characters long
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                    <p class="text-center small mt-3">
                        Registered already? <a href="sign-in.php" class="text-decoration-none">Sign in</a>
                    </p>                    



                </form>
            </div>
        </div>
    </div>
    </div>
</body>


<?php include 'layouts/footer.html'?>