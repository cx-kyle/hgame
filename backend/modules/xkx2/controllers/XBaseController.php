<?php
namespace backend\modules\xkx2\controllers;

use backend\controllers\BaseController;
use Yii;
use common\components\gm\GameManagerHelper;

class XBaseController extends BaseController
{

    public $serverId = 0;  // 服务器ID

    public $serversInfo = [];

    public $page = 1;
    public $limit =10;

    public function init()
    {
        
        $this->serverId = intval(Yii::$app->request->getQueryParam('e', 0));
        $this->page = intval(Yii::$app->request->getQueryParam('page', 1));
        $this->limit = intval(Yii::$app->request->getQueryParam('limit', 10));
        if($this->serverId == 0 && isset($_SESSION["serverId"]) ){

            $this->serverId = $_SESSION['serverId'];

        }
        $_SESSION['serverId'] = $this->serverId;

        $serversInfoAll = GameManagerHelper::loadServers('',-1);

        $this->serversInfo = array_slice($serversInfoAll, 0);
       
        if(empty($this->serverId)){
            $this->serverId = $this->serversInfo[0]['code'];
        }
        
    }

    
}