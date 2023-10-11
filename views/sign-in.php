<?php include 'layouts/header.html'?>


<body class="bg-light">
    <div style="height:100vh">
    <div class="row h-100 m-0">
        <div class="card my-auto mx-auto w-25">
            <div class="card-header bg-white border-0 py-3">
                <h1 class="text-center">Login</h1>
            </div>
            <div class="card-body">
                <form action="../actions/sign-in.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" name="username" id="" class="form-control" placeholder="USERNAME">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <p class="text-center small mt-3">
                        Don't have an account? <a href="sign-up.php" class="text-decoration-none">Sign up</a>
                    </p>                    
                </form>
            </div>
        </div>
    </div>
    </div>
</body>


<?php include 'layouts/footer.html'?>