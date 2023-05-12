<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('profile.index', $data);
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make(
            data: $request->all(),
            rules: [
                'old_password' => ['required', 'current_password:api']
            ],
        )->validate();
    }
}
