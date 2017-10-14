# oc-sso-plugin

要求 rainlab.user 插件 

git

    git clone https://github.com/jc91715/oc-sso-plugin.git /plugins/jc91715/sso
  
composer


    cd /plugins/jc91715/sso
    
    composer install
    
     
在 config/services.php 添加以下配置

     'cas'    => [
        'host'    => env('CAS_HOST'),
        'port'    => intval(env('CAS_PORT', 443)),
        'context' => env('CAS_CONTEXT', 'cas'),
    ],
    
在根目录

    vi .env

添加以下内容

    

    CAS_HOST=sso.jc91715.top
    CAS_PORT=443
    CAS_CONTEXT=cas
    
如何使用

     在登录页面放置该插件(即登录按钮指向放置该插件的页面，点击登录会指向cas服务端，登录成功后，会返回到放置插件的页面并可以得到登录用户的信息)


    
