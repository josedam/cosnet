<?php
               array(
                'label'=>'Documentos<b class="caret"></b>', 
                'url'=>'#', 
                'visible'=>!Yii::app()->user->isGuest,
                'itemOptions'=>array('class'=>'dropdown'),
                'linkOptions'=>array(
                                 'class'=>'main-btn dropdown-toggle',
                                 'data-toggle'=>'dropdown',
                               ),
                               
                'submenuOptions'=>array(
                                   'class'=>'dropdown-menu',
                          //         'style'=>'background-color: black;border:1px solid white;',
                                  ),
                'items'=>array(
                  array(
                    'label'=>'Seguro Profesional',
                    'url'=>array('/seguro'),
                    'visible'=>!Yii::app()->user->isGuest,
                  ),

                 array(
                    'label'=>'Tratamiento de Residuos',
                    'url'=>array('/comprobantetr'),
                    'visible'=>!Yii::app()->user->isGuest,
                  ),  
                ),
             ),