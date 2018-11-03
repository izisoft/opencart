<?php 
function view($param = '',$exit = false){
    //$_SESSION['configs']['adLogin']['ID']; exit;
    if(YII_DEV ){
        echo '<pre>'; var_dump($param); echo '</pre>';
        if($exit) exit;
    }
}
function view2($param = '',$exit = false){
    //$_SESSION['configs']['adLogin']['ID']; exit;
    if(YII_DEV ){
        echo '<pre>'; var_dump($param); echo '</pre>';
        if($exit) exit;
    }
}