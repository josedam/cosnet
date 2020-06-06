<?php
class EChangePasswordFilter extends CFilter
{
  protected function preFilter($filterChain)
  {
    $sale = true;
    if(Yii::app()->user->getState('chgpassw')==1)
    {
 
         Yii::app()->user->setFlash('notice',
           'Su clave de acceso debe ser actualizada inmediatamente para mantener su privacidad y la seguridad de sus datos.');
           
         $sale=false;    

         Yii::app()->getRequest()->redirect(Yii::app()->createUrl('user/changepassword',
             array(
                'id'=>Yii::app()->user->id,
                'url'=>Yii::app()->user->returnUrl,
             )
          ));

/*
         CController::redirect(Yii::app()->createUrl('user/changepassword',
             array(
                'id'=>Yii::app()->user->id,
                'url'=>Yii::app()->user->returnUrl,
             )
       ));
*/
     }
     return $sale;
  }
  
//  protected function postFilter($filterChain)
//  {
  
//  }           
}              
