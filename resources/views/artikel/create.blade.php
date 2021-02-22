@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Artikel toevoegen</div>

                    <div class="card-body">
                        <form method="POST" action="{{url('/artikel')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Artikel</label>
                                <input type="text" class="form-control" name="artikel" placeholder="artikel">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">artikel</label>
                                <input type="text" class="form-control" name="prijs" placeholder="prijs">
                            </div>

                            <button type="submit" class="btn btn-primary">Toevoegen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
