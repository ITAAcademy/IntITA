<?php

class m180216_135053_create_crm_group_roles_tasks extends CDbMigration
{
    public function safeUp() {
        $this->createTable('crm_subgroup_roles_tasks', [
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'role' => 'tinyint(3) not null',
            'id_task' => 'INT NOT NULL',
            'id_subgroup' => 'INT(11) NOT NULL',
            'assigned_by' => 'INT(10) NOT NULL',
            'assigned_date' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'cancelled_by' => 'INT(10) DEFAULT NULL',
            'cancelled_date' => 'DATETIME DEFAULT NULL',
        ]);

        $this->addForeignKey('FK_crm_group_roles_tasks_role','crm_subgroup_roles_tasks','role','crm_roles','id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('FK_crm_group_roles_tasks_task','crm_subgroup_roles_tasks','id_task','crm_tasks','id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('FK_crm_group_roles_tasks_offline_subgroup','crm_subgroup_roles_tasks','id_subgroup','offline_subgroups','id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('FK_crm_group_roles_tasks_assigned_by','crm_subgroup_roles_tasks','assigned_by','user','id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('FK_crm_group_roles_tasks_cancelled_by','crm_subgroup_roles_tasks','cancelled_by','user','id', 'RESTRICT', 'RESTRICT');
    }

    public function safeDown() {
        $this->dropForeignKey('FK_crm_group_roles_tasks_cancelled_by','crm_subgroup_roles_tasks');
        $this->dropForeignKey('FK_crm_group_roles_tasks_assigned_by','crm_subgroup_roles_tasks');
        $this->dropForeignKey('FK_crm_group_roles_tasks_offline_subgroup','crm_subgroup_roles_tasks');
        $this->dropForeignKey('FK_crm_group_roles_tasks_task','crm_subgroup_roles_tasks');
        $this->dropForeignKey('FK_crm_group_roles_tasks_role','crm_subgroup_roles_tasks');

        $this->dropTable('crm_subgroup_roles_tasks');
    }
}