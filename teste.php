<?php

require(XAJAX . '/xajax_core/xajax.inc.php');

$xajax = new xajax();

$xajax->register(XAJAX_FUNCTION, 'doAdd');
$xajax->register(XAJAX_FUNCTION, 'doReset');

$xajax->processRequest();

function doAdd($a=1, $b=2)
{
    $response = new xajaxResponse();
   
    $response->call('alert','ola');
    return $response;
}

function doReset()
{
    $response = new xajaxResponse();
    $response->clear('answer', 'innerHTML');
    $response->assign('reset', 'style.display', 'none');
    return $response;
}
        
        
?>



