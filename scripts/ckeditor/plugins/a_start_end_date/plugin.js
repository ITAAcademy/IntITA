CKEDITOR.plugins.add('a_start_end_date',{
    init: function(editor){
        var cmd = editor.addCommand('a_start_end_date', {
            exec:function(editor){
                editor.insertHtml('<span a-start-end-date><b><i>*термін_надання_послуги*</b></i></span>');
            }
        });
        cmd.modes = { wysiwyg : 1, source: 1 };// плагин будет работать и в режиме wysiwyg и в режиме исходного текста
        editor.ui.addButton('a_start_end_date',{
            label: 'Термін надання послуги',
            command: 'a_start_end_date',
        });
    },
});