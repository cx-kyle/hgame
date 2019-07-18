<?php
namespace common\components\gm;

use yii\base\Component;
use Yii;


class GameManagerHelper extends  Component
{


    public static function loadServers($p = '',$limit = 0,$where ='1=1')
    {
        $sql
            = "SELECT id as code, concat(name, area) as name
              FROM server_info
              where $where 
              group by serverId   
              order by id desc
              ";

        $command = self::getServiceDbName()->createCommand($sql);

        $result = $command->queryAll();
        return $result;

    }

    public static function getServiceDbName()
    {
       $connection = Yii::$app->xkx2wxdb;
        return $connection;
    }


    public static function getUserMailInfo($serverID,$page,$limit,$where)
    {
        $offset = ($page-1) * ($limit);
        $sql ="SELECT id,userId,type,sender,title,content,status,expireAt,redeemedAt,deletedAt,priority
              FROM mail 
              WHERE $where
              order by id desc
              limit $limit
              offset $offset
              ";

        $command = self::getDbConnectionByServerId($serverID)->createCommand($sql);
        $result = $command->queryAll();
        return $result;
    }

    /**
     * 获取总数
     */

    public static function getUserMailCount($serverID,$where)
    {
        
        $sql ="SELECT COUNT(*) FROM mail where $where";

        $command = self::getDbConnectionByServerId($serverID)->createCommand($sql);
        $result = $command->queryScalar();
        return $result;
    }



    public static function getDbConnectionByServerId($serverId)
    {
        list($uid, $pwd, $dsn, ) = self::getServerYiiInfo($serverId);
        return self::getDbConnection($dsn, $uid, $pwd);
    }

    public static function getServerYiiInfo($serverId)
    {

            $serverInfo = self::getServer($serverId);
            $rawLink = $serverInfo['dblink'];
        if (empty($rawLink)) {
            log($serverId, 'error', 'svipInput');
        }
        return self::serverDataFormate($serverInfo);
    }

    public static function getServer($serverId)
    {
        $sql
            = "SELECT id as code, concat(name, area) as name, openTime, dblink as dbLink, serverId,serverIndex 
              FROM server_info
              where id= $serverId
              order by id desc
              ";
        $command = self::getServiceDbName()->createCommand($sql);

        return $result = $command->queryOne();
    }

    private static function serverDataFormate($server)
    {
        $d = array();
        $dd = explode(';', $server['dbLink']);
        foreach ($dd as $x) {
            list($key, $value) = explode('=', $x);
            $d[$key] = $value;
        }
        $s = isset($d['server']) ? $d['server'] : '127.0.0.1';
        $p = isset($d['port']) ? $d['port'] : 3306;
        $db = isset($d['database']) ? $d['database'] : 'mysql';
        $dbUsername = isset($d['uid']) ? $d['uid'] : 'guest';
        $dbPassword = isset($d['pwd']) ? $d['pwd'] : '123456';
        //如果需要使用外链
        if (!empty($server['outLink'])){
            $o = explode(':', $server['outLink']);
            $s = isset($o[0]) ? $o[0] : '127.0.0.1';
            $p = isset($o[1]) ? $o[1] : 3306;
        }

        $dbLink = vsprintf('mysql:host=%s;port=%s;dbname=%s', array($s, $p, $db));

        $lastIndex = strrpos($db, "_");
        $realServerId = substr($db, $lastIndex+1);

        return array($dbUsername, $dbPassword, $dbLink, $realServerId);
    }


    public static function getDbConnection($dsn, $uid, $pwd)
    {
        log('dynamic dsn:'.$dsn.', uid:'.$uid.', pwd:'.$pwd, 'info', 'GmDataSource');
        $connection = new \yii\db\Connection([
            'dsn' => $dsn,
            'username' => $uid,
            'password' => $pwd,
        ]);
        $connection->open();
        return $connection;
    }
}
