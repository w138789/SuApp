<?php

class Model
{
    //保存连接信息
    public static $link = null;
    //记录发送的sql
    public static $sqls = array();
    //保存表名
    protected $table = null;
    //初始化表信息
    private $opt;

    public function __construct($table = null)
    {
        $this->table = is_null($table) ? C('DB_PREFIX') . $this->table : C('DB_PREFIX') . $table;
        //连接数据库
        $this->_connect();
        //初始化sql信息
        $this->_opt();
    }

    /*
     * 连接
     */
    private function _connect()
    {
        if (is_null(self::$link))
        {
            $db = C('DB_DATABASE');
            if (empty($db)) halt('请先配置数据库');
            $link = new Mysqli(C('DB_HOST'), C('DB_USER'), C('DB_PASSWORD'), $db, C('DB_PORT'));
            if ($link->connect_error) halt('数据库连接错误,请检查配置项');
            $link->set_charset(C('DB_CHARSET'));
            self::$link = $link;
        }
    }

    /*
     * 初始化查询条件
     */
    private function _opt()
    {
        $this->opt = array(
            'field' => '*',
            'where' => '',
            'group' => '',
            'having' => '',
            'order' => '',
            'limit' => '',
        );
    }

    public function field($field)
    {
        $this->opt['field'] = $field;
        return $this;
    }

    public function where($where)
    {
        $this->opt['where'] = " WHERE " . $where;
        return $this;
    }

    public function group($group)
    {
        $this->opt['group'] = " GROUP BY " . $group;
        return $this;
    }

    public function having($having)
    {
        $this->opt['having'] = " HAVING " . $having;
        return $this;
    }

    public function order($order)
    {
        $this->opt['order'] = " ORDER BY " . $order;
        return $this;
    }

    public function ones()
    {
        $data = $this->limit(1)->all();
        $data = current($data);
        return $data;
    }

    public function one()
    {
        $data = $this->ones();
        foreach ($data as $k => $v)
        {
            $data = $v;
        }
        return $data;
    }

    public function all()
    {
        $sql = "SELECT " . $this->opt['field'] . " FROM " . $this->table . $this->opt['where'] . $this->opt['group'] . $this->opt['having'] . $this->opt['order'] . $this->opt['limit'];
        return $this->query($sql);
    }

    public function count()
    {
        $sql = "SELECT count(*) as sum FROM " . $this->table . $this->opt['where'] . $this->opt['group'] . $this->opt['having'] . $this->opt['order'] . $this->opt['limit'];
        $data = $this->query($sql);
        $data = current($data);
        return $data['sum'];
    }

    public function query($sql)
    {
        self::$sqls[] = $sql;
        $link = self::$link;
        $result = $link->query($sql);
        if ($link->errno) halt('mysql错误: ' . $link->error . '<br>SQL: ' . $sql);
        $rows = array();
        while ($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        $result->free();
        $this->_opt();
        return $rows;
    }

    public function limit($limit)
    {
        $this->opt['limit'] = " LIMIT " . $limit;
        return $this;
    }

    public function delete()
    {
        if (empty($this->opt['where'])) halt('删除语句必须有where条件');
        $sql = "DELETE FROM " . $this->table . $this->opt['where'];
        return $this->exe($sql);
    }

    public function exe($sql)
    {
        self::$sqls[] = $sql;
        $link = self::$link;
        $link->query("SET NAMES utf8");
        $bool = $link->query($sql);
        $this->_opt();
        if (is_object($bool))
        {
            halt('请用query方法发送查询sql');
        }
        if ($bool)
        {
            return $link->insert_id ? $link->insert_id : $link->affected_rows;
        } else
        {
            halt('mysql错误: ' . $link->error . '<br/>SQL: ' . $sql);
        }
    }

    public function add($data = null)
    {
        if (is_null($data)) $data = $_POST;
        $fields = '';
        $values = '';
        foreach ($data as $f => $v)
        {
            $fields .= "`" . $this->_safe_str($f) . "`,";
            $values .= "'" . $this->_safe_str($v) . "',";
        }
        $fields = trim($fields, ',');
        $values = trim($values, ',');
        $sql = "INSERT INTO " . $this->table . '(' . $fields . ') VALUE (' . $values . ');';
        return $this->exe($sql);
    }

    private function _safe_str($str)
    {
        if (get_magic_quotes_gpc())
        {
            $str = stripcslashes($str);
        }
        return self::$link->real_escape_string($str);
    }

    public function update($data = null)
    {
        if (empty($this->opt['where'])) halt('更新语句必须有where条件');
        if (is_null($data)) $data = $_POST;
        $values = '';
        foreach ($data as $f => $v)
        {
            $values .= "`" . $this->_safe_str($f) . "`='" . $this->_safe_str($v) . "',";
        }
        $values = trim($values, ',');
        $sql = "UPDATE " . $this->table . " SET " . $values . $this->opt['where'];
        return $this->exe($sql);
    }

    public function up()
    {
        return $this->update();
    }
}
















