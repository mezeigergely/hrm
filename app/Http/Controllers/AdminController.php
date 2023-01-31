<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        try{
            $user = User::where('email', '=', $request->email)->first();
            auth()->login($user);
            return redirect()->to('/admin/managers');
        }
        catch(Exception $e){
            Log::error('Login error!'.' '.$e);
            return Redirect::back()->withErrors(['emailError' => 'The email or password is incorrect, please try again']);
        }
    }

    public function managers()
    {
        $managers = User::where([
            ['position', 'manager']
        ])->get();

        if(count($managers) == 0)
        {
            $managers = 'There are no managers in our database';
        }

        return view('admin.managers', compact('managers'));
    }

    public function createManager(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|max:255|regex:/(.*)@eclick\.hu/i|unique:users',
            'password' => 'required'
        ]);
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->position = 'manager';
            $user->save();
            return redirect()->back()->with('message', 'Manager is added!');
        }
        catch(Exception $e){
            Log::error('Manager create error!'.' '.$e);
            return Redirect::back()->withErrors(['emailError' => 'This e-mail is already exist in our system!']);
        }
    }

    public function employees()
    {
        $employees = User::where([
            ['position', 'employee']
        ])->get();

        if(count($employees) == 0)
        {
            $employees = 'There are no employees in our database';
        }

        return view('admin.employees', compact('employees'));
    }

    public function createEmployee(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|max:255|regex:/(.*)@eclick\.hu/i|unique:users',
            'password' => 'required'
        ]);
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->position = 'employee';
            $user->save();
            return redirect()->back()->with('message', 'Employee is added!');
        }
        catch(Exception $e){
            Log::error('Manager create error!'.' '.$e);
            return Redirect::back()->withErrors(['emailError' => 'This e-mail is already exist in our system!']);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
