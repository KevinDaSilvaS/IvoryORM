<?php
require_once('Operations.php');

$arrSelect = array();
$arrSelect[] = "nome";
$arrSelect[] = "COUNT(linha) AS l";

$arrWhere = array();
$arrWhere[] = [
    "propName" => "oi",
    "fieldValue" => 30,
    "isAnd" => false,
    "like" => true,
    "pattern" => "%or%",
];

$arrWhere[] = [
    "propName" => "tchau",
    "fieldValue" => 0,
    "equal" => false,
];

$tables = array();
$tables[] = "materiais";
/* $tables[] = "table2"; */

$operations = new Operations();
$select = $operations->select($arrSelect, $tables);
/* $res = $operations->runQuery($select);

foreach ($res as $key => $value) {
    var_dump($value);
    echo "<br>";
} */

$props = array();
$props["nome"] = "Jocleidson";
$props["linha"] = 20;
$update = $operations->update("materiais", $props);
$whereUpdate = array();
$whereUpdate[] = [
    "propName" => "id",
    "fieldValue" => 10,
    "isAnd" => false,
    "isNot" => true,
    /* "like" => true, */
    /* "pattern" => "%or%", */
    /* "isIn" => $arrSelect, */
  /*   "isBetween" => true,
    "first-comparative" => 30,
    "second-comparative" => 80, */
    /* "isAny" => $select,
    "isAll" => $select, */
    "exists" => $select,
];
/* $updateWhere = $operations->where($update, $whereUpdate);
var_dump($updateWhere); */
/* $res = $operations->runQuery($updateWhere);
var_dump($res); */

/* $delete = $operations->delete("materiais");
$delete = $operations->where($delete,$whereUpdate);
var_dump($delete);
var_dump($operations->runQuery($delete)); */

/* $insert = $operations->insert("materiais", $props);
var_dump($insert);
var_dump($operations->runQuery($insert)); */

/* $where = $operations->where($select, $arrWhere);
var_dump($where); */
/* $gbArr = array();
$gbArr[] = "nome";
$groupBy = $operations->select($arrSelect,$tables);
$groupBy = $operations->groupBy($groupBy,$gbArr);
var_dump($groupBy);

$res = $operations->runQuery($groupBy);

foreach ($res as $key => $value) {
    var_dump($value);
    echo "<br>";
} */

$in = $operations->where($select, $whereUpdate);
var_dump($in);
?>