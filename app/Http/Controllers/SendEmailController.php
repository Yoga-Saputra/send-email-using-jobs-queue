<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendEmailController extends Controller
{
    public function sendEmail()
    {
        $users = DB::table('users')->get();
        foreach ($users as $key => $value) {
            $user = DB::table('users')->where('id', $value->id)->first();
            dispatch(new SendEmailJob($user));
        }
        dd('email has been delivered');
    }
}
