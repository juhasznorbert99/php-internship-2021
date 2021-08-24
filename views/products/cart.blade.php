@extends('layout.main')

@section('content')
    <div>
        <?php
//            var_dump($_SESSION['cart']);
        ?>
        <div class="container">
            <div class="row">
                @foreach($items as $key => $value)
                    <div class="col-3 card-distance" style="width: 18rem;">
                        <div class="card-body card">
                            <h5 class="card-title">
                                <?php
                                    foreach ($products as $pk => $pv){
                                        if($pv['id']==$value)
                                            echo $pv['name'];
                                    }
                                ?>
                            </h5>
                            <p class="card-text">

                                <?php
                                    foreach ($products as $pk => $pv){
                                        if($pv['id']==$value)
                                            echo $pv['description'];
                                    }
                                ?>
                            </p>
                            <div class="row options">
                                <!-- acel value e valoarea, ca si index ii value-1-->
                                <div class="col-3 decrease">
                                    <a class="btn btn-outline-secondary" id="decrease-{{$value}}">-</a>
                                </div>

                                <div class="col-3 increase">
                                    <a class="btn btn-outline-secondary" id="increase-{{$value}}">+</a>
                                </div>

                                <div class="col-3 delete">
                                    <a class="btn btn-outline-secondary" id="delete-{{$value}}">Delete</a>
                                </div>
                            </div>
                            <p id="card-id-{{$value}}" class="total">Total items: 1</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <form>
                <div class="form-group row">
                    <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div>
            </form>
            <button class="btn btn-outline-secondary" id="buy">Submit</button>
        </div>
    </div>
@endsection
