<?php

class m180501_122210_add_new_status_to_agreement_statuses extends CDbMigration
{
    public function safeUp()
    {
        $this->alterColumn('acc_user_agreement_status', 'title_ua', 'VARCHAR(64) NOT NULL');
        $this->alterColumn('acc_user_agreement_status', 'title_ru', 'VARCHAR(64) NOT NULL');
        $this->alterColumn('acc_user_agreement_status', 'title_en', 'VARCHAR(64) NOT NULL');

        $this->update('acc_user_agreement_status', array('title_ua'=> 'договір створений', 'title_ru'=> 'договор создан', 'title_en'=> 'created agreement'), 'id=1');
        $this->update('acc_user_agreement_status', array('title_ua'=> 'договір затверджений', 'title_ru'=> 'договор утвержден', 'title_en'=> 'approved agreement'), 'id=2');
        $this->update('acc_user_agreement_status', array('title_ua'=> 'договір скасований', 'title_ru'=> 'договор отменен', 'title_en'=> 'agreement canceled'), 'id=3');

        $this->insertMultiple('acc_user_agreement_status', array(
            array(
                'id' => 4,
                'title_ua' => 'паперовий договір відправлено на перевірку',
                'title_ru' => 'бумажный договор отправлен на проверку',
                'title_en' => 'paper contract sent for verification'
            ),
            array(
                'id' => 5,
                'title_ua' => 'паперовий договір затверджено бухгалтером',
                'title_ru' => 'бумажный договор утвержден бухгалтером',
                'title_en' => 'paper contract approved by the accountant'
            ),
            array(
                'id' => 6,
                'title_ua' => 'паперовий договір затверджено користувачем',
                'title_ru' => 'бумажный договор утвержден пользователем',
                'title_en' => 'paper contract approved by the user'
            ),
            array(
                'id' => 7,
                'title_ua' => 'паперовий договір згенеровано',
                'title_ru' => 'бумажный договор сгенерировано',
                'title_en' => 'paper contract is generated'
            ),
        ));
    }

    public function safeDown()
    {
        $this->delete('acc_user_agreement_status','id=4');
        $this->delete('acc_user_agreement_status','id=5');
        $this->delete('acc_user_agreement_status','id=6');
        $this->delete('acc_user_agreement_status','id=7');
    }
}