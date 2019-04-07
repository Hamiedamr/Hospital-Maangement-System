<?php
define("home_path",'/hms/');
    if(isset($_COOKIE['admin'])){
        header("location:".home_path."login/admin_panel.php");
    }else {
        include("../header.php");
?>


</head>
<body style="background-image:url('img/background.jpg'); background-repeat:no-repeat; background-size: cover; background-opacity:0.5">

        <div class="container" style="margin-top:5rem;">
            <div class="card" style="width: 18rem; margin:auto;">
            <img class="card-img-top" src="img/hospital.jpg" alt="Card image cap">

                <div class="card-body">
                         <center><h5 class="card-title">Admin Login</h5></center>        
                  
                    <form action="func.php" method="post" class="form-group">
                        <label for="">Username:</label>
                        <input type="text" class="form-control" name="username" placeholder="enter username" ><br>
                        
                        <label for="">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="enter password" ><br>
                        
                        <button type="submit" class="btn btn-primary form-control" name="login_submit" id="ab1">Submit</button>
                        <?php 
                                session_start() ;
                            if(isset($_SESSION['login_error'] )):
                                ?>
                            <h6 class="alert alert-danger" role="alert">
                                <?php
                                echo($_SESSION['login_error'] );
                                ?>
                                <?php
                                unset($_SESSION['login_error']);
                            endif 
                    
                    ?></h6>
                    </form>
                </div>
            </div>
        </div>
















<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php

                            }

?>