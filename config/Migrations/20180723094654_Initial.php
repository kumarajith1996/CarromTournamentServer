<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('boards')
            ->addColumn('queen', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('finisher', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('match_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('turns', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'finisher',
                ]
            )
            ->addIndex(
                [
                    'match_id',
                ]
            )
            ->addIndex(
                [
                    'queen',
                ]
            )
            ->create();

        $this->table('boards_users')
            ->addColumn('board_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('player_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('coins', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('opc', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('minus', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'board_id',
                ]
            )
            ->addIndex(
                [
                    'player_id',
                ]
            )
            ->create();

        $this->table('levels')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->create();

        $this->table('matches')
            ->addColumn('team1_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('team2_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('stage_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('winner', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('team1_points', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('team2_points', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('refree', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('start_time', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'refree',
                ]
            )
            ->addIndex(
                [
                    'stage_id',
                ]
            )
            ->addIndex(
                [
                    'team1_id',
                ]
            )
            ->addIndex(
                [
                    'team2_id',
                ]
            )
            ->addIndex(
                [
                    'winner',
                ]
            )
            ->create();

        $this->table('stages')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->create();

        $this->table('teams')
            ->addColumn('tournament_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('players', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('bid_points', 'integer', [
                'default' => '100',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('played', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('won', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('points', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('loss', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('league', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'tournament_id',
                ]
            )
            ->create();

        $this->table('tournaments')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('start_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('end_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('image_url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('role', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('base_points', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('team_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('past_team_ids', 'json', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('bid_value', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('status', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('level_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('isPlayer', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'level_id',
                ]
            )
            ->addIndex(
                [
                    'team_id',
                ]
            )
            ->addIndex(
                [
                    'role',
                ]
            )
            ->create();

        $this->table('boards')
            ->addForeignKey(
                'finisher',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'match_id',
                'matches',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'queen',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('boards_users')
            ->addForeignKey(
                'board_id',
                'boards',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
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

        $this->table('matches')
            ->addForeignKey(
                'refree',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'stage_id',
                'stages',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'team1_id',
                'teams',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'team2_id',
                'teams',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'winner',
                'teams',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('teams')
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

        $this->table('users')
            ->addForeignKey(
                'level_id',
                'levels',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'team_id',
                'teams',
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
        $this->table('boards')
            ->dropForeignKey(
                'finisher'
            )
            ->dropForeignKey(
                'match_id'
            )
            ->dropForeignKey(
                'queen'
            )->save();

        $this->table('boards_users')
            ->dropForeignKey(
                'board_id'
            )
            ->dropForeignKey(
                'player_id'
            )->save();

        $this->table('matches')
            ->dropForeignKey(
                'refree'
            )
            ->dropForeignKey(
                'stage_id'
            )
            ->dropForeignKey(
                'team1_id'
            )
            ->dropForeignKey(
                'team2_id'
            )
            ->dropForeignKey(
                'winner'
            )->save();

        $this->table('teams')
            ->dropForeignKey(
                'tournament_id'
            )->save();

        $this->table('users')
            ->dropForeignKey(
                'level_id'
            )
            ->dropForeignKey(
                'team_id'
            )->save();

        $this->table('boards')->drop()->save();
        $this->table('boards_users')->drop()->save();
        $this->table('levels')->drop()->save();
        $this->table('matches')->drop()->save();
        $this->table('stages')->drop()->save();
        $this->table('teams')->drop()->save();
        $this->table('tournaments')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
