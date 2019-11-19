<?php

namespace Tests\Feature;

use App\Enums\DataProviderEnum;
use App\Enums\StatusProviderEnum;
use App\Repositories\ProviderRepository;
use Tests\TestCase;

class ProviderControllerTest extends TestCase
{
    private $provider_repository;
    private $data = [];

    function setUp(): void
    {
        parent::setUp();
        $this->provider_repository = new ProviderRepository();
    }

    public function testAllUsers()
    {
        $response = $this->get('/api/v1/users');
        $response->assertStatus(200);
        $data = $this->provider_repository->all([]);
        $response->assertJson([
            'users' => $data
        ]);
    }

    public function testUsersWithProviderX()
    {
        $response = $this->get('/api/v1/users?provider=' . DataProviderEnum::DataProviderX);
        $response->assertStatus(200);
        $this->data = $this->provider_repository->all([
            'provider' => DataProviderEnum::DataProviderX
        ]);

        $response->assertJson([
            'users' => $this->data
        ]);
    }

    public function testUsersWithProviderY()
    {
        $response = $this->get('/api/v1/users?provider=' . DataProviderEnum::DataProviderY);
        $response->assertStatus(200);
        $this->data = $this->provider_repository->all([
            'provider' => DataProviderEnum::DataProviderY
        ]);
        $response->assertJson([
            'users' => $this->data
        ]);
    }

    public function testUsersWithAuthorizedStatusCode()
    {
        $response = $this->get('/api/v1/users?statusCode=' . StatusProviderEnum::AUTHORIZED);
        $response->assertStatus(200);
        $this->data = $this->provider_repository->all([
            'statusCode' => StatusProviderEnum::AUTHORIZED
        ]);
        $response->assertJson([
            'users' => $this->data
        ]);
    }

    public function testUsersWithDeclineStatusCode()
    {
        $response = $this->get('/api/v1/users?statusCode=' . StatusProviderEnum::DECLINE);
        $response->assertStatus(200);
        $this->data = $this->provider_repository->all([
            'statusCode' => StatusProviderEnum::DECLINE
        ]);
        $response->assertJson([
            'users' => $this->data
        ]);
    }

    public function testUsersWithRefundedStatusCode()
    {
        $response = $this->get('/api/v1/users?statusCode=' . StatusProviderEnum::REFUNDED);
        $response->assertStatus(200);
        $this->data = $this->provider_repository->all([
            'statusCode' => StatusProviderEnum::REFUNDED
        ]);
        $response->assertJson([
            'users' => $this->data
        ]);
    }

    public function testUsersWithCurrency()
    {
        $currency = 'AED';
        $response = $this->get('/api/v1/users?currency=' . $currency);
        $response->assertStatus(200);
        $this->data = $this->provider_repository->all([
            'currency' => $currency
        ]);
        $response->assertJson([
            'users' => $this->data
        ]);
    }

    public function testUsersWithBalanceRange()
    {
        $balanceMin = 130;
        $balanceMax = 222;
        $response = $this->get('/api/v1/users?balanceMin=' . $balanceMin . '&balanceMax=' . $balanceMax);
        $response->assertStatus(200);
        $this->data = $this->provider_repository->all([
            'balanceMin' => $balanceMin,
            'balanceMax' => $balanceMax,
        ]);
        $response->assertJson([
            'users' => $this->data
        ]);
    }

}
