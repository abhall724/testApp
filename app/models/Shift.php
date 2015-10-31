<?php

namespace models;

class Shift extends BaseModel
{
    private $manager_id;
    private $employee_id;
    private $break;
    private $start_time;
    private $end_time;

    public function setManagerId($managerId)
    {
        $this->manager_id = $managerId;
    }

    public function getManagerId()
    {
        return $this->manager_id;
    }

    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    public function getBreak()
    {
        return $this->break;
    }

    public function getStartTime()
    {
        return $this->start_time;
    }

    public function getEndTime()
    {
        return $this->end_time;
    }
}
