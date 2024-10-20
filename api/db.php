<?php
date_default_timezone_set("Asia/Taipei");
session_start();
function to($url)
{
    header("location:$url");
};
function dd($ary)
{
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
};
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
    function sum($col, $where = "", $other = "")
    {
        return $this->math("sum", $col, $where, $other);
    }
    function max($col, $where = "", $other = "")
    {
        return $this->math("max", $col, $where, $other);
    }
    function min($col, $where = "", $other = "")
    {
        return $this->math("min", $col, $where, $other);
    }
    function save($ary)
    {
        if (isset($ary['id'])) {
            $sql = "update `$this->table` set ";
            $sql .= join(",", $this->a2s($ary));
            $sql .= " where `id`={$ary['id']}";
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
    function date($ondate)
    {
        $todays = strtotime(date("Ymd"));
        $ondates = strtotime($ondate);
        $ends = strtotime("+2 days", $ondates);
        $d['ago'] = date("Y-m-d", strtotime("-2 days"));
        $d['diff'] = ($ends - $todays) / (60 * 60 * 24);
        return $d;
    }
    function page($div, $now, $where = "", $other = "")
    {
        $tot = $this->count($where, $other);
        $p['pages'] = ceil($tot / $div);
        $p['start'] = ($now - 1) * $div;
        $p['prev'] = ($now == 1) ? $now : $now - 1;
        $p['next'] = ($now == $p['pages']) ? $now : $now + 1;
        return $p;
    }
}
$Bottom = new DB('bottom');
$Admin = new DB('admin');
$Mem = new DB('mem');
$Th = new DB('th');
$Goods = new DB('goods');
$Order = new DB('orders');

if (isset($_GET['do'], ${ucfirst($_GET['do'])})) {
    $do = $_GET['do'];
    $DB = ${ucfirst($do)};
}
