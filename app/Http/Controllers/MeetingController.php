<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMeeting;




class MeetingController extends Controller
{
    public function meetingUser()
    {
        return view('meeting.createMeeting');
    }

    public function createMeeting()
    {
        $user = Auth::user();
        $meeting = $user->getUserMeetings()->first();
     

        if (!$meeting) {
            $name = 'agora' . rand(1111, 9999);
            $meetingData = creatAgoraProject($name);

            // Create a new meeting record associated with the user
            $meeting = new UserMeeting();
            $meeting->user_id = $user->id; // Assign the user_id
            $meeting->name = $name;
            // Other meeting attributes
            $meeting->save();
        }
    }
}
