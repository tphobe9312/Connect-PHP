<?php
defined('CLIENT_ID')               OR define('CLIENT_ID'    , '5d8a9e86-3702-4f4d-a727-f58d23eb4444', TRUE);
defined('CLIENT_SECRET')           OR define('CLIENT_SECRET', 'testpass'                            , TRUE);
defined('CLIENT_TOKEN')            OR define('CLIENT_TOKEN' , '32zDIHeOPeVunekZ'                    , TRUE);

defined('REDIRECT_URI')            OR define('REDIRECT_URI'          , 'http://10.1.1.13/merchant/connect_success.php'             , TRUE);

//defined('AUTHORIZATION_ENDPOINT')  OR define('AUTHORIZATION_ENDPOINT', 'http://10.1.1.5/sandeep/oauth2/index.php/account/authorize', TRUE);
//defined('TOKEN_ENDPOINT')          OR define('TOKEN_ENDPOINT'        , 'http://10.1.1.5/sandeep/oauth2/index.php/account/token'    , TRUE);
//defined('RESOURCE_URL')            OR define('RESOURCE_URL'          , 'http://10.1.1.5/sandeep/oauth2/index.php/account/resource' , TRUE);

defined('AUTHORIZATION_ENDPOINT')  OR define('AUTHORIZATION_ENDPOINT', 'http://connect.csccloud.in/account/authorize', TRUE);
defined('TOKEN_ENDPOINT')          OR define('TOKEN_ENDPOINT'        , 'http://connect.csccloud.in/account/token'    , TRUE);
defined('RESOURCE_URL')            OR define('RESOURCE_URL'          , 'http://connect.csccloud.in/account/resource' , TRUE);

//End of connect_config ..
