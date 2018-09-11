<?php


class AuthorRequest extends Request implements IRequest
{

    protected $template = 'author'. DIRECTORY_SEPARATOR . '_newAuthorModuleRequest';
    protected $approveTemplate = 'author'. DIRECTORY_SEPARATOR . '_approveAuthorModuleRequest';
    protected $cancelTemplate = 'author'. DIRECTORY_SEPARATOR . '_cancelAuthorModuleRequest';
    protected $message;
    protected $requestType = 1;

  public static function model($className=__CLASS__)
   {
    return parent::model($className);
   }

  public function getTableSchema()
   {
    $table = parent::getTableSchema();

    $table->columns['request_model_id']->isForeignKey = true;
    $table->foreignKeys['request_model_id'] = array('Module', 'module_ID');
    $table->columns['request_user']->isForeignKey = true;
    $table->foreignKeys['request_user'] = array('StudentReg', 'id');
    $table->columns['action_user']->isForeignKey = true;
    $table->foreignKeys['action_user'] = array('StudentReg', 'id');
    return $table;
   }

  public function relations()
   {

    return array_merge(parent::relations(),array(
        'idModule' => array(self::BELONGS_TO, 'Module', 'request_model_id'),
        'teacher' => array(self::BELONGS_TO, 'StudentReg', 'request_user'),
    ));
   }

    public function approve()
    {
        $user = RegisteredUser::userById($this->request_user);
        //add rights to edit module
        $role = new Author();
        if ($role->checkModule($user->registrationData->id, $this->id_module)) {
            if ($user->setRoleAttribute(UserRoles::AUTHOR, 'module', $this->module->id_module)) {
                date_default_timezone_set(Config::getServerTimezone());
                //update current request, set approved status
                $this->action_user = Yii::app()->user->id;
                $this->action_date = date("Y-m-d H:i:s");
                $this->action = self::STATUS_APPROVE;
                if ($this->save()) {
                    $this->notify($this->approveTemplate,$this->module,true);
                    return "Операцію успішно виконано.";
                }
            }
            return "Операцію не вдалося виконати";
        } else return "Обраний викладач вже призначений автором даного модуля.";
    }

  public function cancel()
   {
    date_default_timezone_set(Config::getServerTimezone());
    $this->action = self::STATUS_CANCEL;
    if ($this->save())
     $this->notify($this->cancelTemplate,$this->module);
    else {
     return "Операцію не вдалося виконати.";
    }
   }

  public function title()
    {
        return "Запит на редагування модуля";
    }

    public function module()
    {
        return $this->idModule;
    }

    public function subject()
    {
        return "Запит на редагування модуля";
    }

  public function newRequest($requestedModel)
   {
    $this->request_model_id = $requestedModel;
    $this->action = Request::STATUS_NEW;
    if ($this->save()){
     $this->notify($this->template,[$this->requestUser,$this->idModule],true);
    }
    return false;
   }
 }