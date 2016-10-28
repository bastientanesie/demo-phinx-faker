<?php

use Phinx\Migration\AbstractMigration;

class CreatePostTable extends AbstractMigration
{
    public function change()
    {
        $postTable = $this->table('Post', [
            'id' => false,
            'primary_key' => 'idPost',
        ]);

        $postTable
            ->addColumn('idPost', 'integer', [
                'identity' => true,
                'signed' => false,
                'null' => false,
            ])
            ->addColumn('idUser', 'integer', [
                'signed' => false,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'null' => true,
            ])
            ->addColumn('content', 'text', [
                'null' => true,
            ])
            ->addColumn('createdAt', 'datetime', [
                'null' => false,
            ])
            ->addColumn('updatedAt', 'datetime', [
                'null' => true,
            ])
            ->addForeignKey('idUser', 'User', 'idUser', [
                'constraint' => 'fk_Post_User',
                'delete'=> 'CASCADE',
            ])
            ->create();
    }
}
