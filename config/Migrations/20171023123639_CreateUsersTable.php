<?php
use Migrations\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;
class CreateUsersTable extends AbstractMigration
{
  /**
 * Migrate Up.
 */
public function up()
{
    $this->table('users', ['id' => false, 'primary_key' => 'id'])
        ->addColumn('id', 'integer', ['identity' => true, 'signed' => false])
        ->addColumn('active', 'boolean')
        ->addColumn('first_name', 'string', ['length' => 255])
        ->addColumn('middle_name', 'string', ['length' => 255, 'null' => true])
        ->addColumn('last_name', 'string', ['length' => 255])
        ->addColumn('email', 'string', ['length' => 255])
        ->addColumn('password', 'string', ['length' => 255])
        ->addColumn('created', 'date')
        ->addColumn('created_by', 'integer', ['signed' => false, 'null' => true])
        ->addColumn('modified', 'date')
        ->addColumn('modified_by', 'integer', ['signed' => false, 'null' => true])
        ->addIndex('first_name')
        ->addIndex('middle_name')
        ->addIndex('last_name')
        ->addIndex('email', ['unique' => true])
        ->addIndex('created_by')
        ->addIndex('modified_by')
        ->save();

    $this->execute('INSERT INTO users (id, active, first_name, last_name, email, password, created, modified)
                    VALUES (1, 1, "John", "Jones", "jjones@example.com", "123", NOW(), NOW())');
}

/**
 * Migrate Down.
 */
public function down()
{
    $this->dropTable('users');
}
}
