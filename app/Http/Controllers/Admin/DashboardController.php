<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailHakcipta;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_user_count' => User::Verified()->count(),
            'user_count' => User::Verified()->User()->count(),
            'admin_count' => User::Verified()->AdminAndSuperAdmin()->count(),
            'total_ajuan_count' => DetailHakcipta::IsSubmited()->count(),
            'admin_process_ajuan_count' => DetailHakcipta::IsSubmited()->AdminProcess()->count(),
            'revision_ajuan_count' => DetailHakcipta::IsSubmited()->Revision()->count(),
            'finish_ajuan_count' => DetailHakcipta::IsSubmited()->Finish()->count(),
        ];

        // return $data;

        return view('admin.dashboard', $data);
    }
}
