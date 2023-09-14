<?php

declare(strict_types=1);

namespace Kazemmdev\Snapshot\Commands;

use Exception;
use Illuminate\Console\Command;
use Kazemmdev\Snapshot\Model\SnapshotInterface;

class CleanCommand extends Command
{
    protected $signature = 'snapshot:clean';
    protected $description = 'Send a request to the server to delete all snapshots';
    private SnapshotInterface $snapshot;

    public function __construct(SnapshotInterface $snapshot)
    {
        parent::__construct();
        $this->snapshot = $snapshot;
    }

    public function handle(): void
    {
        try {
            $this->info('Connecting to cloud...');
            $snapshots = $this->snapshot->getAll();
            $snapshotsCount = count($snapshots);

            if ($snapshotsCount == 0) {
                $this->info('No snapshots found in the cloud.');
            } else {
                $snapshotCountMsg = $snapshotsCount == 1 ? 'one snapshot' : 'all ' . $snapshotsCount . ' snapshots';

                $confirmDeletion = $this->confirm(
                    question: 'Are you sure you want to delete ' . $snapshotCountMsg . ' currently stored in your cloud?'
                );

                if ($confirmDeletion) {
                    foreach ($snapshots as $snapshot) {
                        $this->snapshot->delete($snapshot['id']);
                        $this->info('-> a Snapshot with id:' . $snapshot['id'] . ' deleted');
                    }

                    $this->info('----------------------------------');
                    $this->info('All snapshots have been successfully removed.');
                }
            }
        } catch (Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}