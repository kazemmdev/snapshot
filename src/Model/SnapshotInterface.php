<?php

namespace Kazemmdev\Snapshot\Model;

interface SnapshotInterface
{
    public function getAll(): array;

    public function create($name, $description): bool;

    public function delete(string $snapshotId): bool;
}
