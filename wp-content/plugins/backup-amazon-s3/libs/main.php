<?php 

@set_time_limit(0);

if (session_id() == '') {
    session_start();
}

if (!class_exists('main')) {

    add_action('admin_menu', array('main', 'admin_inc_menu')); 
    add_action('admin_post_activate_plugin', array('main', 'activate_plugin') );
    add_action('wp_ajax_amazon-s3-backup-as3b-recover', array('main', 'restore_backup') );
    add_action('wp_ajax_amazon-s3-backup_logs', array('main', 'get_log') );
    add_action('wp_ajax_amazon-s3-backup_local_backup', array('main', 'localBackup') );
    add_action('wp_ajax_amazon-s3-backup_create', array('main', 'backup_s3') );
    add_action('wp_ajax_amazon-s3-backup_set_user_mail', array('main', 'setUserMail') );

    add_action('admin_post_amazon-s3-backup_delete_backup', array('main', 'delete_backup') );

    class main {

        public static $pathPlugin = '';

        public static $pl_name = '';

        public static $log_file = '';

        public static $plugins = array(
        'stats-counter' => '1.1',
        'wpadm_full_backup_storage' => '1.0',  
        'wpadm_full_backup_s3' => '1.0',  
        'ftp-backup' => '1.0',  
        'dropbox-backup' => '1.0',  
        'wpadm_db_backup_storage' => '1.0',  
        'database-backup-amazon-s3' => '1.0',  
        'wpadm_file_backup_s3' => '1.0',  
        'wpadm_file_backup_ftp' => '1.0',  
        'wpadm_file_backup_dropbox' => '1.0',  
        'wpadm_db_backup_ftp' => '1.0',  
        'wpadm_db_backup_dropbox' => '1.0',  
        'wpadm_file_backup_storage' => '1.0',
        'dropbox-backup-pro' => '1.0',
        );

        const MIN_PASSWORD = 6;

        public static function setPluginName($plugin)
        {
            self::$pl_name = $plugin;
        }

        public static function setPluginDir($dir)
        {
            self::$pathPlugin = $dir;
        }

        public static function getPluginDir()
        {
            return self::$pathPlugin;
        }
        public static function setIndex($_dir)
        {
            if (is_dir($_dir)) {
                file_put_contents($_dir . "/index.php", "<?php \n echo 'plugins';");
            }
        }

        public static function mkdir($dir) 
        {
            if (!is_dir($dir)) {
                mkdir($dir, 0755);
                self::setIndex($dir);
            }
        }
        public static function getTmpDir()
        {
            $tmp = self::$pathPlugin . "/temp";
            if ( !is_dir( $tmp ) ) {
                mkdir($tmp, 0755);
                self::setIndex($tmp);
            }
            return $tmp; 
        }

        static function log($msg)
        {
            $log_dir = self::$pathPlugin . "/logs";
            if ( !is_dir( $log_dir ) ) {
                mkdir($log_dir, 0755);
                self::setIndex($log_dir);
            }
            file_put_contents($log_dir . "/log", $msg ."\n", FILE_APPEND);
        }

        static function getLog()
        {
            $log_dir = self::$pathPlugin . "/logs";
            if (file_exists($log_dir . '/log')) {
                return file_get_contents($log_dir . '/log');
            }
            return '';
        }

        public static function getNameBackup($time_create = 0, $time_ret = false, $name_return = false)
        {
            $name = get_option('siteurl');

            $name = str_replace("http://", '', $name);
            $name = str_replace("https://", '', $name);
            $name = preg_replace("|\W|", "_", $name);

            if ($name_return) {
                return $name; 
            }
            if ($time_create > 0) {
                $time = $time_create;
            } else {
                $time = time();
            }
            $name .= '-full-' . date("Y_m_d_H_i", $time);
            if ($time_ret) {
                return date("d.m.Y H:i", $time);
            } else {
                return $name;
            }
        }
        public static function run()
        {
            $request_name =  self::$pl_name . '_request';
			if( isset( $_POST[$request_name] ) && ! empty ( $_POST[$request_name] ) ) {
				
                $data = plugin_unpack($_POST[$request_name]);
				if (isset($data['method'])) {
                    self::init();
                    $model_run = new core($data['method'], $data, true);
					echo '<wpadm>' . $model_run . '</wpadm>';
                    exit;
                }
            }
        }
        public static function checkLog()
        {
            $log_dir = self::$pathPlugin . "/logs";
            if (!is_dir($log_dir)) {
                mkdir($log_dir, 0755);
                self::setIndex($log_dir);
            }
            self::$log_file = $log_dir . "/log";
        }
        public static function get_log()
        {
            @session_write_close();
            $log = self::getLog();
            $log2 = self::getPluginDir() . "/logs/logs2";
            if (file_exists($log2)) {
                $text = @file_get_contents($log2);
                file_put_contents($log2, $log); 
                $log = str_replace($text, "", $log);
            } else {
                file_put_contents($log2, $log);
            }
            $log = explode("\n", $log);
            krsort($log);
            @session_start();
            echo json_encode(array('log' => $log));
            wp_die();
        }
        public static function init()
        {

            self::checkLog();
            include 'sender.php';
            include 'lang.php';
            include 'core.php';
            include 'result.php';
            include 'func.php';
            include 'define.php';
            include 'module_as3b.php';
            self::includesPlugins();
        }
        private static function includesPlugins()
        {
            include 'inc_plugins.php';
            self::$plugins = $inc_plugins;
        }

        public static function include_admins_script()
        {
            if (isset($_GET['page']) && ($_GET['page'] == 'amazon-s3-backup' || $_GET['page'] == 'wpadm_plugins') ) {
                wp_enqueue_style('css-amazon-s3-backup', plugins_url( "/css/style.css", dirname(__FILE__) ) );
                wp_enqueue_script('js-amazon-s3-backup', plugins_url( "/js/main.js",  dirname(__FILE__) ) );

                wp_enqueue_script('js-amazon-s3-backup-js1', plugins_url( "/js/jquery.arcticmodal-0.3.min.js",  dirname(__FILE__) ) );
                wp_enqueue_script('js-amazon-s3-backup-js2', plugins_url( "/js/bootstrap.min.js",  dirname(__FILE__) ) );

                wp_enqueue_style('js-amazon-s3-backup-css1', plugins_url( "/css/jquery.arcticmodal-0.3.css", dirname(__FILE__) ) );

                wp_enqueue_script('postbox');
            }
        }
        public static function activate_plugin()
        {
            if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-confirm'])) {
                $email = trim(stripslashes(strip_tags($_POST['email'])));
                $password = trim(strip_tags($_POST['password']));
                $password_confirm = trim(strip_tags($_POST['password-confirm'])); 
                $sent = true;
                if (empty($email)) { 
                    self::setError("Error, Email is empty.");
                    $sent = false;
                }
                if (!preg_match("/^([a-z0-9_\-]+\.)*[a-z0-9_\-]+@([a-z0-9][a-z0-9\-]*[a-z0-9]\.)+[a-z]{2,4}$/i", $email)) {
                    self::setError("Error, Incorrect Email");
                    $sent = false;
                }
                if (empty($password)) {
                    self::setError("Error, Password is empty.");
                    $sent = false;
                }
                if (strlen($password) < self::MIN_PASSWORD) {
                    self::setError("Error, the minimum number of characters for the password \"" . self::MIN_PASSWORD . "\".");
                    $sent = false;
                }

                if ($password != $password_confirm) {
                    self::setError("Error, passwords do not match");
                    $sent = false;
                }
                if ($sent) {
                    $info = self::$pl_name;
                    $mail = get_option(PREFIX_AS3B . "email");
                    if ($mail) {
                        add_option(PREFIX_AS3B . "email", $email);
                    } else {
                        update_option(PREFIX_AS3B . "email",$email);
                    }
                    $data = self::sendToServer(
                    array(
                    'actApi' => "activate",
                    'email' => $email,
                    'password' => $password,
                    'url' => get_option("siteurl"),
                    'plugin' => $info,
                    )
                    );
                    $res = self::setResponse($data);
				}
            }   
            if (isset($res['url']) && !empty($res['url'])) {
                header("Location: " . $res['url']);
            } else {
                header("Location: " . admin_url("admin.php?page=amazon-s3-backup"));
            }
			exit;
        }

        static function setResponse($data) 
        {
            if ( !class_exists('errorWPADM') ) {
                include self::$pathPlugin . '/libs/error.class.php';
            }
            $msg = __(errorWPADM::getMessage($data['code']),'dropbox-backup');
            if(isset($data['data'])) {
                if (isset($data['data']['replace'])) {
                    foreach($data['data']['replace'] as $key => $value) {
                        $msg = str_replace("<$key>", $value, $msg);
                    }
                }
            }
            if ($data['status'] == 'success') {
                self::setMessage($msg);
            } else {
                self::setError($msg);
            }

            return isset($data['data']) ? $data['data'] : array();

        }

        public static function sendToServer($postdata = array())
        {
            if (count($postdata) > 0) {

                $postdata = http_build_query($postdata, '', '&');

                $length = strlen($postdata); 


                if (function_exists("curl_init") && function_exists("curl_setopt") && function_exists("curl_exec") && function_exists("curl_close")) {

                    $url = ABACKUP_URL_SECURE . "/api/";

                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
                    $result = curl_exec($curl);
                    curl_close($curl);
                    return json_decode($result, true);
                } elseif (function_exists("fsockopen")) {

                    $url = substr(ABACKUP_URL_SECURE, 7) . '/';
                    $req = '/api/';

                    $out = "POST " . $req . " HTTP/1.1\r\n";
                    $out.= "HOST: " . $url . "\r\n";
                    $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
                    $out.= "Content-Length: ".$length."\r\n";
                    $out.= "Connection:Close\r\n\r\n";
                    $out.= $postdata."\r\n\r\n";
                    try {
                        $errno='';
                        $errstr = '';
                        $socket = @fsockopen($url, 80, $errno, $errstr, 30);
                        if($socket) {
                            $result = '';
                            if(!fwrite($socket, $out)) {
                                throw new Exception("unable to write fsockopen");
                            } else {
                                while ($in = @fgets ($socket, 1024)) {
                                    $result .= $in;
                                } 
                            }
                            $result = explode("\r\n\r\n", $result);

                            return json_encode($result, true);
                        } else {
                            throw new Exception("unable to create socket");
                        }
                        fclose($socket);
                    } catch(exception $e) {
                        return false;
                    }
                }  
            }
        }

        public static function setError($msg)
        {
            $_SESSION['as3b-error'] = $msg;
        }

        public static function getError()
        {
            $error = '';
            if (isset($_SESSION['as3b-error'])) {
                $error = $_SESSION['as3b-error'];
                unset($_SESSION['as3b-error']);
            }
            return $error;
        }

        public static function setMessage($msg)
        {
            $_SESSION['as3b-message'] = $msg;
        }

        public static function getMessage()
        {
            $messge = '';
            if (isset($_SESSION['as3b-message'])) {
                $messge = $_SESSION['as3b-message'];
                unset($_SESSION['as3b-message']);
            }
            return $messge;
        }


        public static function admin_inc_menu()
        {
            $menu_position = '1.9998887771'; 
            $amazon_option = get_option(PREFIX_AS3B . 'setting');

            $show = true;

            if ( ( isset($amazon_option['admin_menu']) && $amazon_option['admin_menu'] == 1 ) || !isset($amazon_option['admin_menu']) ) {
                if (!is_admin() || !is_super_admin()) {
                    $show = false;
                }
                if ( !current_user_can('administrator') ) {
                    $show = false;
                }

            }
            if ($show) {
                self::includesPlugins();
                if(checkInstallWpadmPlugins()) {
                    $page = add_menu_page(
                    'WPAdm', 
                    'WPAdm', 
                    "read", 
                    'wpadm_plugins', 
                    'wpadm_plugins',
                    plugins_url('/images/wpadm-logo.png', dirname(__FILE__)),
                    $menu_position     
                    );
                    add_submenu_page(
                    'wpadm_plugins', 
                    "Amazon S3 Backup",
                    "Amazon S3 Backup",
                    'read',
                    'amazon-s3-backup',
                    array('main', 'backups_view')
                    );
                } else {
                    $page = add_menu_page(
                    'Amazon S3 Backup', 
                    'Amazon S3 Backup', 
                    "read", 
                    'amazon-s3-backup', 
                    array('main', 'backups_view'),
                    plugins_url('/images/wpadm-logo.png', dirname(__FILE__)),
                    $menu_position     
                    );

                    add_submenu_page(
                    'amazon-s3-backup', 
                    "WPAdm",
                    "WPAdm",
                    'read',
                    'wpadm_plugins',
                    'wpadm_plugins'
                    );
                }
            }
        }
        public static function remove($dir)
        {
            if (is_dir($dir)) {
                $diropen = opendir($dir);
                while($d = readdir($diropen)) {
                    if ($d!= '.' && $d != '..') {
                        self::remove($dir . "/$d");
                    }
                }
                @rmdir($dir);
            } elseif (is_file($dir)) {
                @unlink($dir);
            }
        }

        public static function localBackup()
        {
            @session_write_close();
            self::remove(self::$log_file);
            $core = new core('backup', array('params' => array( 'optimize' => 1, ), 'sets' => 1));
            @session_start();
            echo json_encode( plugin_unpack((string)$core) );
            wp_die();
        }

        private static function getBackups()
        {
            $res = array();
            if (is_dir(BACKUP_DIR)) {
                $dir_open = opendir(BACKUP_DIR);
                if ($dir_open) {
                    $i = 0;
                    while( $d = readdir($dir_open) ) {
                        if ($d != '.' && $d != '..' && is_dir(BACKUP_DIR . "/$d") ) {
                            $res['data'][$i]['name'] = $d;
                            $res['data'][$i]['dt'] = self::getDateInName($d);

                            $res['data'][$i]['type'] = 'local';
                            $parts = readDirectrory(BACKUP_DIR . "/" .$d, array('.zip', '.md5') );
                            $res['data'][$i]['count'] = count($parts);
                            $res['data'][$i]['size'] = 0;
                            for($j = 0; $j < $res['data'][$i]['count']; $j++) {
                                $res['data'][$i]['size'] += filesize($parts[$j]);
                                $parts[$j] = basename($parts[$j]);
                            }
                            $res['data'][$i]['files'] = implode(',', $parts);
                            $i++;
                        }
                    }
                    if (isset($res['data'])) {
                        $res['md5'] = md5( print_r($res['data'], 1) );
                    }
                }
            }
            return $res;
        }
        public static function getDateInName($name)
        {
            $date_ = explode('full' . '-', $name);
            if (isset($date_[1])) {
                $date = explode('_', $date_[1]);
                $d = "{$date[0]}-{$date[1]}-{$date[2]} {$date[3]}:" . preg_replace("/\([0-9]+\)/", '', $date[4]);
            }
            return $d;

        }

        private static function read_backup_s3($setting)
        {

            require_once self::getPluginDir() . '/libs/classes/aws-autoloader.php';
            $credentials = new Aws\Common\Credentials\Credentials($setting['access_key_id'], $setting['secret_access_key']);
            $client = Aws\S3\S3Client::factory(array( 'credentials' => $credentials ) );
            $data = array('data' => array(), 'md5' => md5( print_r(array(), 1) ) );
            try {
                $project = self::getNameBackup(0, false, true);
                $keys = $client->listObjects(array('Bucket' => $setting['bucket'], 'Prefix' => $project . '-full'))->getIterator();//->getPath('Contents/*/Key');
                if (isset($keys['Contents'])) {
                    $n = count($keys['Contents']);
                    $j = 0;
                    $backups = array();
                    for($i = 0; $i < $n; $i++) {
                        if (isset($keys['Contents'][$i]['Key'])) {
                            $backup = explode('/', $keys['Contents'][$i]['Key']);
                            if (isset($backup[0]) && isset($backup[1]) && !empty($backup[1])) {
                                if (!isset($backups[$backup[0]])) {
                                    $backups[$backup[0]] = $j;
                                    $data['data'][$j]['name'] = $backup[0];
                                    $data['data'][$j]['dt'] = self::getDateInName($backup[0]);
                                    $data['data'][$j]['size'] = $keys['Contents'][$i]['Size'];
                                    $data['data'][$j]['files'] = $backup[1];
                                    $data['data'][$j]['type'] = 's3';
                                    $data['data'][$j]['count'] = 1;
                                    $j++;
                                } else {
                                    $data['data'][$backups[$backup[0]]]['files'] .= ',' . $backup[1];
                                    $data['data'][$backups[$backup[0]]]['size'] += $keys['Contents'][$i]['Size'];
                                    $data['data'][$backups[$backup[0]]]['count'] += 1;
                                }
                            }
                        }

                    }
                }
            } catch (\Aws\S3\Exception\S3Exception $e) {
                return $data;
            }
            return $data;
        }

        public static function backups_view()
        {
            if (isset($_POST['access_key_id']) && isset($_POST['bucket']) && isset($_POST['secret_access_key'])) {
                $setting = get_option(PREFIX_AS3B . 'setting');
                $setting__ = $_POST;
                if ($setting) {
                    update_option(PREFIX_AS3B . 'setting', $setting__);
                } else {
                    add_option(PREFIX_AS3B . 'setting', $setting__);
                }

            }

            $data = self::getBackups();
            $amazon_option = get_option(PREFIX_AS3B . 'setting');
            if ($amazon_option) {
                $data_amazon = self::read_backup_s3($amazon_option);
                if (isset($data_amazon['data']) && isset($data['data'])) {
                    $data['data'] = array_merge($data['data'], $data_amazon['data']);
                } elseif (!isset($data['data']) && isset($data_amazon['data'])) {
                    $data['data'] = $data_amazon['data'];
                }
            }
            if (isset($data['data'])) {
                $data['md5'] = md5( print_r( $data['data'] , 1 ) );
            }
            $error = self::getError();
            $msg = self::getMessage();
            ob_start();
            include self::getPluginDir() . "/template/view-backup.php";
            echo ob_get_clean();
        }
        public static function delete_backup()
        {
            if (isset($_POST['backup-name']) && isset($_POST['backup-type'])) {
                if ($_POST['backup-type'] == 'local') {
                    self::remove(BACKUP_DIR . "/" . $_POST['backup-name']);
                } elseif ($_POST['backup-type'] == 's3') {
                    $amazon_option = get_option(PREFIX_AS3B . 'setting');
                    if ($amazon_option) {
                        require_once self::getPluginDir() . '/libs/classes/aws-autoloader.php';
                        $credentials = new Aws\Common\Credentials\Credentials($amazon_option['access_key_id'], $amazon_option['secret_access_key']);
                        $client = Aws\S3\S3Client::factory(array( 'credentials' => $credentials ) );
                        try {
                            $keys = $client->listObjects(array('Bucket' => $amazon_option['bucket'], 'Prefix' => $_POST['backup-name']))->getIterator();
                            if (isset($keys['Contents'])) {
                                $n = count($keys['Contents']);
                                for($i = 0; $i < $n; $i++) {
                                    $client->deleteObject(array('Bucket' => $amazon_option['bucket'], 'Key' => $keys['Contents'][$i]['Key']));
                                }
                            }
                        } catch (Exception $e) {
                            self::setError( $e->getMessage() );
                        } catch(S3Exception $e) {             
                            self::setError( $e->getMessage() );
                        }
                    }
                }
            }
            Header("location: " . admin_url( 'admin.php?page=amazon-s3-backup' ) );
        }
        public static function backup_s3()
        {
            @session_write_close();
            self::remove(self::$log_file);
            $core = new core('backup', array('params' => array( 'optimize' => 1, ), 'sets' => 1 ) );
            $res = plugin_unpack((string)$core);
            if ($res['size'] > 0) {
                $setting = get_option(PREFIX_AS3B . 'setting');
                if (isset($setting['access_key_id']) && isset($setting['secret_access_key']) && isset($setting['bucket']) && ( isset($setting['region']) && !empty($setting['region']) ) ) {
                    $core = new core('send-to-s3', array('params' => array( 'files' => $res['data'], 'access_details' => 
                    array( 'bucket' => $setting['bucket'], 
                    'AccessKeyId' => $setting['access_key_id'], 
                    'SecretAccessKey' => $setting['secret_access_key'], 
                    'region' => $setting['region'], 
                    'dir' => $res['name'],
                    'mkdir_for_backup' => 1,
                    ) 
                    ) 
                    ) 
                    );
                    $res2 = plugin_unpack((string)$core);
                    if ($res2['result'] == 'success') {
                        $res['type'] = 's3';
                    } else {
                        $res['data'] = array();
                        $res['error'] = lang::get('Error: send to Amazon s3 Backup', false);
                        $res['result'] = RESULT_ERROR;
                    }
                } else {
                    $res['data'] = array();
                    $res['error'] = lang::get('Set Setting for Amazon S3', false);
                    $res['result'] = RESULT_ERROR;
                }
            } else {
                $res['data'] = array();
                $res['error'] = lang::get('Error in create Backup', false);
                $res['result'] = RESULT_ERROR;
            }
            if (isset($res['name'])) {
                self::remove(BACKUP_DIR . '/' . $res['name']);
            }
            echo json_encode( $res );
            @session_start();
            wp_die();
        }
        public static function restore_backup()
        {
            if (isset($_POST['type']) && isset($_POST['name'])) {
                self::remove(self::$log_file);  
                $core = new core('recover', array('params' => array( 'name' => $_POST['name'], 'type' => $_POST['type'] ) ) );
                echo json_encode( plugin_unpack((string)$core) );
            }                           
            wp_die();
        }
    }

}