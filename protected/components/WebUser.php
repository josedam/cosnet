<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
 
  // Return first name.
  // access it by Yii::app()->user->first_name
  function getNombre(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user?$user->nombre:'';
  }
 
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
  function getEsAdmin(){
    $user =  $this->loadUser(Yii::app()->user->id);
    return $user?$user->rol>=User::ROL_ADMINISTRADOR:0;
  }
 
  function getEsRoot(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user?$user->rol==User::ROL_SUPERUSUARIO:0;
//    return (!$this->isGuest) && trim(strtolower(Yii::app()->user->name)) == "admin";
  }

  function getEsOperador(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user?$user->rol>=User::ROL_OPERADOR:0;
  }

  function getEsUsuario(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user?$user->rol>=User::ROL_USUARIO:0;
  }

  function getModel(){
    return $this->loadUser(Yii::app()->user->id);
  }
 
 
  // Load user model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=User::model()->findByPk($id);
        }
        return $this->_model;
    }
}
?>
