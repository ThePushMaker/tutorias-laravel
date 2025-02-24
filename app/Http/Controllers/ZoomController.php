<?php

namespace App\Http\Controllers;

use App\Services\ZoomService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

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

    public function createMeeting($userId, $data)
    {
        try {
            $meeting = $this->zoomService->createMeeting($userId, $data);
            return response()->json($meeting);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
