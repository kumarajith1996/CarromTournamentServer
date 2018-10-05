<?php
use Migrations\AbstractMigration;

class AlterBiddingTable extends AbstractMigration
{

    public function up()
    {

        $this->table('bidding')
            ->changeColumn('bids', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('type', 'integer', [
                'comment' => '1 - Open, 2 - Secret',
                'default' => '1',
                'limit' => 2,
                'null' => false,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->update();

        $this->table('bidding')
            ->addColumn('tournament_id', 'integer', [
                'after' => 'id',
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'tournament_id',
                ],
                [
                    'name' => 'tournament_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'user_id',
                ]
            )
            ->update();

        $this->table('bidding')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'tournament_id',
                'tournaments',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('bidding')
            ->dropForeignKey(
                'user_id'
            )
            ->dropForeignKey(
                'tournament_id'
            )->save();

        $this->table('bidding')
            ->removeIndexByName('tournament_id')
            ->removeIndexByName('user_id')
            ->update();

        $this->table('bidding')
            ->changeColumn('bids', 'json', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('type', 'boolean', [
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->changeColumn('modified', 'timestamp', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->removeColumn('tournament_id')
            ->update();
    }
}

