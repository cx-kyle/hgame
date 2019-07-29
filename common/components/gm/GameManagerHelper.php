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

    /** 更新或增加单个用户邮件 */
    public static function getUserMail($serverID,$where,$dsnInfo)
    {
        $sql ="SELECT id,userId,type,sender,title,content,status,expireAt,redeemedAt,deletedAt,priority
              FROM mail 
              WHERE $where
              order by id desc
              ";
         $command = self::getDbConnectionByServerId($serverID,$dsnInfo)
         ->createCommand()
         ->update('mail', ['status' => 1], 'id = 3755')->execute();;
         //$result = $command->queryAll();
         //return $result;
    }

    /** 获取单服用户邮件 */

    public static function getUserMailInfo($serverID,$page,$limit,$where,$dsnInfo)
    {
        
        $offset = ($page-1) * ($limit);
        $sql ="SELECT id,userId,type,sender,title,content,status,expireAt,redeemedAt,deletedAt,priority
              FROM mail 
              WHERE $where
              order by id desc
              limit $limit
              offset $offset
              ";

        $command = self::getDbConnectionByServerId($serverID,$dsnInfo)->createCommand($sql);
        $result = $command->queryAll();
        return $result;
    }

    /** 获取单服用户邮件总数 */

    public static function getUserMailCount($serverID,$where,$dsnInfo)
    {
        
        $sql ="SELECT COUNT(*) FROM mail where $where";

        $command = self::getDbConnectionByServerId($serverID,$dsnInfo)->createCommand($sql);
        $result = $command->queryScalar();
        return $result;
    }


    /** 获取单服用户 玩家详情 */

    public static function getUserInfo($serverID,$page,$limit,$where,$dsnInfo)
    {
        $offset = ($page-1) * ($limit);
        $sql ="SELECT id,nickName,openId,mi,rechargeAll,vip,vipScore,lvl,combat,guildId,offlineTime,diamond
              FROM user 
              WHERE $where
              order by id desc
              limit $limit
              offset $offset
              ";

        $command = self::getDbConnectionByServerId($serverID,$dsnInfo)->createCommand($sql);
        $result = $command->queryAll();
        return $result;
    }

    /** 获取单服用户 玩家详情总数 */

    public static function getUserInfoCount($serverID,$where,$dsnInfo)
    {
        
        $sql ="SELECT COUNT(*) FROM user where $where";

        $command = self::getDbConnectionByServerId($serverID,$dsnInfo)->createCommand($sql);
        $result = $command->queryScalar();
        return $result;
    }


    /** 获取单服用户 货币消耗 */

    public static function getUserMoneyLog($serverID,$page,$limit,$where,$dsnInfo)
    {
        $offset = ($page-1) * ($limit);
        $sql ="SELECT UserId, iMoneyType, iMoney, AfterMoney, Reason, AddOrReduce, dtEventTime
              FROM log_money_flow 
              WHERE $where
              order by dtEventTime desc
              limit $limit
              offset $offset
              ";

        $command = self::getDbConnectionByServerId($serverID,$dsnInfo)->createCommand($sql);
        $result = $command->queryAll();
        return $result;
    }

    /** 获取单服用户 货币消耗总数 */

    public static function getUserMoneyLogCount($serverID,$where,$dsnInfo)
    {
        
        $sql ="SELECT COUNT(*) FROM log_money_flow where $where";

        $command = self::getDbConnectionByServerId($serverID,$dsnInfo)->createCommand($sql);
        $result = $command->queryScalar();
        return $result;
    }


    /** 获取单服用户 消耗查询 */

    public static function getRemoveFlowLog($serverID,$page,$limit,$where,$dsnInfo)
    {
        $offset = ($page-1) * ($limit);
        $sql ="SELECT id, UserId, eventTime, consumItem,vip, consumDiamondNo, consumMiNo, consumGuildMoneyNo, diamondNo, miNo, guildMoneyNo
              FROM log_remove_flow 
              WHERE $where
              order by id desc
              limit $limit
              offset $offset
              ";

        $command = self::getDbConnectionByServerId($serverID,$dsnInfo)->createCommand($sql);
        $result = $command->queryAll();
        return $result;
    }

    /** 获取单服用户 消耗查询总数 */

    public static function getRemoveFlowLogCount($serverID,$where,$dsnInfo)
    {
        
        $sql ="SELECT COUNT(*) FROM log_remove_flow where $where";

        $command = self::getDbConnectionByServerId($serverID,$dsnInfo)->createCommand($sql);
        $result = $command->queryScalar();
        return $result;
    }






    public static function getDbConnectionByServerId($serverId,$dsnInfo)
    {
        list($uid, $pwd, $dsn, ) = self::getServerYiiInfo($serverId);
        $dsn = str_replace("_server_game_", $dsnInfo, $dsn);
        return self::getDbConnection($dsn, $uid, $pwd);
    }

    public static function getServerYiiInfo($serverId)
    {

            $serverInfo = self::getServer($serverId);
            $rawLink = $serverInfo['dbLink'];
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

        $connection = new \yii\db\Connection([
            'dsn' => $dsn,
            'username' => $uid,
            'password' => $pwd,
        ]);
        $connection->open();
        return $connection;
    }
    public static function getDbConnectionBydbname($db)
    {
      
       $sql = "SELECT id as code, concat(any_value(name),any_value(area)) as name, dbLink ,serverId
         FROM server_info
         where status <> 5 and status != 8
         group by serverId 
         order by id desc
         ";
       $dblink =$db->createCommand($sql)->queryAll();
       return $dblink;
    }
     /**
     * @uses  获取所有格式化的服务器参数
     * @return string
     */
    public static function getAllServerInfo($db)
    {
        $serverInfo = self::getDbConnectionBydbname($db);
        if ((!isset($serverInfo[0])) || empty($serverInfo[0]['dbLink'])) {
            throw new CException("cannot get dbLink, please check you have been get related server info.");
        }
        $rawLinkList = array();
        foreach ($serverInfo as $k => $s){
            $serverInfo[$k]['dbLink'] = self::serverDataFormate($s);
//             if (!empty($serverInfo[$k]['mergerName'])){
//                 $serverInfo[$k]['name'] = $serverInfo[$k]['mergerName'];
//             }
        }

        return $serverInfo;
    }
    /**
     * @uses  获取所有服务器连接
     * @return [CDbConnection]
     */
    public static function getDbConnectionAll($db)
    {   
        $list = self::getAllServerInfo($db);
        foreach ($list as $k => $s){
            $list[$k]['db'] = self::getDbConnection($s['dbLink'][2], $s['dbLink'][0], $s['dbLink'][1]);
            unset($list[$k]['dbLink']);
        }

        return $list;
    }

}
