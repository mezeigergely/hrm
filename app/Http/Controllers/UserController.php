<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        return view('login');
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
            return redirect()->to('/home');
        }
        catch(Exception $e){
            Log::error('Login error!'.' '.$e);
            return Redirect::back()->withErrors(['emailError' => 'The email or password is incorrect, please try again']);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->to('/');
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

        return view('user.admin.managers', compact('managers'));
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

        return view('user.admin.employees', compact('employees'));
    }

    protected function getUserById($id)
    {
        return User::where([
            ['id', $id]
        ])->get();
    }

    public function holidayRequests()
    {
        return view('user.holidayRequest');
    }

    public function getHolidayRequests()
    {
        $holidayRequests = Holiday::where([
            ['h_is_active', 0]
        ])->get();
        return view('user.manageHolidayRequests', compact('holidayRequests'));
    }

    public function approveHoliday(Request $request)
    {
        $holiday = Holiday::where([
            ['id', $request->id]
        ])->first();
        $holiday->h_type = $request->h_type;
        $holiday->h_is_active = $request->h_is_active;
        $holiday->save();
        return redirect()->back();
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

    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|max:255|regex:/(.*)@eclick\.hu/i',
            'password' => 'required'
        ]);
        try{
            $user = User::where([
                ['id', $request->id]
            ])->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            return Redirect::back()->with('message', 'Updated successfully!');
        }
        catch(Exception $e){
            Log::error('Update error!'.' '.$e);
            return Redirect::back()->withErrors(['emailError' => 'This e-mail is already exist in our system!']);
        }

    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }

    public function createHolidayRequest(Request $request)
    {
        $userType = $this->getUserById(Auth::id());
        $active = 0;
        foreach($userType as $uT)
        {
            $userType = $uT['position'];
        }
        if($userType == "manager"){
            $active = 1;
        }
        $holiday = new Holiday();
        $holiday->user_id = Auth::id();
        $holiday->h_days = $request->holidays;
        $holiday->h_type = $request->h_type;
        $holiday->h_is_active = $active;
        $holiday->save();
        return redirect('/home');
    }

    public function home()
    {
        $user = $this->getUserById(Auth::id());
        $holidays = Holiday::where([
            ['user_id', Auth::id()],['h_is_active', 1]
        ])->get();
        if(!$holidays){
            return view('user.home', compact('user'));
        }
        return view('user.home', compact('user', 'holidays'));
    }
}
