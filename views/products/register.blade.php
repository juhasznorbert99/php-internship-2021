@extends('layout.main')

@section('content')
    <div class="container">
        <form action="/login-form.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <!--<span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["login-email"]))
                        $aux = $_SESSION["login-email"];
                    echo $aux;
                    ?>
                </span>-->
                <input type="text" class="form-control" placeholder="Enter First Name" name="firstname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <!--<span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["login-email"]))
                        $aux = $_SESSION["login-email"];
                    echo $aux;
                    ?>
                </span>-->
                <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <!--<span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["login-email"]))
                        $aux = $_SESSION["login-email"];
                    echo $aux;
                    ?>
                </span>-->
                <input type="text" class="form-control" placeholder="Enter Address" name="address">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["login-email"]))
                        $aux = $_SESSION["login-email"];
                    echo $aux;
                    ?>
                </span>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">

                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["login-password"]))
                        $aux = $_SESSION["login-password"];
                    echo $aux;
                    ?>
                </span>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div>
            <p><?php
                $aux="";
                if(!isset($_SESSION))
                    session_start();
                if(isset($_SESSION["display-error"]))
                    $aux = $_SESSION["display-error"];
                echo $aux;
                ?></p>
        </div>
    </div>
@endsection
