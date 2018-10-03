<?php
use Migrations\AbstractMigration;

class AddedCloseAndModifyBidFields extends AbstractMigration
{

    public function up()
    {
        $this->table('boards_users')
            ->dropForeignKey([], 'boards_users_ibfk_2')
            ->removeIndexByName('player_id')
            ->update();

        $this->table('boards_users')
            ->removeColumn('player_id')
            ->update();

        $this->table('boards_users')
            ->addColumn('user_id', 'integer', [
                'after' => 'board_id',
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'user_id',
                ],
                [
                    'name' => 'player_id',
                ]
            )
            ->update();

        $this->table('bidding')
            ->addColumn('isBidClosed', 'boolean', [
                'after' => 'type',
                'default' => '0',
                'length' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'timestamp', [
                'after' => 'isBidClosed',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->table('boards_users')
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
        $this->table('boards_users')
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('boards_users')
            ->removeIndexByName('player_id')
            ->update();

        $this->table('boards_users')
            ->addColumn('player_id', 'integer', [
                'after' => 'board_id',
                'default' => null,
                'length' => 11,
                'null' => false,
            ])
            ->removeColumn('user_id')
            ->addIndex(
                [
                    'player_id',
                ],
                [
                    'name' => 'player_id',
                ]
            )
            ->update();

        $this->table('bidding')
            ->removeColumn('isBidClosed')
            ->removeColumn('modified')
            ->update();

        $this->table('boards_users')
            ->addForeignKey(
                'player_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();
    }
}

