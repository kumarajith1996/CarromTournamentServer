<?php
use Migrations\AbstractMigration;

class AddedBiddingsTable extends AbstractMigration
{

    public function up()
    {

        $this->table('bidding')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('bids', 'json', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('type', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {

        $this->table('bidding')->drop()->save();
    }
}

