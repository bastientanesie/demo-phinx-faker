<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    public function up()
    {
        // Phinx crée un champ "id" en tant que
        // clé primaire (auto-incrément) par défaut
        $userTable = $this->table('User', [
//            'engine' => 'MyISAM',

            // On pourrait désactiver le champ "id"
            // et configurer une nouvelle clé primaire
            'id' => false,
            'primary_key' => 'idUser',

            // Mais c'est plus facile de simplement renommer le champ
            // En plus, on garde la conf de la clé primaire + auto-incrément
//            'id' => 'idUser',

        ]);

        $userTable
            ->addColumn('idUser', 'integer', [
                'identity' => true, // auto-incrément
                'signed' => false,
                'null' => false,
                'limit' => \Phinx\Db\Adapter\MysqlAdapter::INT_REGULAR,
            ])
            ->addColumn('username', 'string', [
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'limit' => 40,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('firstName', 'string', [
                'limit' => 30,
                'null' => true,
            ])
            ->addColumn('lastLame', 'string', [
                'limit' => 30,
                'null' => true,
            ])
            ->addColumn('createdAt', 'datetime', [
                'null' => false,
            ])
            ->addColumn('updatedAt', 'datetime', [
                'null' => true
            ])
            ->addIndex([
                'username',
                'email'
            ], ['unique' => true])
//            ->addIndex(['email'], [
//                'unique' => true,
//                'name' => 'idx_users_email'
//            ])
            ->save();
    }

    public function down()
    {
        $this->dropTable('User');
    }
}
