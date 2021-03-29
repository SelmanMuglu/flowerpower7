@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Artikel toevoegen</div>
                    <div class="card-body">
                        <form method="POST" action="{{url('/artikel/bestellingen')}}">
                            @csrf
                            <div class="form-group">
                                <label for="winkel">Kies de winkel</label>
                                <select class="custom-select" id="inputGroupSelect01">
                                    @foreach($winkels as $winkel)
                                        <option name="winkel_id" value="{{$winkel->winkel_id}}">{{$winkel->plaats}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">

                                <label for="exampleInputPassword1">Artikel</label>
                                <textarea type="text" rows="1" class="form-control" name="artikel_id" value="{{$artikel->artikel_id}}">{{$artikel->artikel}}</textarea>
                                <label for="exampleInputPassword1">Prijs</label>
                                <textarea type="text" rows="1"  class="form-control" name="prijs" value="{{$artikel->prijs}}">{{$artikel->prijs}}</textarea>

                            </div>
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label for="aantal">aantal</label>
                                    <input type="number" class="form-control" id="aantal" name="aantal" value="1"
                                           min="1" max="10">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Toevoegen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
