<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users/user');
        // $data = User::all();
        // return $this->success($data, 200);
        // return $data;
    }

    private function success($data, $statusCode, $message = 'success')
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ], $statusCode);
    }
    private function failedResponse($message, $statusCode)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
            'status_code' => $statusCode
        ], $statusCode);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            $msg = $validator->errors();

            return $this->failedresponse($msg,422);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $saveUser = $user->save();
        if ($saveUser) {
            return $this->success($user,201);
        } else {
            return $this->failedResponse('user gagal ditambahkan!',500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->success($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
            'email' => 'nullable',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $msg = $validator->errors();

            return $this->failedresponse($msg,422);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = $request->password ? Hash::make($request->password) : $user->password;
        }
        $saved = $user->save();

        if ($saved) {
            return $this->success($user,200);
        } else {
            return $this->failedResponse('user gagal diupdate',500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $deleteData = $user->delete();

        if ($deleteData) {
            return $this->success(null,200);
        } else {
            return $this->failedResponse('user gagal dihapus',500);
        }
    }
}
