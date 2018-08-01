<?php
use Migrations\AbstractMigration;

class DBChanges extends AbstractMigration
{

    public function up()
    {

        $this->table('teams')
            ->removeColumn('players')
            ->update();

        $this->table('users')
            ->removeColumn('past_team_ids')
            ->update();

        $this->table('teams_users')
            ->addColumn('team_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'team_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('teams_users')
            ->addForeignKey(
                'team_id',
                'teams',
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
    }

    public function down()
    {
        $this->table('teams_users')
            ->dropForeignKey(
                'team_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('teams')
            ->addColumn('players', 'json', [
                'after' => 'name',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->table('users')
            ->addColumn('past_team_ids', 'json', [
                'after' => 'team_id',
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();

        $this->table('teams_users')->drop()->save();
    }
}

