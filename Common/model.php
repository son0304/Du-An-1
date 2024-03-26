<?php 

// CRUD -> Create/Read(Danh sách/Chi tiết)/Update/Delete
if (!function_exists('get_str_keys')) {
    function get_str_keys($data) {    
        $keys = array_keys($data);

        $keysTenTen = array_map(function ($key) {
            return "`$key`";
        }, $keys);

        return implode(',', $keysTenTen);
    }
}

if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data) {     
        $keys = array_keys($data);

        $tmp = [];
        foreach($keys as $key) {
            $tmp[] = ":$key";
        }
        
        return implode(',', $tmp);
    }
}

if (!function_exists('get_set_params')) {
    function get_set_params($data) {     
        $keys = array_keys($data);

        $tmp = [];
        foreach($keys as $key) {
            $tmp[] = "`$key` = :$key";
        }
        
        return implode(',', $tmp);
    }
}
///-----------------Thêm-------------
if (!function_exists('insert')) {
    function insert($tableName, $data = []) {
        try {
            $strKeys = get_str_keys($data);
            $virtualParams = get_virtual_params($data);

            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('insert_get_last_id_nguoi_dung')) {
    function insert_get_last_id_nguoi_dung($tableName, $data = []) {
        try {
            $strKeys = get_str_keys($data);
            $virtualParams = get_virtual_params($data);

            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();

            return $GLOBALS['conn']->lastInsertid_nguoi_dung();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
//------------------XEM DANH SÁCH--------------------------
if (!function_exists('listAll')) {
    function listAll($tableName) {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY id_nguoi_dung DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
//-------------Xem chi tiết------------------
if (!function_exists('showOne')) {
    function showOne($tableName, $id_nguoi_dung) {
        try {
            $sql = "SELECT * FROM $tableName WHERE id_nguoi_dung_nguoi_dung = :id_nguoi_dung_nguoi_dung LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id_nguoi_dung", $id_nguoi_dung);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
//-----------------SỬA---------------------------------
if (!function_exists('update')) {
    function update($tableName, $id_nguoi_dung, $data = []) {
        try {
            $setParams = get_set_params($data);

            $sql = "UPDATE $tableName SET $setParams WHERE id_nguoi_dung = :id_nguoi_dung";
            
            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->bindParam(":id_nguoi_dung", $id_nguoi_dung);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
//-------------------------XÓA------------------------------
if (!function_exists('delete')) {
    function delete($tableName, $id_nguoi_dung) {
        try {
            $sql = "DELETE FROM $tableName WHERE id_nguoi_dung = :id_nguoi_dung";
            
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id_nguoi_dung", $id_nguoi_dung);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

