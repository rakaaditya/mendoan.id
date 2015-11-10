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
                        <th>ID</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Komentar</th>
                        @if($type != 'trash')
                            <th>Musnahkan</th>
                        @else
                            <th>Balikin</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($comment as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->comment}}</td>
                        @if($type != 'trash')
                            <td><a class="btn btn-danger" href="{{url('comment/delete/?src=cms&id='.$row->id)}}"><i class="fa fa-trash"></i></a></td>
                        @else
                            <td><a class="btn btn-primary" href="{{url('comment/restore/?src=cms&id='.$row->id)}}"><i class="fa fa-check"></i></a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $comment->render() !!}
        </div>
    </div>
@endsection
