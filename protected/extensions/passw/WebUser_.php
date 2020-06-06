/**
 * Provides additional properties and functionality to CWebUser.
 */
class WebUser extends CWebUser
{
    // User access error codes
    const ERROR_NONE = 1;
    const ERROR_NEW_USER = 2;
    const ERROR_PASSWORD_EXPIRED = 3;
 
    private $accessError = self::ERROR_NONE;
    /**
     * Holds a reference to the currently logged in user model.
     * @var User The currently logged in User Model.
     */
    private $_model;
    public $changePasswordUrl = array('/user/password');
 
    public function init()
    {
        parent::init();
    }
 
    /**
     * Returns the User model of the currently logged in user and null if
     * is user is not logged in.
     * 
     * @return User The model of the logged in user.
     */
    public function getModel()
    {
        return $this->loadUser(Yii::app()->user->id);
    }
 
    /**
     * Returns a boolean indicating if the currently logged in user is an Admin user.
     * @return boolean whether the current application user is an admin.
     */
    public function getIsAdmin()
    {
        $isAdmin = false;
 
        if (strtolower($this->loadUser(Yii::app()->user->id)->role->name) == 'admin' ||
            strtolower($this->loadUser(Yii::app()->user->id)->role->name) == 'super admin')
        {
            $isAdmin = true;
        }
 
        return $isAdmin;
    }
 
    /**
     * Retrieves a User model from the database
     * @param integer $id the id of the User to be retrieved
     * @return User the user model
     */
    protected function loadUser($id=null)
    {
        if ($this->_model === null)
        {
            if ($id !== null)
                $this->_model = User::model()->findByPk($id);
        }
 
        return $this->_model;
    }
 
    public function redirectToPasswordForm()
    {
        if (!Yii::app()->request->getIsAjaxRequest())
            $this->setReturnUrl(Yii::app()->request->getUrl());
 
        if (($url = $this->changePasswordUrl) !== null)
        {
            if (is_array($url))
            {
                $route = isset($url[0]) ? $url[0] : $app->defaultController;
                $url = Yii::app()->createUrl($route, array_splice($url, 1));
            }
            Yii::app()->request->redirect($url);
        }
        else
            throw new CHttpException(403, Yii::t('yii', 'Change Password Required'));
    }
}
?>
