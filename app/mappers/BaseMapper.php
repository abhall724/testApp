<?php

namespace mappers;

class BaseMapper
{
    /**
     * PDO Interface object
     * @var \PDO
     */
    protected $PDO;
    
    protected $table;

    public function __construct(\PDO $PDO)
    {
        $this->PDO = $PDO;
    }

    /**
     * @param $table
     * @param \libraries\BaseObject $object
     * @return array
     */
    protected function prepareInsertSql(BaseObject $object)
    {
        $values = array();
        $insert = array();

        $fieldNames = "";
        $holders = "";

        foreach ($object as $key => $value) {
            if (!empty($value) && !is_object($value)) {
                $actualFieldName = $object->getDatabaseNameFromProperty($key);
                $fieldNames .= "$actualFieldName,";
                array_push($values, pg_escape_string(stripslashes($value)));
                $holders .= '?,';
            }
        }

        $trimmedHolders = rtrim($holders, ",");
        $trimmedFieldName = rtrim($fieldNames, ",");

        $sqlString = "INSERT INTO $this->table($trimmedFieldName) values($trimmedHolders)";

        $insert['sql'] = $sqlString;
        $insert['values'] = $values;

        return $insert;
    }

    /**
     *
     * @param \libraries\BaseObject $object
     * @return boolean
     */
    protected function doInsert(BaseObject $object)
    {
        $insert = $this->prepareInsertSql($object);

        $insertStmt = $this->PDO->prepare($insert['sql']);

        try {
            $insertStmt->execute($insert['values']);
            $id = $this->PDO->lastInsertId($this->table.'_seq');
            $object->setId($id);
            $response = true;
        } catch (\PDOException $e) {
            $response = false;
        }
        return $response;
    }

    /**
     *
     * @param \libraries\BaseObject $object
     * @return boolean
     */
    protected function doUpdate(BaseObject $object)
    {
        $update = $this->prepareUpdateSql($object);
        try {
            $statement = $this->PDO->prepare($update->sql);
            $result = $statement->execute($update->values);
        } catch (\PDOException $ex) {
            $result = false;
        }
        return $result;
    }

    /**
     *
     * @param \libraries\BaseObject $object
     * @return \libraries\PdoQueryData
     */
    private function prepareUpdateSql(BaseObject $object)
    {
        $rawValues = $object->toDatabaseArray();

        $result = new PdoQueryData();

        $fields = "";
        $result->values = array();
        foreach ($rawValues as $key => $value) {
            if ($key == "id") {
                continue;
            }
            $fields .= " ".$key." = ?,";
            $result->values[] = $value;
        }

        $result->sql = "UPDATE ".$this->table." SET ".$fields." WHERE id = ?";
        $result->values[] = $object->id;

        return $result;
    }

    protected function getCurrentUser()
    {
        return $_SESSION['username'];
    }
}