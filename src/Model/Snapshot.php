<?php

namespace Kazemmdev\Snapshot\Model;

use Illuminate\Support\Facades\Http;

class Snapshot extends SnapshotContract implements SnapshotInterface
{
    public function getAll(): array
    {
        $response =  Http::withHeaders($this->getHeader())
            ->get($this->apiAddress . '/snapshots');

        return  $response->json('data');
    }

    public function create($name, $description): bool
    {
        $response = Http::withHeaders($this->getHeader())
            ->post($this->apiAddress . '/snapshots', [
                'name' => $name,
                'description' => $description
            ]);

        return $response->ok();
    }

    public function delete($snapshotId): bool
    {
        $response = Http::withHeaders($this->getHeader())
            ->delete($this->apiAddress .  '/snapshot/' . $snapshotId);

        return $response->ok();
    }
}