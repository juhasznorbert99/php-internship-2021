@extends('layout.main')

@section('content')
<div>
    <div>UserName: {{$username}}</div>
    <div>First Name: {{$firstName}}</div>
    <div>Last Name: {{$lastName}}</div>

    <div>
        <h3>My list of products - you'll use a nice table</h3>

        <table id="product-table">
            <tr>
            @foreach($products[0] as $i => $value)
                @if($i!='id')
                    @if($i=='description')
                            <th>{{$i}}</th>
                        @else
                            <th><a href="{{'\sort-column.php?sort='.$i}}">{{$i}}</th></a>
                        @endif
                    @endif
            @endforeach
                    <th>Actions</th>
            </tr>

            @foreach($products as $product)
                <tr>
                    @foreach($product as $key => $value)
                        @if($key!='id')
                            <td>{{$value}}</td>
                        @endif
                    @endforeach
                    <td>
                        <button type="submit" class="btn btn-outline-secondary add-cart-button" id="{{$product['id']}}">Add Cart</button>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="container">
            <button type="button" class="btn btn-outline-secondary" id="cart-page">Cart Page</button>
        </div>
        <?php
            //session_start();
            //unset($_SESSION['cart']);
            //unset($_SESSION['sort']);
            echo("<pre>");
            if(isset($_SESSION['cart']))
                var_dump($_SESSION['cart']);
            echo("</br>");
            if(isset($_SESSION['sort']))
                var_dump($_SESSION['sort']);
            echo("</pre>");
        ?>
        <?php

            if(isset($_COOKIE["last-loaded"]))
                echo($_COOKIE["last-loaded"]);
        ?>

        <form action="upload-form.php" method="post" enctype="multipart/form-data" id="form">
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">

                <br>
                <input type="submit" value="Upload Image" name="submit">
            </div>
        </form>
    </div>
</div>
@endsection
