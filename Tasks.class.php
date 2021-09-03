<?php

class Tasks extends Dbh {
    public function getTasks() {
        $sql = "SELECT * FROM tasks";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        }
    }

    public function addTask($task) {
        $sql = "INSERT INTO tasks (task) VALUES ('$task')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        header("location: {$_SERVER["HTTP_REFERER"]}");
    }

    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id={$id}";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        header("location: {$_SERVER["HTTP_REFERER"]}");
    }
}