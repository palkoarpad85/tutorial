<?php
use Migrations\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateRolesTable extends AbstractMigration
{
  /**
   * Migrate Up.
   */
  public function up()
  {
      $this->table('roles', ['id' => false, 'primary_key' => 'id'])
          ->addColumn('id', 'integer', ['identity' => true, 'signed' => false])
          ->addColumn('name', 'string', ['length' => 255])
          ->addColumn('alias', 'string', ['length' => 255])
          ->addColumn('created', 'date')
          ->addColumn('active', 'boolean')
          ->addColumn('created_by', 'integer', ['signed' => false, 'null' => true])
          ->addColumn('modified', 'date')
          ->addColumn('modified_by', 'integer', ['signed' => false, 'null' => true])
          ->addIndex('name')
          ->addIndex('alias')
          ->addIndex('created_by')
          ->addIndex('modified_by')
          ->save();

      $this->execute('INSERT INTO roles (id, name, alias, created, modified)
                      VALUES (1, "Member", "member", NOW(), NOW()),
                             (2, "Admin", "admin", NOW(), NOW())');
  }

  /**
   * Migrate Down.
   */
  public function down()
  {
      $this->dropTable('roles');
  }
}
