<?php

// app/Services/ZoomAuthService.php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ZoomAuthService
{
    protected $clientId;
    protected $clientSecret;
    protected $accountId;
    
    /**
     * Inicializa el servicio con las credenciales de Zoom.
     */
    public function __construct()
    {
        $this->clientId = config('services.zoom.client_id');
        $this->clientSecret = config('services.zoom.client_secret');
        $this->accountId = config('services.zoom.account_id');
    }

    /**
     * Obtiene un token de acceso desde la caché o solicita uno nuevo a Zoom.
     *
     * @return string
     * @throws \Exception
     */
    public function getAccessToken(): string
    {
        Log::info('Obteniendo el token de acceso de Zoom...');
        // Verificar si el token ya está en caché
        if (Cache::has('zoom_access_token')) {
            return Cache::get('zoom_access_token');
        }
        
        return $this->requestNewAccessToken();
    }
    
    /**
     * Solicita un nuevo token de acceso a la API de Zoom y lo almacena en caché.
     *
     * @return string
     * @throws \Exception
     */
    protected function requestNewAccessToken(): string
    {
        Log::info('Solicitando un nuevo token a la API de Zoom...');
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
            Log::info('Token de acceso de Zoom obtenido con éxito y almacenado en caché.', ['token' => $accessToken]);

            return $accessToken;
        }
        
        $error = 'Error al obtener el token de acceso de Zoom: ' . $response->body();
        Log::error($error);
        throw new \Exception($error);
    }
}
