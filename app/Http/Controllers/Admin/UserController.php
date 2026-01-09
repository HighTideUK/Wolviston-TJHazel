<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAll()
    {
    	
    	$data = [
            'users' => User::whereAdmin(true)->orderBy('name')->paginate(20),
            'title' => 'Admin Users',
            'active_nav' => [
                'item' => 'users',
                'sub_item' => 'list'
            ]
        ];

        return view('admin.users.index')->with($data);
    }

    public function getEdit(User $user)
    {

        $data = [
            'user' => $user,
            'title' => 'Edit Admin User',
            'action' => route('admin.users.edit_submit', ['user' => $user]),
            'active_nav' => [
                'item' => 'users',
                'sub_item' => ''
            ]
        ];

        return view('admin.users.edit')->with($data);

    }

    public function postEdit(User $user, Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        $message = 'Admin User updated successfully';

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->admin = true;
        $user->save();

        return redirect()->back()->with('success', $message);

    }

    public function getNew()
    {

        $data = [
            'user' => new User,
            'title' => 'New Admin User',
            'action' => route('admin.user.new_submit'),
            'active_nav' => [
                'item' => 'users',
                'sub_item' => 'add'
            ]
        ];

        return view('admin.users.edit')->with($data);

    }

    public function postNew(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        $message = 'New Admin User created successfully';

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->admin = true;
        $user->save();

        return redirect()->route('admin.users')->with('success', $message);

    }

    public function getDelete(User $user)
    {

        $message = 'Admin User <strong>'.$user.'</strong> deleted successfully';
        $user->delete();

        return redirect()->route('admin.users')->with('success', $message);

    }

    public function postUpdateOrder(Request $request)
    {
        
        if ($request->has('data')) {
            $data = $request->input('data');
            foreach ($data as $item) {
                $person = User::find($item['id']);
                if ($person) {
                    $person->order = $item['order'];
                    $person->save();
                }
            }
        }

        return \Response::json([
            'type' => 'success',
            'message' => 'People order updated'
        ]);
    }

}
