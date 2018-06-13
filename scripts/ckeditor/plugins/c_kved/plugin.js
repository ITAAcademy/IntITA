CKEDITOR.plugins.add('c_kved',{
    init: function(editor){
        var cmd = editor.addCommand('c_kved', {
            exec:function(editor){
                editor.insertHtml('<span c-kved><b><i>*квед_компанії*</b></i></span>');
            }
        });
        cmd.modes = { wysiwyg : 1, source: 1 };// плагин будет работать и в режиме wysiwyg и в режиме исходного текста
        editor.ui.addButton('c_kved',{
            label: 'Квед компанії',
            command: 'c_kved',
        });
    },
});