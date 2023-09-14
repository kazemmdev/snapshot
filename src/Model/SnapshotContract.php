<?php

namespace Kazemmdev\Snapshot\Model;

abstract class SnapshotContract implements SnapshotInterface
{
    protected string $accessToken = "";
    protected string $apiAddress = "";

    public function __construct()
    {
        $this->apiAddress = config('snapshot.api_address') ?? "";
        $this->accessToken = config('snapshot.access_token') ?? "";
    }

    abstract public function getAll(): array;

    abstract public function create($name, $description): bool;

    abstract public function delete($snapshotId): bool;

    protected function getHeader(): array
    {
        return [
            'Authorization' => $this->accessToken,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}