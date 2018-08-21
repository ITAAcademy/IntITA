<?php

class PositionHelper {
    
    public $temporaryPosition = 9999;

	public function changePosition($model, $position, $modelName)
    {
        $modelByPosition = $modelName::model()->find('position=:position', array(':position'=>$position));
        if (!empty($modelByPosition->id) && $model->id !== $modelByPosition->id) {
            if ($model->position === null) {
                $lastModel = $modelName::model()->find(['order'=>'id DESC']);
                $this->temporaryPosition = $lastModel->id + 1;
                $this->storePosition($modelByPosition);
            } else {
                if ($this->storePosition($modelByPosition)) {
                    $this->temporaryPosition = $model->position;
                }
            }
            return $modelByPosition;
        }
        return 'noChanging';
    }

    public function storePosition($model)
    {
        if ($model === 'noChanging') {
            return true;
        } else {
            $model->position = $this->temporaryPosition;
            return $model->save();
        }
    }
}
