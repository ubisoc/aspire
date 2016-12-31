<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the list of notifications this student has received.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $notifications = $user->notifications()->take(100)->paginate(5);

        return view('notifications/index', ['notifications' => $notifications, 'user' => $user]);
    }

    /**
     * Show the one notification this student has received.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $notificationId)
    {
        $user = \Auth::user();
        $notification = $user->notifications()->where('id', '=', $notificationId)->firstOrFail();
        $notification->markAsRead();

        return view('notifications/show', ['notification' => $notification, 'user' => $user]);
    }

    /**
     * Delete a notification which a student has received.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $notificationId)
    {
        $notification = Notification::where('id', '=', $notificationId)->firstOrFail();
        $notification->delete();

        return view('notifications/index');
    }
}
