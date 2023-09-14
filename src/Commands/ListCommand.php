<?php

declare(strict_types=1);

namespace Kazemmdev\Snapshot\Commands;

use Exception;
use Illuminate\Console\Command;
use Kazemmdev\Snapshot\Model\SnapshotInterface;

class ListCommand extends Command
{
    protected $signature = 'snapshot:list';
    protected $description = 'Send a request to the server to generate a snapshot';
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
                $snapshotCountMsg = $snapshotsCount == 1 ?
                    'One snapshot' :
                    'All ' . $snapshotsCount . ' snapshots';

                $this->info($snapshotCountMsg . ' found in the cloud:');
                $this->info("#id           #name           #description");
                $this->info("===========================================================");

                foreach ($snapshots as $snapshot) {
                    $this->info(
                        string: $snapshot['id'] . '           ' . $snapshot['name'] . '           ' . $snapshot['description']
                    );
                }
            }
        } catch (Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}