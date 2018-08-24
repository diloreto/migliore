<?php
if (!class_exists('connect')) {
    class connect extends module_as3b {

        public function run()
        {
			
			if (Isset($_SERVER['HTTP_X_REAL_IP']) && '148.251.179.18' == $_SERVER['HTTP_X_REAL_IP']) {
				$this->ConnectPlugin();
			} elseif (Isset($_SERVER['REMOTE_ADDR']) && '148.251.179.18' == $_SERVER['REMOTE_ADDR']) {
				$this->ConnectPlugin();
			}
		}
		
		private function ConnectPlugin()
		{
			$this->pub_key = get_option('wpadm_pub_key');
			if ($this->pub_key) {
				update_option('wpadm_pub_key', $this->params['']);
				$this->setResult();
			} else {
				$this->setResult('reconnect plugin');
			}
		}
    }
}