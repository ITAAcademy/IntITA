<?php

class m180321_094119_add_new_payment_schema extends CDbMigration
{
    public function safeUp()
    {
        $this->insertMultiple('acc_schemes_name', array(
            array(
                'pay_count' => 9,
                'title_en' => '9 payments',
                'title_ru' => '9 оплат',
                'title_ua' => '9 проплат',
            ),
        ));
    }

    public function safeDown()
    {
        return true;
    }
}