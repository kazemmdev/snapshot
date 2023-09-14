<?php

declare(strict_types=1);

namespace Kazemmdev\Snapshot\Commands;

use Exception;
use Illuminate\Console\Command;
use Kazemmdev\Snapshot\Exceptions\ConfigFileNotFoundException;
use Kazemmdev\Snapshot\Model\SnapshotInterface;
use function PHPUnit\Framework\isEmpty;

class CreateCommand extends Command
{
    protected $signature = 'snapshot:create';
    protected $description = 'Send a request to the server to generate a snapshot';
    private SnapshotInterface $snapshot;

    public function __construct(SnapshotInterface $snapshot)
    {
        parent::__construct();
        $this->snapshot = $snapshot;
    }

    public function handle(): void
    {
        $this->info('Connecting to cloud...');
        $snapshotName = $this->ask('Please provide a name for the snapshot:', date('Y-m-d-H-i-s'));
        $snapshotDescription = $this->ask('Please provide a description for the snapshot (optional):', '');

        try {
            $this->snapshot->create($snapshotName, $snapshotDescription);
            $this->info('A new snapshot named "' . $snapshotName . '" has been successfully created.');

        } catch (Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}