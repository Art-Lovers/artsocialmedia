<?php

$host = '132.145.243.252:23306';
$username = 'root';
$password = 'rootpassword';
$dbName = 'artsocialmedia';

$DATABASE_CONNECTION = mysqli_connect($host, $username, $password, $dbName)
    or die("Cannot connect to DB");

class DB
{
    public static function select($table, $filter = array(), $params = array(), $fields = '')
    {
        global $DATABASE_CONNECTION;

        foreach ($filter as $key => $value) {
            $filter[$key] = mysqli_real_escape_string($DATABASE_CONNECTION, $value);
        }

        if (empty($fields)) {
            $res = mysqli_query($DATABASE_CONNECTION, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.columns WHERE TABLE_NAME = '" . $table . "' and TABLE_SCHEMA = 'artsocialmedia'");
            while ($row = mysqli_fetch_assoc($res)) {
                $vals[] = $row;
            }
            foreach ($vals as $val) {
                $fields .= 'main.' . $val['COLUMN_NAME'] . ' as ' . $val['COLUMN_NAME'] . ',';
            }
            $fields = trim($fields, ',');
        } else {
            $fields = trim($fields);
        }


        $joins = '';
        if (isset($params['join']) && !empty($params['join'])) {
            foreach ($params['join'] as $joinOp) {
                $joins .= ' INNER JOIN ' . trim($joinOp['table']) . ' ' . trim($joinOp['alias'])
                    . ' ON main.' . trim($joinOp['localKey']) . ' = ' . trim($joinOp['alias']) . '.' . trim($joinOp['foreignKey']);

                foreach ($joinOp['fields'] as $joinFieldAlias => $joinField) {
                    $fields .= ',' . trim($joinOp['alias']) . '.' . $joinField . ' as ' . $joinFieldAlias;
                }
            }
        }

        if (isset($params['left join']) && !empty($params['left join'])) {
            foreach ($params['left join'] as $joinOp) {
                $joins .= ' LEFT JOIN ' . trim($joinOp['table']) . ' ' . trim($joinOp['alias'])
                    . ' ON main.' . trim($joinOp['localKey']) . ' = ' . trim($joinOp['alias']) . '.' . trim($joinOp['foreignKey']);

                foreach ($joinOp['fields'] as $joinFieldAlias => $joinField) {
                    $fields .= ',' . trim($joinOp['alias']) . '.' . $joinField . ' as ' . $joinFieldAlias;
                }
            }
        }

        $orderBy = '';
        if (isset($params['orderBy']) && !empty($params['orderBy'])) {
            $orderBy .= 'ORDER BY ';
            foreach ($params['orderBy'] as $field => $order) {
                $orderBy .= $field . ' ' . $order . ',';
            }
            $orderBy = trim($orderBy, ',');
        }

        $groupBy = '';
        if (isset($params['groupBy']) && !empty($params['groupBy'])) {
            $groupBy .= 'GROUP BY ' . $params['groupBy'];
        }

        $filterSql = 'WHERE ';
        if (!empty($filter)) {
            foreach ($filter as $field => $val) {
                $filterSql .= $field;
                if (is_array($val)) {
                    if ($val[0] == 'BETWEEN') {
                        $filterSql .= ' BETWEEN ' . $val[1] . ' AND ' . $val[2] . ',';
                    } else {
                        $filterSql .= ' ' . $val[0] . ' ' . $val[1];
                    }
                } else {
                    $filterSql .= " = '" . $val . "' AND ";
                }
            }
        }
        $filterSql .= "main.deleted = '0'";

        $limit = '';
        if (isset($params['limit']) && !empty($params['limit'])) {
            $limit .= 'limit ' . $params['limit'];
        }

        $sqlCommand = "SELECT " . $fields . " from `" . $table . "` main " . $joins . ' ' . $filterSql . ' ' . $groupBy . ' ' . $orderBy . ' ' . $limit;
        // echo $sqlCommand;
        $sqlOut = mysqli_query($DATABASE_CONNECTION, $sqlCommand);
        $output = array();
        while ($row = mysqli_fetch_assoc($sqlOut)) {
            $output[] = $row;
        }
        if (isset($params['se']) && $params['se'] === true) {
            if (isset($params['fetch']) && $params['fetch'] == 'value') {
                if (!empty($output[0])) {
                    return array_values($output[0])[0];
                } else
                    return null;
            } else {
                if (!empty($output[0])) {
                    return $output[0];
                } else
                    return null;
            }
        } else {
            if (isset($params['fetch']) && $params['fetch'] == 'array') {
                foreach ($output as $outs) {
                    $outputArray[] = array_values($outs);
                }
                return $outputArray;
            } else
                return $output;
        }
    }

    public static function addEntity($table, $values)
    {
        global $DATABASE_CONNECTION;

        foreach ($values as $key => $value) {
            $values[$key] = mysqli_real_escape_string($DATABASE_CONNECTION, $value);
        }

        $fields = '`' . $table . '`(';
        $vals = '(';
        foreach ($values as $key => $val) {
            $vals .= "'" . $val . "',";
            $fields .= "`" . $key . "`,";
        }
        $vals = trim($vals, ',') . ')';
        $fields = trim($fields, ',') . ')';

        $sqlCommand = "INSERT INTO " . $fields . " VALUES " . $vals;
        $sqlOut = mysqli_query($DATABASE_CONNECTION, $sqlCommand);

        return mysqli_insert_id($DATABASE_CONNECTION);
    }

    public static function convertValue($table, $fieldFrom, $value, $fieldTo, $filter = array())
    {
        global $DATABASE_CONNECTION;

        $value = mysqli_real_escape_string($DATABASE_CONNECTION, $value);

        $filterSql = '';
        if (!empty($filter)) {
            foreach ($filter as $field => $val) {
                $filterSql .= $field;
                if (is_array($val)) {
                    if ($val[0] == 'BETWEEN') {
                        $filterSql .= ' BETWEEN ' . $val[1] . ' AND ' . $val[2] . ',';
                    } else {
                        $filterSql .= ' ' . $val[0] . ' ' . $val[1];
                    }
                } else {
                    $filterSql .= " = '" . $val . "' AND ";
                }
                $filterSql = trim($filterSql, 'AND');
            }
        }
        $filterSql .= "AND deleted = '0'";

        $sqlCommand = "SELECT " . $fieldTo . " FROM " . $table . " WHERE " . $fieldFrom . " = '" . $value . "' " . $filterSql;
        $sqlOut = mysqli_query($DATABASE_CONNECTION, $sqlCommand);
        $output = array();
        while ($row = mysqli_fetch_assoc($sqlOut)) {
            $output[] = $row;
        }
        if (!empty($output[0])) {
            return array_values($output[0])[0];
        } else
            return null;
    }

    public static function TERMINATE_ENTITY($table, $filter)
    {
        global $DATABASE_CONNECTION;

        $filterSql = '';
        if (!empty($filter)) {
            foreach ($filter as $field => $val) {
                $filterSql .= $field;
                if (is_array($val)) {
                    if ($val[0] == 'BETWEEN') {
                        $filterSql .= ' BETWEEN ' . $val[1] . ' AND ' . $val[2] . ',';
                    } else {
                        $filterSql .= ' ' . $val[0] . ' ' . $val[1];
                    }
                } else {
                    $filterSql .= " = '" . $val . "' AND ";
                }
            }
            $filterSql = trim($filterSql, 'AND ');
        }

        $sqlCommand = "DELETE FROM " . $table . " WHERE " . $filterSql;
        $sqlOut = mysqli_query($DATABASE_CONNECTION, $sqlCommand);

        return mysqli_insert_id($DATABASE_CONNECTION);
    }

    public static function updateEntity($table, $filter, $values)
    {
        global $DATABASE_CONNECTION;

        foreach ($values as $key => $value) {
            $values[$key] = mysqli_real_escape_string($DATABASE_CONNECTION, $value);
        }

        $filterSql = 'WHERE ';
        if (!empty($filter)) {
            foreach ($filter as $field => $val) {
                $filterSql .= $field;
                if (is_array($val)) {
                    if ($val[0] == 'BETWEEN') {
                        $filterSql .= ' BETWEEN ' . $val[1] . ' AND ' . $val[2] . ',';
                    } else {
                        $filterSql .= ' ' . $val[0] . ' ' . $val[1];
                    }
                } else {
                    $filterSql .= " = '" . $val . "' AND ";
                }
            }
        }
        $filterSql .= "main.deleted = '0'";

        $fields = '`' . $table . '` main';
        $vals = '';
        foreach ($values as $key => $val) {
            $vals .= "`" . $key . "` = '" . $val . "',";
        }
        $vals = trim($vals, ',') . '';

        $sqlCommand = "UPDATE " . $fields . " SET " . $vals . $filterSql;
        // return $sqlCommand;
        $sqlOut = mysqli_query($DATABASE_CONNECTION, $sqlCommand);

        return mysqli_insert_id($DATABASE_CONNECTION);
    }

    public static function deleteEntityById($table, $id)
    {
        global $DATABASE_CONNECTION;

        $id = mysqli_real_escape_string($DATABASE_CONNECTION, $id);

        $res = mysqli_query($DATABASE_CONNECTION, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.columns WHERE TABLE_NAME = '" . $table . "' and TABLE_SCHEMA = 'artsocialmedia' limit 1");
        while ($row = mysqli_fetch_assoc($res)) {
            $vals[] = $row;
        }
        foreach ($vals as $val) {
            $idCol = $val['COLUMN_NAME'];
        }

        return DB::updateEntity($table, array($idCol => $id), array('deleted' => 1));

    }
}