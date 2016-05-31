@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Список пользователей</div>
                <form >
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Имя
                                </th>
                                <th>
                                    email
                                </th>
                                <th>
                                    Группа
                                </th>
                                <th>
                                    Курс
                                </th>
                            </tr>
                        </thead>
                        @for ($i = 0; $i < $count_users; $i++)
                        <form >
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $array_users[$i] }}
                                    </td>
                                    <td>
                                        {{ $array_emails[$i] }}
                                    </td>
                                    <td>
                                        {{ $array_groups[$i] }}
                                    </td>
                                    <td>
                                        {{ $array_courses[$i] }}
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                        @endfor
                        <tbody>
                            <tr>
                                {!! Form::open(array('url' => '/addUser', 'method' => 'get')) !!}
                                <td>
                                    <input class="field" type="text" name="username" placeholder='Имя'>
                                </td>
                                <td>
                                    <input class="field" type="text" name="useremail" placeholder='email'>
                                </td>
                                <td>
                                    <input class="field" type="text" name="usergroup" placeholder='Группа'>
                                </td>
                                <td>
                                    <input class="field" type="text" name="usercourse" placeholder='Курс'>
                                </td>
                                <td>
                                    {!! Form::submit('Добавить'); !!}
                                </td>
                                {!! Form::close() !!}
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                {!! Form::open(array('url' => '/removeUser', 'method' => 'get')) !!}
                                <td>
                                    <input class="field" type="text" name="username" placeholder='Имя'>
                                </td>
                                <td>
                                    <input class="field" type="text" name="useremail" placeholder='email'>
                                </td>
                                <td>
                                    <input class="field" type="text" name="usergroup" placeholder='Группа'>
                                </td>
                                <td>
                                    <input class="field" type="text" name="usercourse" placeholder='Курс'>
                                </td>
                                <td>
                                    {!! Form::submit('Удалить'); !!}
                                </td>
                                {!! Form::close() !!}
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                {!! Form::open(array('url' => '/editUser', 'method' => 'get')) !!}
                                <td>
                                    <input class="field" type="text" name="useremail" placeholder='Старый email'>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="field" type="text" name="new_username" placeholder='Новое имя'>
                                </td>
                                <td>
                                    <input class="field" type="text" name="new_useremail" placeholder='Новый email'>
                                </td>
                                <td>
                                    <input class="field" type="text" name="new_usergroup" placeholder='Новая группа'>
                                </td>
                                <td>
                                    <input class="field" type="text" name="new_usercourse" placeholder='Новый курс'>
                                </td>
                                <td>
                                    {!! Form::submit('Изменить'); !!}
                                </td>
                                {!! Form::close() !!}
                            </tr>
                        </tbody>
                    </table>
                </form>

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
