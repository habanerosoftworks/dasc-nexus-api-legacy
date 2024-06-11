<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use ExponentPhpSDK\Expo;

class NotificationController extends Controller
{
    public function storeToken(Request $request)
    {
        $user = User::find(auth()->id());
        $user->expo_token = $request->token;
        $user->save();

        return response()->json(['message' => 'Token stored successfully']);
    }

    public function sendNotification(Request $request)
    {
        $admins = User::where('role', 'admin')->whereNotNull('expo_token')->get();


        $validate = $request->validate([
            'clasroom_id' => 'required',
        ]);
        $classroom = Classroom::find($validate['clasroom_id']);
        $user = User::find(auth()->id());

        $expo = Expo::normalSetup();

        $notification = [
            'body' => 'Salon ' . $classroom->description . ' ha sido solicitado por profesor ' . $user->name,
            'title' => 'Salon solicitado',
        ];

        foreach ($admins as $admin) {
            $token = $admin->expo_token;

            if ($token) {
                $expo->subscribe($admin->id, $token);
                $expo->notify([$admin->id], $notification);
            }
        }

        return response()->json(['message' => 'Notification sent to all admins']);
    }
}
