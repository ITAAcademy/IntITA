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
        $this->addTranslate(989, 'header', '0989',
            [
                'ua' => 'Школа хакерів',
                'ru' => 'Школа хакеров',
                'en' => 'Hackers` school'
            ]);
        $this->addTranslate(990, 'header', '0990',
            [
                'ua' => 'Бібліотека',
                'ru' => 'Библиотека',
                'en' => 'Library'
            ]);
        $this->addTranslate(991, 'library', '0991',
            [
                'ua' => 'Опис',
                'ru' => 'Описание',
                'en' => 'Description'
            ]);
        $this->addTranslate(992, 'library', '0992',
            [
                'ua' => 'Ціна за паперовий примірник',
                'ru' => 'Цена за бумажный экземпляр',
                'en' => 'Price per paper copy'
            ]);
        $this->addTranslate(993, 'library', '0993',
            [
                'ua' => 'Ціна за електронний примірник',
                'ru' => 'Цена за электронный экземпляр',
                'en' => 'Price per digital copy'
            ]);
        $this->addTranslate(994, 'library', '0994',
            [
                'ua' => 'Категорії',
                'ru' => 'Категории',
                'en' => 'Categories'
            ]);
        $this->addTranslate(995, 'library', '0995',
            [
                'ua' => 'Демо версія',
                'ru' => 'Демо версия',
                'en' => 'Demo version'
            ]);
        $this->addTranslate(996, 'library', '0996',
            [
                'ua' => 'переглянути',
                'ru' => 'просмотреть',
                'en' => 'look through'
            ]);
        $this->addTranslate(997, 'library', '0997',
            [
                'ua' => 'Для купівлі авторизуйся',
                'ru' => 'Для покупки авторизуйся',
                'en' => 'Log in to purchase'
            ]);
        $this->addTranslate(998, 'pagination', '0998',
            [
                'ua' => 'Показати ще',
                'ru' => 'Показать еще',
                'en' => 'Show more'
            ]);
        $this->addTranslate(999, 'graduates', '0999',
            [
                'ua' => 'Компанії, де працюють наші випускники',
                'ru' => 'Компании, где работают наши выпускники',
                'en' => 'Companies where our graduates work'
            ]);
        $this->addTranslate(1000, 'team', '1000',
            [
                'ua' => 'ПРИЄДНАТИСЯ ДО КОМАНДИ',
                'ru' => 'ПРИСОЕДИНИТЬСЯ К КОМАНДЕ',
                'en' => 'JOIN TO TEAM'
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
        $this->delete('translate', 'id=0989');
        $this->delete('sourcemessages', 'id=0989');
        $this->delete('translate', 'id=0990');
        $this->delete('sourcemessages', 'id=0990');
        $this->delete('translate', 'id=0991');
        $this->delete('sourcemessages', 'id=0991');
        $this->delete('translate', 'id=0992');
        $this->delete('sourcemessages', 'id=0992');
        $this->delete('translate', 'id=0993');
        $this->delete('sourcemessages', 'id=0993');
        $this->delete('translate', 'id=0994');
        $this->delete('sourcemessages', 'id=0994');
        $this->delete('translate', 'id=0995');
        $this->delete('sourcemessages', 'id=0995');
        $this->delete('translate', 'id=0996');
        $this->delete('sourcemessages', 'id=0996');
        $this->delete('translate', 'id=0997');
        $this->delete('sourcemessages', 'id=0997');
        $this->delete('translate', 'id=0998');
        $this->delete('sourcemessages', 'id=0998');
        $this->delete('translate', 'id=0999');
        $this->delete('sourcemessages', 'id=0999');
        $this->delete('translate', 'id=1000');
        $this->delete('sourcemessages', 'id=1000');
    }
}