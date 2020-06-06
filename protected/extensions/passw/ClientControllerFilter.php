 /**
  * @return array action filters
  */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'changePassword - logout, login, autoLogin, password, securityCode, passwordVerify, verify, autoGeneratePassword',
            'https',
        );
    }
