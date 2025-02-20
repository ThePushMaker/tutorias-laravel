<?php

namespace App\Http\Controllers;

use App\Services\ZoomService;
use Illuminate\Http\Request;

class ZoomController extends Controller
{
    protected $zoomService;

    public function __construct(ZoomService $zoomService)
    {
        $this->zoomService = $zoomService;
    }

    public function getUsers()
    {
        try {
            $users = $this->zoomService->getUsers();
            return response()->json($users);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createMeeting(Request $request, $userId)
    {
        try {
            $data = [
                'topic' => $request->input('topic', 'Nueva Reunión'),
                'type' => 1, // Tipo de reunión (1 = instantánea, 2 = programada)
                'start_time' => now()->addMinutes(10)->toIso8601String(),
                'duration' => 30,
                'timezone' => 'America/Chihuahua',
                'settings' => [
                    'join_before_host' => true,
                    'waiting_room' => false,
                ],
            ];

            $meeting = $this->zoomService->createMeeting($userId, $data);
            return response()->json($meeting);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
