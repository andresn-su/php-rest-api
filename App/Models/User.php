<?php
namespace App\Models;

class User
{
    private static $table = 'user';

    public static function select($id) {
        $connPdo = new \PDO(DBDRIVE.':host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception('Nenhum usuário encontrado.');
        }
    }

    // seleciona todos os usuários
    public function selectAll(){
        $connPdo = new \PDO(DBDRIVE.':host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM '.self::$table;
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception('Nenhum usuário encontrado.');
        }
    }

    // insere um novo usuráio
    public function insert($data) {
        $connPdo = new \PDO(DBDRIVE.':host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'INSERT INTO '.self::$table.' (name, password, email) VALUES (:na, :pa, :em)';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':na', $data['name']);
        $stmt->bindValue(':pa', $data['password']);
        $stmt->bindValue(':em', $data['email']);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            return "Usuário inserido com sucesso!";
        } else {
            throw new \Exception('Falha ao inserir usuário.');
        }
    }

    // atualiza um usuráio
    public function update($id, $data) {
        $connPdo = new \PDO(DBDRIVE.':host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'UPDATE '.self::$table.' SET name = :na, email = :em WHERE id = :id';
        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':na', $data['name']);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':em', $data['email']);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            return "Usuário atualizado com sucesso!";
        } else {
            throw new \Exception('Falha ao atualizar usuário.');
        }
    }
}
