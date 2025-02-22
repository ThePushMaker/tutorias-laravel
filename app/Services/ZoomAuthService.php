<?php

// app/Services/ZoomAuthService.php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ZoomAuthService
{
    protected $clientId;
    protected $clientSecret;
    protected $accountId;

    public function __construct()
    {
        $this->clientId = config('services.zoom.client_id');
        $this->clientSecret = config('services.zoom.client_secret');
        $this->accountId = config('services.zoom.account_id');
    }

    public function getAccessToken()
    {
        // Verificar si el token ya está en caché
        if (Cache::has('zoom_access_token')) {
            return Cache::get('zoom_access_token');
        }

        // Solicitar un nuevo access_token a la API de Zoom
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . base64_encode("{$this->clientId}:{$this->clientSecret}")
        ])->post('https://zoom.us/oauth/token', [
            'grant_type' => 'account_credentials',
            'account_id' => $this->accountId,
        ]);

        if ($response->successful()) {
            $accessToken = $response->json('access_token');
            $expiresIn = $response->json('expires_in', 3600);

            // Almacenar el token en caché
            Cache::put('zoom_access_token', $accessToken, $expiresIn - 60);

            return $accessToken;
        }

        throw new \Exception('Error al obtener el token de acceso de Zoom: ' . $response->body());
    }
}
