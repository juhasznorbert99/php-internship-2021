@extends('layout.main')

@section('content')
    <?php
        if(!isset($_SESSION))
            session_start();
        $_SESSION['token'] = $_GET['token'];
    ?>
    <form action="/confirm.php" method="post">
        <center><button type="submit" class="btn btn-outline-secondary">Confirm</button></center>
    </form>
    <p>
        <?php
            if(!isset($_SESSION))
                session_start();
            if(isset($_SESSION['token-response']) && $_SESSION['token-response']!="")
                echo $_SESSION['token-response'];
        ?>
    </p>
@endsection
