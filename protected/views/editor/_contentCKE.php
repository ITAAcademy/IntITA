<?php
/**
 * Created by PhpStorm.
 * User: Ivanna
 * Date: 12.04.2015
 * Time: 2:05
 */
?>
<br>
<?php
    for ($i = count($data); $i > 0; $i--){

        switch ($data['id_type']){
            case 1:
                $this->renderPartial('/editor/_textBlockCKE', array('data'=>$data, 'editMode' => $editMode));
                break;
            case 3:
                $this->renderPartial('/editor/_exampleBlockCKE', array('data'=>$data, 'editMode' => $editMode));
                break;
            case 4:
                $this->renderPartial('/editor/_codeBlockCKE', array('data'=>$data, 'editMode' => $editMode));
                break;
            case 7:
                $this->renderPartial('/editor/_instructionBlockCKE', array('data'=>$data, 'editMode' => $editMode));
                break;
            case 13:
                break;
            default:
                break;
        }
    }
?>
