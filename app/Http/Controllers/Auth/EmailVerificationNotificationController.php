<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('profile.edit')->with('success', 'Your email has already been verified');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification notification has been sent');
    }
}
