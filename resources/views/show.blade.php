@extends('layouts')
@section('title','Show')
@section ('content')

<h1>SHOW</h1>
<table class='table'>
    <tr>
        <th>id</th>
        <th>Name</th>
    </tr>
    <tr>
        <td>{!! $user['id'] !!}</td>
        <td>{!! $user['name'] !!}</td>
    </tr>
</table>
@endsection