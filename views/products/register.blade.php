@extends('layout.main')

@section('content')
    <div class="container">
        <form action="/register-form.php" method="post">
            <div class="form-group">
                <label>First Name</label>
                <span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["register-firstname"]))
                        $aux = $_SESSION["register-firstname"];
                    echo $aux;
                    ?>
                </span>
                <input type="text" class="form-control" placeholder="Enter First Name" name="firstname">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["register-lastname"]))
                        $aux = $_SESSION["register-lastname"];
                    echo $aux;
                    ?>
                </span>
                <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname">
            </div>
            <div class="form-group">
                <label>Address</label>
                <span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["register-address"]))
                        $aux = $_SESSION["register-address"];
                    echo $aux;
                    ?>
                </span>
                <input type="text" class="form-control" placeholder="Enter Address" name="address">
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["register-phone"]))
                        $aux = $_SESSION["register-phone"];
                    echo $aux;
                    ?>
                </span>
                <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone">
            </div>
            <div class="form-group">
                <label>Email address</label>
                <span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["register-email"]))
                        $aux = $_SESSION["register-email"];
                    echo $aux;
                    ?>
                </span>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <span class="error">
                    <?php
                    $aux = "*";
                    if(!isset($_SESSION))
                        session_start();
                    if(isset($_SESSION["register-password"]))
                        $aux = $_SESSION["register-password"];
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
                if(isset($_SESSION["register-display-error"]))
                    $aux = $_SESSION["register-display-error"];
                echo $aux;
                ?></p>
        </div>
    </div>
@endsection
