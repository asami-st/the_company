<?php


include 'Connection.php';

// inheritance

class User extends Connection {
                        // $_POST
    public function signUp($request){
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql ="INSERT INTO users (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username','$hashed_password')";

        if ($this->conn->query($sql)) {
            header('location: ../views/sign-in.php');
            exit;
        }else {
            die("Error: ".$this->conn->error);
        }
    }

    public function signIn($request){
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        if ($result = $this->conn->query($sql)) {
            if ($result->num_rows == 1) {               // only one username exist.  $result =object(associative array)
                $user = $result->fetch_assoc();         //$user = not object.   assoc = associative array
    
                if (password_verify($password, $user['password'])) {                
                    session_start();                                                    // allow the save data inside the brows. global variables.
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['full_name'] = $user['first_name']." ".['last_name'];
                    $_SESSION['username'] = $user['username'];

                    header('location: ../views/dashboard.php');
                    exit;
                }else {
                    die("ERROR: Incorrect Password".$this->conn->error);
                }
            }else {
                die("ERROR: Username does not match".$this->conn->error);
            }    
        }else {
            die("ERROR: " .$this->conn->error);
        }
    }

    //dashboard.php
    /*
    public function displayUser(){
        $sql = "SELECT * FROM users";

        if ($result = $this->conn->query($sql)) {
            while ($row = $result->fetch_assoc()){
        ?>
                <tr>
                    <th class="text-center"><i class="fa-solid fa-circle-user"></i></th>
                    <th><?=$row['first_name']?></th>
                    <th><?=$row['last_name']?></th>
                    <th><?=$row['username']?></th>
                    <th>
                        <div class="btn-group" role="group">
                            <form action="#" method="post">
                                <button type="submit" name="btn_edit" class="btn btn-outline-warning btn-sm me-1" value="<?=$row['id']?>"><i class="fa-solid fa-pen fa-sm"></i></button>
                            </form>
                            <form action="../actions/delete.php?id=<?=$row['id']?>" method="post">
                                <button type="submit" name="btn_delete" class="btn btn-outline-danger btn-sm" value="<?=$row['id']?>"><i class="fa-solid fa-trash-can fa-sm"></i></button>                            
                            </form>
                        </div>
                    </th>
                </tr>
        <?php   
            }
        }else {
            die("ERROR: Unalble to retrieve User" .$this->conn->error);
        }
    }
    */

    public function displayUsers(){
        $sql = "SELECT * FROM users";

        if ($result = $this->conn->query($sql)) {
            return $result;
        }else {
            die("ERROR: ". $this->conn->error);
        }
    }

    public function getUsers(){
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE id = $id";

        if ($result = $this->conn->query($sql)) {
            return $result;
        }else {
            die("ERROR: ". $this->conn->error);
        }
    }

    public function editUser($request, $files){
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];
        $username = $request['username'];
        $photo_name = $files['photo']['name'];
        $photo_tmp = $files['photo']['tmp_name'];
        session_start();
        $id = $_SESSION['id'];

        $sql = "UPDATE users SET first_name = '$firstname', last_name = '$lastname', username = '$username', photo = '$photo_name' WHERE id = $id";
    
        if ($this->conn->query($sql)) {
          
            $destination = "../assets/images/$photo_name";
            move_uploaded_file($photo_tmp, $destination);
            header("location: ../views/dashboard.php");
        }else {
            die("ERROR:" .$this->conn->error);
        }
    }

    //delete.php
    public function deleteUser(){
        session_start();
        $id = $_SESSION['id'];

        $sql = "DELETE FROM users WHERE id = $id";

        if ($this->conn->query($sql)) {
            session_unset();
            session_destroy();
            header("location: ../views/sign-in.php");
            exit;
        }else {
            die("ERROR: Unable to delete user" .$this->conn->error);
        }
    }
}