@extends('layouts')
@section('title','CONFIRMATION')
@section ('content')

<h1>ARE YOU SURE??</h1>
<table class='table'>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Cancel</th>
        <th>Delete</th>
    </tr>
    <tr>
        <td>{!! $user['id'] !!}</td>
        <td>{!! $user['name'] !!}</td>
        <td>{!! link_to_action('UserController@index', 'cancel', [], 
            ['class' => 'btn btn-success']) !!}</td>
        <td>{!! Form::open(['action' => ['UserController@destroy', $user['id']], 
            'method' => 'delete']) !!}
            {!! Form::submit('Destroy', ['class' => 'btn btn-info']) !!}
            {!! Form::close() !!}</td>
    </tr>
</table>
@endsection