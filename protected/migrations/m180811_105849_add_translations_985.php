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
        $this->addTranslate(987, 'module', '0987',
            [
                'ua' => 'Натисніть для редагування короткого опису',
                'ru' => 'Нажмите для редактирования краткого описания',
                'en' => 'Click to edit a short description'
            ]);
        $this->addTranslate(988, 'module', '0988',
            [
                'ua' => 'Натисніть для редагування біографії',
                'ru' => 'Нажмите для редактирования биографии',
                'en' => 'Click to edit the biography'
            ]);

    }

    public function safeDown()
    {
        $this->delete('translate', 'id=0985');
        $this->delete('sourcemessages', 'id=0985');
        $this->delete('translate', 'id=0986');
        $this->delete('sourcemessages', 'id=0986');
        $this->delete('translate', 'id=0987');
        $this->delete('sourcemessages', 'id=0987');
        $this->delete('translate', 'id=0988');
        $this->delete('sourcemessages', 'id=0988');
    }
}