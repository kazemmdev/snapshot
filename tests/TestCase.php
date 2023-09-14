<?php

namespace Kazemmdev\Tests\Snapshot;

use Illuminate\Support\Facades\Http;
use Kazemmdev\Snapshot\SnapshotServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            SnapshotServiceProvider::class
        ];
    }
}
