<?php

$host = 'localhost:23306';
$username = 'root';
$password = '';
$dbName = 'artsocialmedia';

$DATABASE_CONNECTION = mysqli_connect($host, $username, $password, $dbName) 
                or die("Cannot connect to DB");

class DB{
    public static function select($table, $filter = array(), $params = array(), $fields = ''){
        global $DATABASE_CONNECTION;
        if(empty($fields)){
            $res = mysqli_query($DATABASE_CONNECTION, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.columns WHERE TABLE_NAME = '". $table ."' and TABLE_SCHEMA = 'artsocialmedia'");
            while ($row=mysqli_fetch_assoc($res)){
                $vals[] = $row;
            }
            foreach($vals as $val){
                $fields .= 'main.' . $val['COLUMN_NAME'] . ' as ' . $val['COLUMN_NAME'] . ',';
            }
            $fields = trim($fields, ',');
        }
        else{
            $fields = trim($fields);
        }
        

        $joins = '';
        if(isset($params['join']) && !empty($params['join'])){
            foreach($params['join'] as $joinOp){
                $joins .= 'INNER JOIN ' . trim($joinOp['table']) . ' ' . trim($joinOp['alias']) 
                . ' ON main.' . trim($joinOp['localKey']) . ' = ' . trim($joinOp['alias']) . '.' . trim($joinOp['foreignKey']);

                foreach($joinOp['fields'] as $joinFieldAlias => $joinField){
                    $fields .= ',' . trim($joinOp['alias']) . '.' . $joinField . ' as ' . $joinFieldAlias;
                }
            }
        }

        $orderBy = '';
        if(isset($params['orderBy']) && !empty($params['orderBy'])){
            $orderBy .= 'ORDER BY ';
            foreach($params['orderBy'] as $field => $order){
                $orderBy .= $field . ' ' . $order . ',';
            }
            $orderBy = trim($orderBy, ',');
        }

        $groupBy = '';
        if(isset($params['groupBy']) && !empty($params['groupBy'])){
            $groupBy .= 'GROUP BY ' . $params['groupBy'];
        }

        $filterSql = '';
        if(!empty($filter)){
            $filterSql .= 'WHERE ';
            foreach($filter as $field => $val){
                $filterSql .= $field;
                if(is_array($val)){
                    if($val[0] == 'BETWEEN'){
                        $filterSql .= ' BETWEEN ' . $val[1] . ' AND ' . $val[2] . ',';
                    }
                    else{
                        $filterSql .= ' '. $val[0] .' ' . $val[1];
                    }
                }
                else{
                    $filterSql .= " = '" . $val . "' AND";
                }
            }
            $filterSql = trim($filterSql, 'AND');
        }

        $sqlCommand = "SELECT " . $fields . " from `" . $table . "` main " . $joins . ' ' . $filterSql . ' ' . $orderBy . ' ' . $groupBy;
        // return $sqlCommand;
        $sqlOut = mysqli_query($DATABASE_CONNECTION, $sqlCommand);
        $output = array();
        while ($row=mysqli_fetch_assoc($sqlOut)){
            $output[] = $row;
        }
        if(isset($params['se']) && $params['se'] === true){
            if(isset($params['fetch']) && $params['fetch'] == 'value'){
                if(!empty($output[0])){
                    return array_values($output[0])[0]; 
                }
                else return null;
            }
            else{
                if(!empty($output[0])){
                    return $output[0]; 
                }
                else return null;
            }
        }
        else{
            if(isset($params['fetch']) && $params['fetch'] == 'array'){
                foreach($output as $outs){
                    $outputArray[] = array_values($outs);
                }
                return $outputArray;
            }
            else return $output;
        }
    }

    public static function addEntity($table, $values){
        global $DATABASE_CONNECTION;

        $fields = '`' . $table . '`(';
        $vals = '(';
        foreach($values as $key => $val){
            $vals .= "'" . $val . "',";
            $fields .= "`" . $key . "`,";
        }
        $vals = trim($vals, ',') . ')';
        $fields = trim($fields, ',') . ')';

        $sqlCommand = "INSERT INTO " . $fields . " VALUES " . $vals;
        $sqlOut = mysqli_query($DATABASE_CONNECTION, $sqlCommand);

        return mysqli_insert_id($DATABASE_CONNECTION);
    }

    public static function convertValue($table, $fieldFrom, $value, $fieldTo, $filter = array()){
        global $DATABASE_CONNECTION;

        $value = mysqli_real_escape_string($DATABASE_CONNECTION, $value);

        $filterSql = '';
        if(!empty($filter)){
            $filterSql .= "and ";
            foreach($filter as $field => $val){
                $filterSql .= $field;
                if(is_array($val)){
                    if($val[0] == 'BETWEEN'){
                        $filterSql .= ' BETWEEN ' . $val[1] . ' AND ' . $val[2] . ',';
                    }
                    else{
                        $filterSql .= ' '. $val[0] .' ' . $val[1];
                    }
                }
                else{
                    $filterSql .= " = '" . $val . "' AND";
                }
            }
            $filterSql = trim($filterSql, 'AND');
        }

        $sqlCommand = "SELECT " . $fieldTo . " FROM " . $table . " WHERE " . $fieldFrom . " = '" . $value . "' " . $filterSql;
        $sqlOut = mysqli_query($DATABASE_CONNECTION, $sqlCommand);
        $output = array();
        while ($row=mysqli_fetch_assoc($sqlOut)){
            $output[] = $row;
        }
        if(!empty($output[0])){
            return array_values($output[0])[0]; 
        }
        else return null;
    }
}