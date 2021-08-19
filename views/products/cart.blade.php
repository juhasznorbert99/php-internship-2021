@extends('layout.main')

@section('content')
    <div>
        <div class="container">
            <div class="row">
                @foreach($items as $key => $value)
                    <div class="col-3 card-distance" style="width: 18rem;">
                        <div class="card-body card">
                            <h5 class="card-title">
                                <?php
                                    $products_path = basePath().'\data\products.php';
                                    $new_data = include($products_path);
                                    echo($new_data[$key]['name']);
                                ?>
                            </h5>
                            <p class="card-text">

                                <?php
                                $products_path = basePath().'\data\products.php';
                                $new_data = include($products_path);
                                echo($new_data[$key]['description']);
                                ?>
                            </p>
                            <div class="row options">

                                <div class="col-3" id="decrease-{{$key+1}}">
                                    <a href="#" class="btn btn-outline-secondary">-</a>
                                </div>

                                <div class="col-3" id="increase-{{$key+1}}">
                                    <a href="#" class="btn btn-outline-secondary">+</a>
                                </div>

                                <div class="col-3" id="delete-{{$key+1}}">
                                    <a href="#" class="btn btn-outline-secondary">Delete</a>
                                </div>
                            </div>
                            <p id="card-id-{{$key+1}}" class="total">Total: 1</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
