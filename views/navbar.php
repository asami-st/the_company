<?php
    session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
    <div class="container">
        <a href="#" class="navbar-brand fs-4 fw-bold mb-1">The Company</a>

        <button class="navbar-toggler" type="botton" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav">

            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="#" class="nav-link"><?=$_SESSION['username']?></a></li>
                <li class="nav-item"><a href="#" class="nav-link text-danger">Logout</a></li>
            </ul>
        </div>        
    </div>

</nav>

