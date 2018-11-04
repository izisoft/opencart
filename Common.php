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


function setServerInfo(){
    foreach (getServerInfo() as $key=>$value) {
        defined($key) or define($key, $value);
    }
}

function getServerInfo(){
    $s = $_SERVER;
    $ssl = (isset($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:
    
    (isset($s['HTTP_X_FORWARDED_PROTO']) && strtolower($s['HTTP_X_FORWARDED_PROTO']) == 'https' ? true : false);
    
    
    
    
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    
    $SERVER_PORT = isset($s['SERVER_PORT']) ? $s['SERVER_PORT'] : 80;
    
    $port = $SERVER_PORT;
    $port = in_array($SERVER_PORT , ['80','443']) ? '' : ':'.$port;
    
    
    $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : $s['SERVER_NAME'];
    $path = ($s['REQUEST_URI'] ? $s['REQUEST_URI'] : $_SERVER['HTTP_X_ORIGINAL_URL']);
    $url = $protocol . '://' . $host . $port . $path;
    $pattern = ['/index\.php\//','/index\.php/'];
    $replacement = ['',''];
    $url = preg_replace($pattern, $replacement, $url);
    $a = parse_url($url);
    $a['host'] = strtolower($a['host']);
    return [
        'FULL_URL'=>$url,
        'URL_NO_PARAM'=> $a['scheme'].'://'.$a['host'].$port.$a['path'],
        'URL_WITH_PATH'=>$a['scheme'].'://'.$a['host'].$port.$a['path'],
        'URL_NOT_SCHEME'=>$a['host'].$port.$a['path'],
        'ABSOLUTE_DOMAIN'=>$a['scheme'].'://'.$a['host'],
        'URL_QUERY'=>isset($a['query']) ? $a['query'] : '',
        'DYNAMIC_SCHEME_DOMAIN'  =>  '//'.$a['host'].$port,
        'SITE_ADDRESS'=>$a['scheme'].'://'.$a['host'].$port,
        'SCHEME'=>$a['scheme'],
        'DOMAIN'=>$a['host'],
        "__DOMAIN__"=>$a['host'],
        'DOMAIN_NOT_WWW'=>preg_replace('/www./i','',$a['host'],1),
        'URL_NON_WWW'=>preg_replace('/www./i','',$a['host'],1),
        'URL_PORT'=>$port,
        'URL_PATH'=>$a['path'],
        '__TIME__'=>time(),
        'DS' => '/',
        'ROOT_USER'=>'root',
        'ADMIN_USER'=>'admin',
        'DEV_USER'=>'dev',
        'DEMO_USER'=>'demo',
        'USER'=>'user'
    ];
}