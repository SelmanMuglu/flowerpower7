@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        artikel
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Winkel locatie</th>
                                <th scope="col">artikel</th>
                                <th scope="col">prijs</th>
                                <th scope="col">aantal</th>
                                <th scope="col">totaal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bestellingen as $bestelling)
                                <tr>
{{--                                    @dd($bestelling->winkel)--}}
                                    <td>{{$bestelling->winkel->plaats}}</td>
                                    <td>{{$bestelling->artikel->artikel}}</td>
                                    <td>{{$bestelling->prijs}}</td>
                                    <td>{{$bestelling->aantal}}</td>
                                    <td>{{$bestelling->totaal}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
