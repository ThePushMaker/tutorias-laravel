<?php

namespace App\Jobs;

use App\Services\ZoomAuthService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class RenewZoomAccessToken implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $zoomAuthService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ZoomAuthService $zoomAuthService)
    {
        $this->zoomAuthService = $zoomAuthService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $accessToken = $this->zoomAuthService->getAccessToken();
            Log::info('Token de acceso de Zoom renovado con éxito.', ['token' => $accessToken]);
        } catch (\Exception $e) {
            Log::error('Error al renovar el token de acceso de Zoom: ' . $e->getMessage());
        }
    }
}
