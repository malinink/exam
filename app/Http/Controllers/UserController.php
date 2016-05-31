<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Validator;

class UserController extends Controller {

    public function addUser(Request $request) {

        $username = $request->input('username');
        $useremail = $request->input('useremail');
        $usergroup = $request->input('usergroup');
        $usercourse = $request->input('usercourse');

        $validator = Validator::make($request->all(), [
                    'username' => 'required', //|regex:/[а-я]/',
                    'usercourse' => 'required|regex:/[1-4]/|required_with_all:usergroup',
                    'usergroup' => 'required|digits:3|required_with_all:usercourse',
                    'useremail' => 'required'
        ]);

        $validator->after(function($validator) use ($username, $usercourse, $usergroup) {
            if ((ucfirst(strtolower(strval($username))) == strval($username)) == false) {
                $validator->errors()->add('field', 'Неправильное имя');
            }
            if ((intval(floor($usergroup / 100)) == intval($usercourse)) == false) {
                $validator->errors()->add('field', 'Неправильный номер группы');
            }
        });

        if ($validator->fails() == false) {
            App\User::create(['name' => $username, 'email' => $useremail, 'group' => $usergroup, 'course' => $usercourse]);
        }

        return redirect('/listUsers')
                        ->withErrors($validator)
                        ->withInput();
    }

    public function listUsers() {
        $users_count = App\User::all()->count();
        //Создание массива, содержащего все имена студентов
        $array_users = App\User::all()->pluck('name')->toArray();
        $array_emails = App\User::all()->pluck('email')->toArray();
        $array_groups = App\User::all()->pluck('group')->toArray();
        $array_courses = App\User::all()->pluck('course')->toArray();


        return view('listUsers', ['count_users' => $users_count,
            'array_users' => $array_users,
            'array_emails' => $array_emails,
            'array_groups' => $array_groups,
            'array_courses' => $array_courses,
        ]);
    }

    public function removeUser(Request $request) {

        $username = $request->input('username');
        $useremail = $request->input('useremail');
        $usergroup = $request->input('usergroup');
        $usercourse = $request->input('usercourse');

        if ((($username === null) || ($useremail === null) || ($usergroup === null) || ($usercourse === null)) == false) {


            $validator = Validator::make($request->all(), [
                        //      'username' => 'required|regex:/[а-я]/',
                        'usercourse' => 'regex:/[1-4]/|required_with_all:usergroup',
                        'usergroup' => 'digits:3|required_with_all:usercourse',
                        'useremail' => 'required'
            ]);

            $validator->after(function($validator) use ($username, $usercourse, $usergroup) {
                if ((ucfirst(strtolower(strval($username))) == strval($username)) == false) {
                    $validator->errors()->add('field', 'Неправильное имя');
                }
                if ((intval(floor($usergroup / 100)) == intval($usercourse)) == false) {
                    $validator->errors()->add('field', 'Неправильный номер группы');
                }
            });

            if ($validator->fails() == false) {
                $useremail = $request->input('useremail');
                $user = App\User::where('email', 'LIKE', '%' . $useremail . '%')->first();
                $user->delete();
            }
            return redirect('/listUsers')
                            ->withErrors($validator)
                            ->withInput();
        }
    }

    public function editUser(Request $request) {

        $username = $request->input('new_username');
        $useremail = $request->input('useremail');
        $usergroup = $request->input('new_usergroup');
        $usercourse = $request->input('new_usercourse');

        if ((($username === null) || ($useremail === null) || ($usergroup === null) || ($usercourse === null)) == false) {


            $validator = Validator::make($request->all(), [
                        //      'username' => 'required|regex:/[а-я]/',
                        'usercourse' => 'regex:/[1-4]/|required_with_all:usergroup',
                        'usergroup' => 'digits:3|required_with_all:usercourse',
                        'useremail' => 'required'
            ]);

            $validator->after(function($validator) use ($username, $usercourse, $usergroup) {
                if ((ucfirst(strtolower(strval($username))) == strval($username)) == false) {
                    $validator->errors()->add('field', 'Неправильное имя');
                }
                if ((intval(floor($usergroup / 100)) == intval($usercourse)) == false) {
                    $validator->errors()->add('field', 'Неправильный номер группы');
                }
            });

            if ($validator->fails() == false) {
                $new_username = $request->input('new_username');
                $new_useremail = $request->input('new_useremail');
                $new_usergroup = $request->input('new_usergroup');
                $new_usercourse = $request->input('new_usercourse');

                $user = App\User::where('email', 'LIKE', '%' . $useremail . '%')->first();
                $user->name = $new_username;
                $user->email = $new_useremail;
                $user->group = $new_usergroup;
                $user->course = $new_usercourse;
                $user->save();
            }
            return redirect('/listUsers')
                            ->withErrors($validator)
                            ->withInput();
        }
    }

}
