<?php

namespace models;

class User extends BaseModel
{
    private $name;
    private $role;
    private $email;
    private $phone;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRole($role)
    {
        if ($role == "manager") {
            $this->role = $role;
        }

        $this->role = "employee";
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function isValid()
    {
        if (!empty($this->name) && !empty($this->id)) {
            if (!empty($this->phone) || !empty($this->email)) {
                return true;
            }
        }

        return false;
    }
}