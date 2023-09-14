<?php

declare(strict_types=1);

namespace Kazemmdev\Snapshot;

use Illuminate\Support\ServiceProvider;
use Kazemmdev\Snapshot\Commands\CleanCommand;
use Kazemmdev\Snapshot\Commands\CreateCommand;
use Kazemmdev\Snapshot\Commands\ListCommand;
use Kazemmdev\Snapshot\Model\Snapshot;
use Kazemmdev\Snapshot\Model\SnapshotInterface;

class SnapshotServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPublishes();
    }

    protected function registerPublishes(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/snapshot.php' => config_path('snapshot.php'),
        ], 'snapshot-config');
    }

    public function register(): void
    {
        $this->app->scoped(SnapshotInterface::class, function () {
            $snapshotClass = config('snapshot.snapshot_model', Snapshot::class);
            return new $snapshotClass;
        });

        $this->registerCommands();
    }

    protected function registerCommands(): void
    {
        $this->app->bind('command.snapshot:list', ListCommand::class);
        $this->app->bind('command.snapshot:create', CreateCommand::class);
        $this->app->bind('command.snapshot:clean', CleanCommand::class);

        $this->commands([
            'command.snapshot:list',
            'command.snapshot:create',
            'command.snapshot:clean',
        ]);
    }
}