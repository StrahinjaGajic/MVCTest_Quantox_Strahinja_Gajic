<?php

namespace App\Core;
use App\Core\Helpers\Helper;

class ORM {

    /**
     * Get all rows from the model
     *
     * @return mixed
     */
    public function all()
    {
        $query = $this->database->prepare("SELECT * FROM `{$this->table}`");
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Insert a new model into database
     *
     * @param array $fields
     * @return array
     */
    public function insert(array $fields)
    {
        $sql = "INSERT INTO `{$this->table}` (";
        $sql .= '`'.implode('`,`', array_keys($fields)).'`) VALUES(';
        $sql .= '"'.implode('","', $fields).'")';

        $query = $this->database->prepare($sql);
        $query->execute();

        return $fields;
    }
    
    /** 
     * Update single row
     *
     * @param string $table
     * @return Helper::sendSessionNotification
     */
    public function update(array $fields,int $id){
        
        $query = '';
        foreach($fields as $key => $data) {
            $query.= '`'.$key.'`='."'{$data}'".',';
        }
        $trimedQuery = rtrim($query,",");

        $sql = "UPDATE `{$this->table}` SET ";
        $sql .= $trimedQuery;
        $sql .= ' WHERE id='.$id;
        
        $stmt= $this->database->prepare($sql);
        
        $stmt->execute();

        return 'Success!';
    }

    /** 
     * Delete single row
     *
     * @param string $table
     * @return true
     */
    public function delete($id) {
        
        $sql = "DELETE FROM `{$this->table}`
        WHERE id = {$id}";

        $query = $this->database->prepare($sql);
        $query->execute();

        return true;
        
    }
}