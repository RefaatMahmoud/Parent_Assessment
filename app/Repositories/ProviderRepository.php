<?php

namespace App\Repositories;

use App\Enums\DataProviderEnum;
use App\Enums\StatusProviderEnum;
use Illuminate\Support\Facades\Storage;

class ProviderRepository implements RepositoryInterface
{

    public function all($data)
    {
        $data_x = json_decode(Storage::disk('local')->get('jsons/DataProviderX.json'), true);
        $data_y = json_decode(Storage::disk('local')->get('jsons/DataProviderY.json'), true);
        return $this->filterProvider($data, $data_x, $data_y);
    }

    protected function filterProvider($data, $data_x, $data_y)
    {
        if (isset($data['provider'])) {
            if ($data['provider'] == DataProviderEnum::DataProviderX) {
                return $data_x['users'];
            }
            if ($data['provider'] == DataProviderEnum::DataProviderY) {
                return $data_y['users'];
            } else {
                return [];
            }
        }

        if (isset($data['statusCode'])) {
            return $this->filterStatusCode($data, $data_x);
        }


        if (isset($data['currency'])) {
            return array_values(collect($data_x['users'])->where('Currency', $data['currency'])->all());
        }

        if (isset($data['balanceMin']) && isset($data['balanceMax'])) {
            return array_values(collect($data_y['users'])->whereBetween('balance', [$data['balanceMin'], $data['balanceMax']])->all());
        }

        return array_merge($data_x['users'], $data_y['users']);
    }

    protected function filterStatusCode($data, $data_x): array
    {
        $statusCode = '';
        if ($data['statusCode'] == StatusProviderEnum::AUTHORIZED) {
            $statusCode = StatusProviderEnum::AUTHORIZED_CODE;
        }
        if ($data['statusCode'] == StatusProviderEnum::DECLINE) {
            $statusCode = StatusProviderEnum::DECLINE_CODE;
        }
        if ($data['statusCode'] == StatusProviderEnum::REFUNDED) {
            $statusCode = StatusProviderEnum::REFUNDED_CODE;
        }
        return array_values(collect($data_x['users'])->where('statusCode', $statusCode)->all());
    }

}
