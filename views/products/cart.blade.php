@extends('layout.main')

@section('content')
    <div>
        <div class="container">
            <div class="row justify-content-around">
                @foreach($items as $key => $value)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$value}}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-outline-secondary">-</a>
                            <a href="#" class="btn btn-outline-secondary">+</a>
                            <p id="card-id-{{$key+1}}">Total: 1</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
