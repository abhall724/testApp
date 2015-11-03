<?php

namespace models;

class BaseModel
{
    protected $id;
    protected $created_at;
    protected $updated_at;

    protected $valuesMap = array();

    public function __construct($array = array())
    {
        if (!is_null($array)) {
            $this->valuesMap += array(
                'id' => 'id');
            foreach ($this->valuesMap as $propertyName => $fieldName) {
                if (isset($array[$fieldName])) {
                    $this->$propertyName = $array[$fieldName];
                }
            }
        }
    }
    
    public function toDatabaseArray()
    {
        $databaseArray = array();
        foreach ($this->valuesMap as $propertyName => $fieldName) {
            $databaseArray[$fieldName] = $this->$propertyName;
        }
        return $databaseArray;
    }
    
    public function getDatabaseNameFromProperty($propertyName)
    {
        return $this->valuesMap[$propertyName];
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCreatedAt($createdAt)
    {
       $this->created_at = $createdAt;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setUpdateAt($updateAt)
    {
        $this->updated_at = $updateAt;
    }

    public function getUpdateAt()
    {
        return $this->updated_at;
    }
}