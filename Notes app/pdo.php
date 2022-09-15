<?php


class Connection
{
    public \PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;port=3306;dbname=notes_app", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function getNotes()
    {
        $query = $this->pdo->prepare('SELECT * FROM note');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNodeById($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM note WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function addNote($note)
    {
        $query = $this->pdo->prepare('INSERT INTO note ( title, description) VALUES (?,?)');
        return $query->execute([$note['title'], $note['description']]);
    }

    public function updateNote($id, $note)
    {
        $query = $this->pdo->prepare('UPDATE note SET title = ?, description = ? WHERE id = ?');
        return $query->execute([$note['title'], $note['description'], $id]);
    }

    public function removeNote($id)
    {
        $query = $this->pdo->prepare('DELETE FROM note WHERE id = ?');
        return $query->execute([$id]);
    }
}
return new Connection();
