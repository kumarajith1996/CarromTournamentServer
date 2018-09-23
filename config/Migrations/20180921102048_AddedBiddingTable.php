<?php
use Migrations\AbstractMigration;

class AddedBiddingTable extends AbstractMigration
{

    public function up()
    {

        $this->table('bidding', ['id' => false, 'primary_key' => ['']])
            ->addColumn('id', 'integer', [
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
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

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
            ->update();
    }

    public function down()
    {
        $this->table('bidding')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('bidding')->drop()->save();
    }
}

