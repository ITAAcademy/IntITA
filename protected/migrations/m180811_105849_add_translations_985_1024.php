<?php

class m180811_105849_add_translations_985_1024 extends CDbMigration
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
        $this->addTranslate(1001, 'profile', '1001',
            [
                'ua' => 'Додати проект',
                'ru' => 'Добавить проект',
                'en' => 'Add project'
            ]);
        $this->addTranslate(1002, 'profile', '1002',
            [
                'ua' => 'Якщо твій проект знаходиться на gitlab, виконай',
                'ru' => 'Если твой проект находится на gitlab, делай следующее',
                'en' => 'If your project is on gitlab, next steps are'
            ]);
        $this->addTranslate(1003, 'profile', '1003',
            [
                'ua' => 'Дочекайся затвердження проекта тренером',
                'ru' => 'Дождись утверждения проекта тренером',
                'en' => 'Wait for approving the project by trainer'
            ]);
        $this->addTranslate(1004, 'profile', '1004',
            [
                'ua' => 'Завантажуйте лише веб проекти. У корені проекту має знаходитися файл index.html.',
                'ru' => 'Загружайте только веб проекты. В корне проекта должен находиться файл index.html.',
                'en' => 'Download only web projects. The file index.html should be located at the root of the project.'
            ]);
        $this->addTranslate(1005, 'profile', '1005',
            [
                'ua' => 'Проект повинен вміщувати лише файли з розширенням html, css, js та медіа контент.',
                'ru' => 'Проект должен содержать только файлы с расширением html, css, js и медиа контент.',
                'en' => 'The project should contain files only with extensions html, css, js and media content.'
            ]);
        $this->addTranslate(1006, 'profile', '1006',
            [
                'ua' => 'Кожен новий проект повинен містити назву відмінну від попередніх.',
                'ru' => 'Каждый новый проект должен содержать название отличающееся от предыдущих.',
                'en' => 'Each new project should contain a name different from the previous ones.'
            ]);
        $this->addTranslate(1007, 'profile', '1007',
            [
                'ua' => 'Проект',
                'ru' => 'Проект',
                'en' => 'Project'
            ]);
        $this->addTranslate(1008, 'profile', '1008',
            [
                'ua' => 'Змінити',
                'ru' => 'Изменить',
                'en' => 'Change'
            ]);
        $this->addTranslate(1009, 'profile', '1009',
            [
                'ua' => 'Запит на перевірку',
                'ru' => 'Запрос на проверку',
                'en' => 'Verification request'
            ]);
        $this->addTranslate(1010, 'profile', '1010',
            [
                'ua' => 'Резюме',
                'ru' => 'Резюме',
                'en' => 'Resume'
            ]);
        $this->addTranslate(1011, 'profile', '1011',
            [
                'ua' => 'Ваш профіль оновлено!',
                'ru' => 'Ваш профиль обновлен!',
                'en' => 'Your profile has been updated!'
            ]);
        $this->addTranslate(1012, 'profile', '1012',
            [
                'ua' => 'Документи',
                'ru' => 'Документы',
                'en' => 'Documents'
            ]);
        $this->addTranslate(1013, 'profile', '1013',
            [
                'ua' => 'Виберіть тип',
                'ru' => 'Выберите тип',
                'en' => 'Choose a type'
            ]);
        $this->addTranslate(1014, 'profile', '1014',
            [
                'ua' => 'затверджено - за документом закріплений договір',
                'ru' => 'утвержден - за документом закреплен договор',
                'en' => 'approved - the document is fixed by the contract'
            ]);
        $this->addTranslate(1015, 'profile', '1015',
            [
                'ua' => 'деактивований',
                'ru' => 'деактивирован',
                'en' => 'deactivated'
            ]);
        $this->addTranslate(1016, 'profile', '1016',
            [
                'ua' => 'Прописка',
                'ru' => 'Прописка',
                'en' => 'Registration'
            ]);
        $this->addTranslate(1017, 'profile', '1017',
            [
                'ua' => 'По батькові',
                'ru' => 'Отчество',
                'en' => 'Middle name'
            ]);
        $this->addTranslate(1018, 'profile', '1018',
            [
                'ua' => 'Переглянути',
                'ru' => 'Отчество',
                'en' => 'Middle name'
            ]);
        $this->addTranslate(1019, 'profile', '1019',
            [
                'ua' => 'Введіть 10-значний ідентифікаційний номер',
                'ru' => 'Введите 10-значный идентификационный номер',
                'en' => 'Input a 10-digit ID number'
            ]);
        $this->addTranslate(1020, 'profile', '1020',
            [
                'ua' => 'Видалити',
                'ru' => 'Удалить',
                'en' => 'Remove'
            ]);
        $this->addTranslate(1021, 'profile', '1021',
            [
                'ua' => 'Деактивувати',
                'ru' => 'Деактивировать',
                'en' => 'Deactivate'
            ]);
        $this->addTranslate(1022, 'library', '1022',
            [
                'ua' => 'Сплатити',
                'ru' => 'Оплатить',
                'en' => 'Pay'
            ]);
        $this->addTranslate(1023, 'graduates', '1023',
            [
                'ua' => 'Диплом',
                'ru' => 'Диплом',
                'en' => 'Diploma'
            ]);
        $this->addTranslate(1024, 'graduates', '1024',
            [
                'ua' => 'Модуль закінчив',
                'ru' => 'Модуль закончил',
                'en' => 'The module has finished'
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
        $this->delete('translate', 'id=1001');
        $this->delete('sourcemessages', 'id=1001');
        $this->delete('translate', 'id=1002');
        $this->delete('sourcemessages', 'id=1002');
        $this->delete('translate', 'id=1003');
        $this->delete('sourcemessages', 'id=1003');
        $this->delete('translate', 'id=1004');
        $this->delete('sourcemessages', 'id=1004');
        $this->delete('translate', 'id=1005');
        $this->delete('sourcemessages', 'id=1005');
        $this->delete('translate', 'id=1006');
        $this->delete('sourcemessages', 'id=1006');
        $this->delete('translate', 'id=1007');
        $this->delete('sourcemessages', 'id=1007');
        $this->delete('translate', 'id=1008');
        $this->delete('sourcemessages', 'id=1008');
        $this->delete('translate', 'id=1009');
        $this->delete('sourcemessages', 'id=1009');
        $this->delete('translate', 'id=1010');
        $this->delete('sourcemessages', 'id=1010');
        $this->delete('translate', 'id=1011');
        $this->delete('sourcemessages', 'id=1011');
        $this->delete('translate', 'id=1012');
        $this->delete('sourcemessages', 'id=1012');
        $this->delete('translate', 'id=1013');
        $this->delete('sourcemessages', 'id=1013');
        $this->delete('translate', 'id=1014');
        $this->delete('sourcemessages', 'id=1014');
        $this->delete('translate', 'id=1015');
        $this->delete('sourcemessages', 'id=1015');
        $this->delete('translate', 'id=1016');
        $this->delete('sourcemessages', 'id=1016');
        $this->delete('translate', 'id=1017');
        $this->delete('sourcemessages', 'id=1017');
        $this->delete('translate', 'id=1018');
        $this->delete('sourcemessages', 'id=1018');
        $this->delete('translate', 'id=1019');
        $this->delete('sourcemessages', 'id=1019');
        $this->delete('translate', 'id=1020');
        $this->delete('sourcemessages', 'id=1020');
        $this->delete('translate', 'id=1021');
        $this->delete('sourcemessages', 'id=1021');
        $this->delete('translate', 'id=1022');
        $this->delete('sourcemessages', 'id=1022');
        $this->delete('translate', 'id=1023');
        $this->delete('sourcemessages', 'id=1023');
        $this->delete('translate', 'id=1024');
        $this->delete('sourcemessages', 'id=1024');
    }
}