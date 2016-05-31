@extends('layouts')
@section('title','Index')
@section('content')

<h1>User's List</h1>
<table class='table'>
    <tr>
        <th>#</th>
        <th>id</th>
        <th>Name</th>
        <th>Delete</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{!! $user['id'] !!}</td>
        <td>{!! link_to_action('UserController@show', $user['id'], $user['id']) !!}</td>
        <td>{!! $user['name'] !!}</td>
        <td>{!! Form::open(['action' => ['UserController@confirm', $user['id']], 
            'method' => 'get']) !!}
            {!! Form::submit('Destroy', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}</td>
    </tr>
    @endforeach
</table>
{!! link_to_action('HomeController@index', 'home', [], 
            ['class' => 'btn btn-success']) !!}
@endsection

