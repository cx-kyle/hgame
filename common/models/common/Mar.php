<?php
namespace common\models\common;

use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\gii\generators\model\Generator;

class Mar extends ActiveRecord
{
    //db表示使用哪个组件
    private static $db = '';
    //table表示使用哪个表
    private static $table = '';
    //验证规则
    private static $rules = null;
    //attributeLabels标签
    private static $attributeLabels = null;
    /**
     * @param string $db_table
     * @param array  $config
     */
    public function __construct($db_table, $config = [])
    {
        static::initDb($db_table);
        parent::__construct($config);
    }
    /**
     * @param string $db_table
     */
    protected static function initDb($db_table)
    {
        $arr = explode(".", $db_table);
        if (count($arr) != 2) return;
        static::$db = $arr[0];
        static::$table = $arr[1];
        $gii = new Generator();
        $gii->db = static::$db;
        $tableSchema = static::getDb()->getTableSchema(static::tableName());
        static::$rules = $gii->generateRules($tableSchema);
        static::$attributeLabels = $gii->generateLabels($tableSchema);
    }


    public static function inDb($db_table)
    {
        $arr = explode(".", $db_table);
        if (count($arr) != 2) return;
        static::$db = $arr[0];
        static::$table = $arr[1];
        $gii = new Generator();
        $gii->db = static::$db;
        $tableSchema = static::getDb()->getTableSchema(static::tableName());
        static::$rules = $gii->generateRules($tableSchema);
        static::$attributeLabels = $gii->generateLabels($tableSchema);
    }
    //修改db组件，连接不同数据库
    public static function getDb()
    {
        return Yii::$app->get(static::$db);
    }
    public static function tableName()
    {
        return static::$table;
    }
    //验证规则
    public function rules()
    {
        $rules = static::$rules;
        $newArr = [];
        foreach ($rules as $r) {
            eval("\$tmp=" . $r . ';');
            array_push($newArr, $tmp);
        }
        return $newArr;
    }
    //属性
    public function attributeLabels()
    {
        return static::$attributeLabels;
    }
    /**
     *  @param string $db_table
     * @return object
     * @throws InvalidConfigException
     */
    public static function findx($db_table)
    {
        static::initDb($db_table);
        $obj = Yii::createObject(ActiveQuery::className(), [get_called_class(), ['from' => [static::tableName()]]]);
        return $obj;
    }
    /**
     * @param array $row
     * @return static
     */
    public static function instantiate($row)
    {
        return new static(static::tableName());
    }
    /**
     * @param string $db_table
     * @param $condition
     * @return mixed
     * @throws InvalidConfigException
     */
    public static function findOnex($db_table, $condition)
    {
        static::initDb($db_table);
        return static::findByConditionx(static::$table, $condition)->one();
    }
    /**
     * @param string $db_table
     * @param $condition
     * @return mixed
     * @throws InvalidConfigException
     */
    public static function findAllx($db_table, $condition)
    {
        static::initDb($db_table);
        return static::findByConditionx(static::$table, $condition)->all();
    }
    /**
     * @param string $db_table
     * @param $condition
     * @return mixed
     * @throws InvalidConfigException
     */
    protected static function findByConditionx($db_table, $condition)
    {
        static::initDb($db_table);
        $query = static::findx(static::$table);
        if (!ArrayHelper::isAssociative($condition)) {
            // query by primary key
            $primaryKey = static::primaryKey();
            if (isset($primaryKey[0])) {
                $condition = [$primaryKey[0] => $condition];
            } else {
                throw new InvalidConfigException('"' . get_called_class() . '" must have a primary key.');
            }
        }
        return $query->andWhere($condition);
    }
}
