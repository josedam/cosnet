<?php
    /**
     * Creates a rule to validate user's password freshness.
     * @return array the array of rules to validate against
     */
class SSController extends CController
{
    
    public function changePasswordRules()
    {
        return array(
            'days' => 30,
        );
    }
 
    /**
     * Runs the Password filter
     * @param type $filterChain 
     */
    public function filterChangePassword($filterChain)
    {
        $filter = new ChangePasswordFilter();
        $filter->setRules($this->changePasswordRules());
        $filter->filter($filterChain);
    }
}    
?>    
