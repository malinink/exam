@extends('layouts.layout')

@section('body')
<h1> Users </h1>
<br>    
@if (session('message'))
    <div class='alert alert-info'>
    {{ session('message') }}
    </div>
@endif

<table class = 'table'>
    
    <tr>
        <th> Id  </th>
        <th> Name </th>
        <th> Active </th>
        @if($logged)
            <th>  </th>
            <th>  </th>
        @endif
    </tr>


@foreach($users as $user)
<tr>
    <td> {{ $user['id'] }} </td>
    <td> {{ $user['name'] }} </td>
    <td> {{ $user['active'] }} </td>
    <td> {!! '<b>gvhgfh</b>'!!} </td>
    @if($logged)
        <td> {{ link_to_action('UserController@deactivate', 'deactivate', [$user['id']], ['class' => 'btn btn-warning btn-sm']) }} </td>
        <td> {{ link_to_action('UserController@activate', 'activate', [$user['id']], ['class' => 'btn btn-success btn-sm']) }} </td>
    @endif
</tr>
@endforeach
</table>

@endsection
