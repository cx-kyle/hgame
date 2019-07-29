<?php

namespace common\models\hgame\xkx2wxdb;

use Yii;
use common\components\gm\GameManagerHelper;
/**
 * This is the model class for table "activity_template".
 *
 * @property int $id ??
 * @property string $title ??
 * @property int $type 1:??; 2:7??? 3:???? 4:???? 5:???? 6:???? 7:??? 
 * @property int $isDefault ?????????: 0? 1?
 * @property int $week
 * @property string $startTime ????
 * @property string $endTime ????
 * @property string $cycle ????(?)
 * @property int $releaseTime
 * @property string $items ??
 * @property string $exValues ???
 * @property string $exValues2 ???2
 * @property string $content ??
 * @property int $isOpen ????
 * @property int $sort ??
 * @property string $exData ?????? {"1":"jchd"}
 * @property int $isCirculation ????????
 * @property string $timingStartTime ????????
 * @property string $limitLvl
 * @property int $scoreLimit
 * @property string $exValues3 ??
 * @property int $differentType ????
 * @property string $exValues4 ?? ?? ??
 * @property string $exValues5 vip ????? 
 * @property string $exValues6
 * @property string $exValues7
 */
class ActivityTemplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity_template';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('activdb');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'isDefault', 'week', 'releaseTime', 'isOpen', 'sort', 'isCirculation', 'scoreLimit', 'differentType'], 'integer'],
            [['startTime', 'endTime', 'timingStartTime'], 'safe'],
            [['items', 'exValues', 'exValues2', 'content', 'exData', 'limitLvl', 'exValues3', 'exValues4', 'exValues5', 'exValues6', 'exValues7'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['cycle'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'type' => 'Type',
            'isDefault' => '是否开服默认',
            'week' => '周几开启',
            'startTime' => '开始时间',
            'endTime' => '结束时间',
            'cycle' => '活动周期(天)',
            'releaseTime' => '发布间隔',
            'items' => '物品',
            'exValues' => '扩展值',
            'exValues2' => '扩展值2',
            'content' => '内容',
            'isOpen' => '是否开启',
            'sort' => '排序',
            'exData' => '活动额外信息',
            'isCirculation' => '是否循环',
            'timingStartTime' => '自动开启时间',
            'limitLvl' => 'Limit Lvl',
            'scoreLimit' => 'Score Limit',
            'exValues3' => '扩展值3',
            'differentType' => '活动类型',
            'exValues4' => '扩展值4',
            'exValues5' => '扩展值5',
            'exValues6' => '扩展值6',
            'exValues7' => '扩展值7',
        ];
    }
    public function updateAllServers($templateId)
    {

        $template = $this->getDetail($templateId);
        //删除与活动无关的模板属性
        unset($template['id']);
        unset($template['isDefault']);
        unset($template['cycle']);
        unset($template['startTime']);
        unset($template['endTime']);
        unset($template['releaseTime']);
        unset($template['isOpen']);
        unset($template['isCirculation']);
        unset($template['timingStartTime']);
        unset($template['week']);

        $dball = GameManagerHelper::getDbConnectionAll(self::getDb());
        foreach ($dball as $k => $db){
            $db['db']->createCommand()->update('activity', $template, "templateId=$templateId and isOpen = 1");
        }
        return true;
    }
    public function getDetail($id) {
        $ids = is_array($id) ? $id : array($id);
        if(empty($ids))
            return array();
       $sql = "select * from activity_template where id = $id";
       $results = self::getDb()->createCommand($sql)->queryAll();
        // $results = ActivityTemplate::find($ids)->asArray();
        //var_dump($results);die;
        $data = array();
        foreach($results as $v) {
            $data[$v['id']] = $v;
        }
        if(!is_array($id) && $data) {
            return array_pop($data);
        }
        return $data;
    }
    public function getListAllSr() {
        $sql = "SELECT %s FROM `activity` WHERE 1";
        $params = array();
        $data = array();    
        //过滤掉模板ID 为0的老数据
        $sql .= ' AND templateId > 0 ';
        $dataSql = sprintf($sql, 'id,title,type,startTime,endTime,isOpen,sort,templateId');
        $dataSql .= ' ORDER BY sort DESC ';
        $db = self::getDb();
        $dbAll = GameManagerHelper::getDbConnectionAll($db);
       
        foreach ($dbAll as $k => $db){
            $activities = $db['db']->createCommand($dataSql)->queryAll();
            unset($dbAll[$k]['db']);
            foreach ($activities as $j => $a){
                $activities[$j] = array_merge($dbAll[$k],$activities[$j]);
            }
            $data = array_merge($data,$activities);
        }

        //格式化结果集
        $newData = array();
        foreach ($data as $key => $val){
            $tag = false;
            $data[$key]['isReady'] = 0;//设置初始值
            if ($val['endTime'] < date('Y-m-d H:i:s') || $data[$key]['isOpen'] == 0){
                $data[$key]['isOpen'] = 0;
                if (!in_array($val['type'], array(16,5))){
                    $data[$key]['isReady'] = 1;
                }
            }
            foreach ($newData as $k => $v){
                if ($v['templateId'] == $data[$key]['templateId']){
                    if (isset($newData[$k]['srList'][$data[$key]['code']])){
                        $newData[$k]['srList'][$data[$key]['code']]['status'] = (int)($data[$key]['isOpen'] ||$newData[$k]['srList'][$data[$key]['code']]['status']);
                        $newData[$k]['srList'][$data[$key]['code']]['isReady'] = (int)($data[$key]['isReady'] && $newData[$k]['srList'][$data[$key]['code']]['isReady']);
                    }else{
                        $newData[$k]['srList'][$data[$key]['code']] = array('code' => $data[$key]['code'],'name' => $data[$key]['name'],'status' => $data[$key]['isOpen'],'isReady' => $data[$key]['isReady']);
                    }
                    //计算
                    $tag = true;
                }
            }
            if (!$tag){
                $data[$key]['srList'][$data[$key]['code']] = array('code' => $data[$key]['code'],'name' => $data[$key]['name'],'status' => $data[$key]['isOpen'],'isReady' => $data[$key]['isReady']);
                unset($data[$key]['code']);
                unset($data[$key]['name']);
                $newData[] = $data[$key];
            }
        }
        
        //获取所有的活动模板
        $templates = self::getAll();
        foreach ($templates as $key => $template){
            $tag = false;
            foreach ($newData as $k => $v){
                if ($v['templateId'] == $template['id']){
                    //采用模板值
                    $newData[$k]['sort'] = $template['sort'];
                    $newData[$k]['title'] = $template['title'];
                    $newData[$k]['templateOpen'] = 1;
                    $tag = true;
                    break;
                }
            }
            if (!$tag){
                $template['templateId'] = $template['id'];
                $template['isOpen'] = 0;
                $template['templateOpen'] = 1;
                $template['srList'] = array();
                $newData[] = $template;
            }
        }
        
        //隐藏 模板关闭或删除的活动
        foreach ($newData as $key => $val){
            if (!isset($newData[$key]['templateOpen'])){
                unset($newData[$key]);
            }
        }
        
        //按 sort 排序
        $newData = self::arr_sort($newData, 'sort');
        
//         //查找最后一个关闭活动，提示需要开启的活动  isReady = 1;
//         $newData = $this->setLastActivityClosed($newData);
        
        //计算开启数和待开启数
        foreach ($newData as $key => $data){
            $newData[$key]['isOpen'] = 0;
            $newData[$key]['isReady'] = 0;
            foreach ($data['srList'] as $k => $s){
                $newData[$key]['isOpen'] += $s['status'];
                $newData[$key]['isReady'] += $s['isReady'];
            }
        }
        return array($newData, null);
    }
    public  function getAll(){
        $sql = "SELECT %s FROM `activity_template` WHERE isOpen=1 ";
        // if(isset($condition['isOpen']) && is_numeric($condition['isOpen'])) {
        //     $sql .= ' AND isOpen = ? ';
        //     $params[] = $condition['isOpen'];
        // }
        // if(isset($condition['isDefault']) && is_numeric($condition['isDefault'])) {
        //     $sql .= ' AND isDefault = ? ';
        //     $params[] = $condition['isDefault'];
        // }
        // if(isset($condition['group'])) {
        //     $sql .= ' AND type  in ('.$condition['group'].') ';
        // }
        $dataSql = sprintf($sql, 'id,title,type,isDefault,startTime,endTime,cycle,isOpen,isCirculation,sort');
        return self::getDb()->createCommand($dataSql)->queryAll();
    }
    public function arr_sort($array,$key,$order="desc"){
        $arr_nums=$arr=array();
        foreach($array as $k=>$v){
            $arr_nums[$k]=$v[$key];
        }
        if($order=='asc'){
            asort($arr_nums);
        }else{
            arsort($arr_nums);
        }
        foreach($arr_nums as $k=>$v){
            $arr[]=$array[$k];
        }
        return $arr;
    }
}
