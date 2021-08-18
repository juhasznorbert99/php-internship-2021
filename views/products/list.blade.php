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
                        <a href="{{'\add-product.php?id='.$product['id']}}"><button type="submit" class="btn btn-outline-secondary" id="{{$product['id']}}">Add Cart</button></a>
                    </td>
                </tr>
            @endforeach
        </table>
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
    </div>
</div>
@endsection
