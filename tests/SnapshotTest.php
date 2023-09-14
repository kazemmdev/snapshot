<?php

use Illuminate\Support\Facades\Http;
use Kazemmdev\HttpStatus\Http as Status;

it('can list all snapshots', function () {
    Http::fake([
        config('snapshot.api_address') => Http::response([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'snapshot_name'
                ]
            ]
        ], Status::OK())
    ]);

    $this->artisan('snapshot:list')
        ->expectsOutput('Connecting to cloud...')
        ->expectsOutput('One snapshot found in the cloud:')
        ->assertSuccessful();
});

it('can delete a snapshot', function () {
    Http::fake([
        config('snapshot.api_address') => Http::response([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'snapshot_name'
                ]
            ]
        ], Status::OK())
    ]);

    $this->artisan('snapshot:clean')
        ->expectsOutput('Connecting to cloud...')
        ->expectsQuestion('Are you sure you want to delete one snapshot currently stored in your cloud?', 'n')
        ->assertSuccessful();

    $this->artisan('snapshot:clean')
        ->expectsOutput('Connecting to cloud...')
        ->expectsQuestion('Are you sure you want to delete one snapshot currently stored in your cloud?', 'y')
        ->expectsOutput('-> a Snapshot with id:1 deleted')
        ->expectsOutput('All snapshots have been successfully removed.')
        ->assertSuccessful();
});

it('can create a snapshot', function () {
    Http::fake([
        config('snapshot.api_address') => Http::response([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'snapshot_name'
                ]
            ]
        ], Status::OK())
    ]);

    $this->artisan('snapshot:create')
        ->expectsOutput('Connecting to cloud...')
        ->expectsQuestion('Please provide a name for the snapshot:', '')
        ->expectsQuestion('Please provide a description for the snapshot (optional):', '')
        ->assertSuccessful();
});