<?php

namespace models;

class BaseModel
{
    protected $id;
    protected $created_at;
    protected $updated_at;

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