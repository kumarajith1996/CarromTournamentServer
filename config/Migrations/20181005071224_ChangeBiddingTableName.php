<?php
use Migrations\AbstractMigration;

class ChangeBiddingTableName extends AbstractMigration
{

    public function up()
    {

        $this->table('biddings')
            ->addColumn('tournament_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bids', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('type', 'integer', [
                'comment' => '1 - Open, 2 - Secret',
                'default' => '1',
                'limit' => 2,
                'null' => false,
            ])
            ->addColumn('isBidClosed', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'tournament_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('biddings')
            ->addForeignKey(
                'tournament_id',
                'tournaments',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('bidding')->drop()->save();
    }

    public function down()
    {
        $this->table('biddings')
            ->dropForeignKey(
                'tournament_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('bidding')
            ->addColumn('tournament_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bids', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('type', 'integer', [
                'comment' => '1 - Open, 2 - Secret',
                'default' => '1',
                'limit' => 2,
                'null' => false,
            ])
            ->addColumn('isBidClosed', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'tournament_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('bidding')
            ->addForeignKey(
                'tournament_id',
                'tournaments',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('biddings')->drop()->save();
    }
}

