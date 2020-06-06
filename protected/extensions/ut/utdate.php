<?php
/*
   utDate
*/   


function rawDate($fecha)
{
  return date('Y-m-d', CDateTimeParser::parse($fecha, Yii::app()->locale->dateFormat));
}

function localDate($fecha)
{
  return Yii::app()->dateFormatter->formatDateTime(
            CDateTimeParser::parse($fecha, 'yyyy-MM-dd'),'medium',null);                               
}                                
                                
?>                            
