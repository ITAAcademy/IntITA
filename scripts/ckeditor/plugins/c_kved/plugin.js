CKEDITOR.plugins.add('c_kved',{
    init: function(editor){
        var cmd = editor.addCommand('c_kved', {
            exec:function(editor){
                editor.insertHtml('<span c-kved><b><i>*призначення_платежу*</b></i></span>');
            }
        });
        cmd.modes = { wysiwyg : 1, source: 1 };// плагин будет работать и в режиме wysiwyg и в режиме исходного текста
        editor.ui.addButton('c_kved',{
            label: 'Призначення платежу',
            command: 'c_kved',
        });
    },
});