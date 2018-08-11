<?php

class m180811_105849_add_translations_985 extends CDbMigration
{
	private function addTranslate($id, $category, $message, $translates) {
        $this->insert('sourcemessages', [
            'id' => $id,
            'category' => $category,
            'message' => $message
        ]);

        foreach ($translates as $lang => $translation) {
            $this->insert('translate',
                [
                    'id' => $id,
                    'language' => $lang,
                    'translation' => $translation
                ]);
        }
    }

    public function safeUp()
    {
        $this->addTranslate(985, 'module', '0985',
            [
                'ua' => 'Ціна за весь модуль наперед (розгорнути схеми онлайн)',
                'ru' => 'Show the payment plan (online payment scheme)',
                'en' => 'Цена за весь курс наперед (схемы проплат онлайн)'
            ]);
        $this->addTranslate(986, 'module', '0986',
            [
                'ua' => 'Ціна за весь модуль наперед (розгорнути схеми оффлайн)',
                'ru' => 'Show the payment plan (offline payment scheme)',
                'en' => 'Цена за весь курс наперед (схемы проплат оффлайн)'
            ]);

    }

    public function safeDown()
    {
        $this->delete('translate', 'id=0985');
        $this->delete('sourcemessages', 'id=0985');
        $this->delete('translate', 'id=0986');
        $this->delete('sourcemessages', 'id=0986');
    }
}