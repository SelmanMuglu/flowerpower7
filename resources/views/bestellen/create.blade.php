@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Artikel toevoegen</div>
                    <div class="card-body">
                        <form method="POST" action="{{url('/bestellen')}}">

                            <div class="form-group">
                                <label for="winkel">Kies de winkel</label>
                                <select class="custom-select" id="inputGroupSelect01">
                                    @foreach($winkels as $winkel)
                                        <option value="{{$winkel->id}}">{{$winkel->plaats}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Artikel</label>
                                <input type="text" class="form-control" name="artikel" value="{{$artikel->artikel}}">
                                <label for="exampleInputPassword1">Prijs</label>
                                <input type="text" class="form-control" name="prijs" value="{{$artikel->prijs}}">
                            </div>
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label for="tentacles">aantal</label>

                                    <input type="number" class="form-control" id="aantal" name="aantal"
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

