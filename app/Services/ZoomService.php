<?php

namespace App\Services;

use App\Services\ZoomAuthService;
use Illuminate\Support\Facades\Http;

class ZoomService
{
    protected $baseUrl = 'https://api.zoom.us/v2';
    protected $zoomAuthService;
    
    public function __construct(ZoomAuthService $zoomAuthService)
    {
        $this->zoomAuthService = $zoomAuthService;
    }

    public function getUsers()
    {
        $accessToken = $this->zoomAuthService->getAccessToken();
        
        $response = Http::withToken($accessToken)
                        ->get("{$this->baseUrl}/users");

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error al obtener usuarios de Zoom: ' . $response->body());
    }

    public function createMeeting($userId, $data)
    {
        $accessToken = $this->zoomAuthService->getAccessToken();
        
        $response = Http::withToken($accessToken)
                        ->post("{$this->baseUrl}/users/{$userId}/meetings", $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error al crear la reunión en Zoom: ' . $response->body());
    }
}
