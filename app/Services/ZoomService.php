<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ZoomService
{
    protected $baseUrl = 'https://api.zoom.us/v2';

    public function getUsers()
    {
        $response = Http::withToken(env('ZOOM_ACCESS_TOKEN'))
                        ->get("{$this->baseUrl}/users");

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error al obtener usuarios de Zoom: ' . $response->body());
    }

    public function createMeeting($userId, $data)
    {
        $response = Http::withToken(env('ZOOM_ACCESS_TOKEN'))
                        ->post("{$this->baseUrl}/users/{$userId}/meetings", $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error al crear la reunión en Zoom: ' . $response->body());
    }
}
