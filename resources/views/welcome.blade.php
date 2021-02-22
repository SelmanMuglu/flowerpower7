@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 30rem;">
                    <img class="card-img-top" src="/images/rozen.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Rozen boeket</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Meer... </a>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 30rem;">
                <img class="card-img-top" src="/images/winkel.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Onze winkels</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Meer...</a>
                </div>
            </div>
        </div>
    </div>
@endsection


