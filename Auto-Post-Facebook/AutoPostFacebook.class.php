<?php

/**
 * AutoPostSocialMidia [ HELPER ]
 * Classe para automaticar post automaticos
 * @copyright (c) 2017, Davson N. Santos - DAVTECH - SOLUÇÕES INTELIGENTES
 */
require 'Facebook/autoload.php';

class AutoPostFacebook {

    //CODIGOS DE ACESSO
    private $App_id = '217546225675050'; //'1933685376887122';
    private $App_secret = '485f5bedd696b49d4c2d0ca76bd22b60'; //'4889fd42b0347d12a31f3c7ac099cb8d';
    private $Token_access = 'EAADF222A6yoBAMILjWI7jxGEUYg0xB8KEPES8vdTHQZBS0KaaThwJ83PZB42S8K3CAv7Wa6sP5sZBF14w7ZBWxP1sRBDZAjzCUuzN2MPpeZB1lYW6lYE8R6RwZB8Cx8jD7JCCIEqKgIWPh4emjjWGWZAaZCp5S6mvkUIrqRDdGJKi7TuYnwFEVvDu';
    //private $PageId;
    private $appAccessToken;
    private $Facebook;
    private $PostData;
    public $Result;

    function __construct() {
        $this->Facebook = new Facebook\Facebook([
            'app_id' => $this->App_id,
            'app_secret' => $this->App_secret,
            'default_graph_version' => 'v3.2'
        ]);
        $this->Facebook->setDefaultAccessToken($this->Token_access);
    }

    public function AutoPost($Data) {
        $this->PostData = $Data;
        $this->getValidUser();

        if ($this->PostData['page_id']):
            try {
                $response = $this->Facebook->post('/' . $this->PostData['page_id'] . '/feed', array(
                    "message" => $this->PostData['post_title'],
                    "link" => $this->PostData['post_link'],
                        ), $this->appAccessToken
                );
                // Success
                $this->Result = true; //$response->getGraphNode();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // When Graph returns an error
                $this->Result = '<p>Error de Graph: ' . $e->getMessage() . '</p>';
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                // When validation fails or other local issues
                $this->Result = '<p>Error de Facebook SDK: ' . $e->getMessage() . '</p>';
            }
        endif;

        return $this->Result;
    }

    public function getPages() {
        $response = $this->Facebook->get('/me/accounts');

        foreach ($response->getDecodedBody() as $allAccounts) {
            foreach ($allAccounts as $account) {
                $this->Result[] = $account;
            }
        }
        return $this->Result;
    }

    private function getValidUser() {
        $response = $this->Facebook->get('/me/accounts');

        foreach ($response->getDecodedBody() as $allAccounts):
            foreach ($allAccounts as $account):
                if (isset($account['id'])):
                    if ($account['id'] == $this->PostData['page_id']):
                        $this->appAccessToken = $account['access_token'];
                    endif;
                endif;
            endforeach;
        endforeach;
    }

}

?>