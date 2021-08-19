@extends('layout.main')

@section('content')
    <div>
        <?php
            //var_dump($_SESSION['cart']);
        ?>
        <div class="container">
            <div class="row">
                @foreach($items as $key => $value)
                    <div class="col-3 card-distance" style="width: 18rem;">
                        <div class="card-body card">
                            <h5 class="card-title">
                                <?php
                                    $products_path = basePath().'\data\products.php';
                                    $new_data = include($products_path);
                                    echo($new_data[$value-1]['name']);
                                ?>
                            </h5>
                            <p class="card-text">

                                <?php
                                $products_path = basePath().'\data\products.php';
                                $new_data = include($products_path);
                                echo($new_data[$value-1]['description']);
                                ?>
                            </p>
                            <div class="row options">
                                <!-- acel value e valoarea, ca si index ii value-1-->
                                <div class="col-3 decrease">
                                    <a href="#" class="btn btn-outline-secondary" id="decrease-{{$value}}">-</a>
                                </div>

                                <div class="col-3 increase">
                                    <a href="#" class="btn btn-outline-secondary" id="increase-{{$value}}">+</a>
                                </div>

                                <div class="col-3 delete">
                                    <a href="#" class="btn btn-outline-secondary" id="delete-{{$value}}">Delete</a>
                                </div>
                            </div>
                            <p id="card-id-{{$value}}" class="total">Total items: 1</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
