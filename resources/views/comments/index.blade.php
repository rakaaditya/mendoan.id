@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Komentar</h1>
            @if (session('message'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{session('message')}}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comment as $row)
                    <tr>
                        <td>{{$row->email}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->comment}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
