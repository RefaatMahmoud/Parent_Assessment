<?php

namespace App\Http\Controllers;

use App\Repositories\ProviderRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProviderController extends Controller
{
    private $provider_repository;

    public function __construct(ProviderRepository $provider_repository)
    {
        $this->provider_repository = $provider_repository;
    }

    public function get_users(Request $request)
    {
        try {
            $data = $this->provider_repository->get_users($request->all());
            return response()->json([
                'users' => $data
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            return response()->json([
                'error' => $message
            ]);
        }

    }
}
