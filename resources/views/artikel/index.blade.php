@extends('layouts.app')

@section('content')
    {{--    <div class="container">--}}
    {{--        <table  class="table">--}}
    {{--            <tr>--}}
    {{--                <th>--}}
    {{--                    Artikel--}}
    {{--                </th>--}}
    {{--                <th>--}}
    {{--                    Prijs--}}
    {{--                </th>--}}
    {{--                @can('edit-users')--}}
    {{--                    <th>--}}
    {{--                        Actions--}}
    {{--                    </th>--}}
    {{--                @endcan--}}
    {{--            </tr>--}}
    {{--            @foreach($artikels as $artikel)--}}
    {{--                <tr>--}}
    {{--                    <td>{{$artikel->artikel}}</td>--}}
    {{--                    <td>€{{$artikel->prijs}},-</td>--}}
    {{--                    @can('edit-users')--}}
    {{--                        <td>--}}
    {{--                            <a href="{{url('/artikel/edit')}}">--}}
    {{--                                <button type="button" class="btn btn-primary float-left">Edit</button>--}}
    {{--                            </a>--}}
    {{--                            @endcan--}}
    {{--                            @can('delete-users')--}}
    {{--                                <form action="" method="POST"--}}
    {{--                                      class="float-left">--}}
    {{--                                    @csrf--}}
    {{--                                    {{method_field('DELETE')}}--}}
    {{--                                    <button type="submit" class="btn btn-warning">Delete</button>--}}
    {{--                                </form>--}}
    {{--                        </td>--}}
    {{--                    @endcan--}}
    {{--                </tr>--}}
    {{--            @endforeach--}}

    {{--        </table>--}}
    {{--    </div>--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @can('edit-users')
                        <a href="{{route('artikel.create')}}">
                            <button type="button" class="btn btn-primary float-left">toevoegen</button>
                        </a>
                        @endcan
                        artikel
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Artikel</th>
                                <th scope="col">Prijs</th>
                                @can('edit-users','delete-users')
                                    <th scope="col">Wijzig</th>
                                    <th scope="col">Verwijder</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($artikels as $artikel)
                                <tr>
                                    <td>{{$artikel->artikel}}</td>
                                    <td>€{{$artikel->prijs}},-</td>
                                    <td>{{$artikel->bestellingen()->count()}}</td>
                                    @can('for-users')
                                    <td><a href="{{url('artikel/bestellen', $artikel->artikel_id)}}">
                                            <button type="button" class="btn btn-primary float-left">Bestellen</button>
                                        </a></td>
                                    @endcan
                                    @can('edit-users')
                                        <td>
                                            <a href="{{route('artikel.edit', $artikel->artikel_id)}}">
                                                <button type="button" class="btn btn-primary float-left">Edit</button>
                                            </a>
                                    @endcan
                                    <td>
                                        @can('delete-users')
                                            <form action="{{route('artikel.destroy', $artikel)}}" method="POST"
                                                  class="float-left">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-warning">Delete</button>
                                            </form>
                                    </td>
                                    </td>
                                    @endcan
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
