<?php
date_default_timezone_set("Asia/Taipei");
session_start();
function to($url)
{
    header("location:$url");
}
function dd($ary)
{
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
}
class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db04";
    protected $pdo;
    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }
    private function a2s($ary)
    {
        foreach ($ary as $col => $val) {
            $tmp[] = "`$col`='$val'";
        }
        return $tmp;
    }
    private function sql_all($sql, $where, $other)
    {
        if (is_array($where)) {
            $sql .= " where " . join(" && ", $this->a2s($where));
        } else {
            $sql .= " $where ";
        }
        $sql .= " $other ";
        return $sql;
    }
    private function math($math, $col, $where = "", $other = "")
    {
        $sql = "select $math(`$col`) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function count($where = "", $other = "")
    {
        $sql = "select count(*) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function all($where = "", $other = "")
    {
        $sql = "select * from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function save($ary)
    {
        if (isset($ary['id'])) {
            $sql = "update `$this->table` set ";
            $sql .= join(",", $this->a2s($ary));
            $sql .= " where `id`='{$ary['id']}'";
        } else {
            $sql = "insert into `$this->table` ";
            $col = "(`" . join("`,`", array_keys($ary)) . "`)";
            $val = "('" . join("','", $ary) . "')";
            $sql .= "{$col} values {$val}";
        }
        return $this->pdo->exec($sql);
    }
    function find($id)
    {
        $sql = "select * from `$this->table` where ";
        if (is_array($id)) {
            $sql .= join(" && ", $this->a2s($id));
        } elseif (is_numeric($id)) {
            $sql .= "`id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id)
    {
        $sql = "delete from `$this->table` where ";
        if (is_array($id)) {
            $sql .= join(" && ", $this->a2s($id));
        } elseif (is_numeric($id)) {
            $sql .= "`id`='$id'";
        }
        return $this->pdo->exec($sql);
    }
}
$Th = new DB('th'); //id,text,big_id;
$Goods = new DB('goods'); //id,no(6-rand(100000,999999)),big,mid,text,img,price,stock,spec,intro,sh;
$Order = new DB('orders'); //id,no(14-date("Ymd").rand(100000,999999)),acc,name,email,tel.addr,cart,total,orderdate;
$Mem = new DB('mem'); //id,acc,pw,total,name,email,tel,addr,regdate;
$Admin = new DB('admin'); //id,acc,pw,pr;
$Bottom = new DB('bottom'); //id,bottom;

if (isset($_GET['do'], ${ucfirst($_GET['do'])})) {
    $do = $_GET['do'];
    $DB = ${ucfirst($do)};
}
