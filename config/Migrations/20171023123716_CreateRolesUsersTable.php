<?php
use Migrations\AbstractMigration;

class CreateRolesUsersTable extends AbstractMigration
{
  public function up()
{
    $this->table('roles_users', ['id' => false, 'primary_key' => ['role_id', 'user_id']])
        ->addColumn('role_id', 'integer', ['signed' => false, 'null' => false])
        ->addColumn('user_id', 'integer', ['signed' => false, 'null' => false])
        ->addIndex('role_id')
        ->addIndex('user_id')
        ->save();
}

/**
 * Migrate Down.
 */
public function down()
{
    $this->dropTable('roles_users');
}
}
