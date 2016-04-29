<?php
/**
 * Created by PhpStorm.
 * User: Ivanna
 * Date: 19.05.2015
 * Time: 16:58
 */
?>
<div id="blockForm">
    <form name='addCKEBlock' id="addBlockForm" action="<?php echo Yii::app()->createUrl('revision/addLectureElement'); ?>" method="post">
        <input name="idType" value="" id="blockType" type="hidden">
        <input name="idPage" value="<?php echo $idPage; ?>" id="page" type="hidden">        
        <input name="idRevision" value="<?php echo $idRevision; ?>" id="page" type="hidden">

        <textarea id="CKE" ng-cloak ckeditor="editorOptions" name="html_block" ng-model="CkeAdd" required></textarea>
        <input class="btn btn-default" type="submit" value="<?php echo Yii::t('lecture', '0712'); ?>" id="addBlockSubmit" ng-disabled=addCKEBlock.html_block.$error.required >
        <input class="btn btn-default" type="button" id="cancelButton" onclick="hideFormCKE('addBlock')" value="<?php echo Yii::t('course', '0368') ?>">
    </form>
</div>
<div id="blockFormCode">
    <form onsubmit="return blockValidation(this);" name='addCKEBlockCode' id="addBlockForm" action="<?php echo Yii::app()->createUrl('revision/addLectureElement'); ?>" method="post">
        <input name="idType" value="" id="blockTypeCode" type="hidden">
        <input name="idPage" value="<?php echo $idPage; ?>" id="page" type="hidden">
        <input name="idRevision" value="<?php echo $idRevision; ?>" id="page" type="hidden">

        <textarea id="CKECode" name="html_block" ng-model="CkeAddCode" ></textarea>
        <input class="btn btn-default" type="submit" value="<?php echo Yii::t('lecture', '0712'); ?>" ng-disabled=addCKEBlockCode.html_block.$error.required >
        <input class="btn btn-default" type="button" value="<?php echo Yii::t('course', '0368') ?>" onclick="hideFormCKE('addBlock')" >
        <input class="btn btn-default" type="button" value="Очистити форматування" onclick="removeHtml()">
    </form>
</div>
<script>
    var myCodeMirror = CodeMirror.fromTextArea(document.getElementById('CKECode'), {
        lineNumbers: true,             // показывать номера строк
        matchBrackets: true,             // подсвечивать парные скобки
        mode: "javascript",
        theme: "rubyblue",               // стиль подсветки
        indentUnit: 4                    // размер табуляции
    });
    function blockValidation() {
        if(myCodeMirror.getValue().trim()==''){
            bootbox.alert('Блок не може бути пустий');
            return false;
        }else{
            return true;
        }
    }
    function removeHtml() {
        myCodeMirror.setValue(myCodeMirror.getValue().replace(/<\/?[^>]+>/g,''));
    }
</script>