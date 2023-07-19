<?php
class Crud {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function selectAll($table) {
        $connection = $this->db->getConnection();
        // Exemple : sélectionnez toutes les lignes de la table spécifiée
        $query = "SELECT * FROM $table";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectOne($table, $id) {
        $connection = $this->db->getConnection();
        // Exemple : sélectionnez un utilisateur spécifique dans la table spécifiée
        $query = "SELECT * FROM $table WHERE id = :id";
        $statement = $connection->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return is_array($result) ? $result : null;
    }

    public function selectByField($table, $fields) {
        $connection = $this->db->getConnection();
        // Construction de la clause WHERE
        $where = '';
        $params = [];
        foreach ($fields as $field => $value) {
            if ($where !== '') {
                $where .= ' AND ';
            }
            $where .= "$field = :$field";
            $params[":$field"] = $value;
        }
        // Exemple : sélectionnez un utilisateur en fonction de plusieurs champs dans la table spécifiée
        $query = "SELECT * FROM $table WHERE $where";
        $statement = $connection->prepare($query);
        $statement->execute($params);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectByOneField($table, $field, $value) {
        $connection = $this->db->getConnection();
        // Exemple : sélectionnez un utilisateur en fonction d'un champ spécifique dans la table spécifiée
        $query = "SELECT * FROM $table WHERE $field = :value";
        $statement = $connection->prepare($query);
        $statement->bindValue(':value', $value);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectFieldWhereAnd($table, $fields) {
        $connection = $this->db->getConnection();
        // Construction de la clause WHERE
        $where = '';
        $params = [];
        foreach ($fields as $field => $value) {
            if ($where !== '') {
                $where .= ' AND ';
            }
            $where .= "$field = :$field";
            $params[":$field"] = $value;
        }
        // Exemple : sélectionnez un utilisateur en fonction de plusieurs champs dans la table spécifiée
        $query = "SELECT * FROM $table WHERE $where";
        $statement = $connection->prepare($query);
        $statement->execute($params);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectByFieldWhereOR($table, $fields) {
        $connection = $this->db->getConnection();
        // Construction de la clause WHERE
        $where = '';
        $params = [];
        foreach ($fields as $field => $value) {
            if ($where !== '') {
                $where .= ' OR ';
            }
            $where .= "$field = :$field";
            $params[":$field"] = $value;
        }
        // Exemple : sélectionnez des utilisateurs en fonction de plusieurs champs dans la table spécifiée
        $query = "SELECT * FROM $table WHERE $where";
        $statement = $connection->prepare($query);
        $statement->execute($params);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insert($table, $data) {
        $connection = $this->db->getConnection();

        // Construction de la liste des colonnes et des valeurs
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        // Construction de la requête d'insertion
        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $statement = $connection->prepare($query);

        // Exécution de la requête avec les valeurs fournies
        $statement->execute($data);

        // Retourne l'ID de la dernière ligne insérée
        return $connection->lastInsertId();
    }

    public function update($table, $data, $condition) {
        $connection = $this->db->getConnection();

        // Construction de la liste des colonnes à mettre à jour
        $set = '';
        $params = [];
        foreach ($data as $column => $value) {
            if ($set !== '') {
                $set .= ', ';
            }
            $set .= "$column = :$column";
            $params[":$column"] = $value;
        }

        // Construction de la clause WHERE
        $where = '';
        foreach ($condition as $column => $value) {
            if ($where !== '') {
                $where .= ' AND ';
            }
            $where .= "$column = :condition_$column";
            $params[":condition_$column"] = $value;
        }

        // Construction de la requête de mise à jour
        $query = "UPDATE $table SET $set WHERE $where";
        $statement = $connection->prepare($query);

        // Exécution de la requête avec les valeurs fournies
        $statement->execute($params);

        // Retourne le nombre de lignes affectées par la requête
        return $statement->rowCount();
    }

    public function deleteAll($table) {
        $connection = $this->db->getConnection();

        // Construction de la requête de suppression de toutes les données
        $query = "DELETE FROM $table";
        $statement = $connection->prepare($query);

        // Exécution de la requête
        $statement->execute();

        // Retourne le nombre de lignes affectées par la requête
        return $statement->rowCount();
    }

    public function delete($table, $condition) {
        $connection = $this->db->getConnection();

        // Construction de la clause WHERE
        $where = '';
        $params = [];
        foreach ($condition as $column => $value) {
            if ($where !== '') {
                $where .= ' AND ';
            }
            $where .= "$column = :$column";
            $params[":$column"] = $value;
        }

        // Construction de la requête de suppression
        $query = "DELETE FROM $table WHERE $where";
        $statement = $connection->prepare($query);

        // Exécution de la requête avec les valeurs fournies
        $statement->execute($params);

        // Retourne le nombre de lignes affectées par la requête
        return $statement->rowCount();
    }

    public function count($table, $condition = []) {
        $connection = $this->db->getConnection();

        // Construction de la clause WHERE
        $where = '';
        $params = [];
        foreach ($condition as $column => $value) {
            if ($where !== '') {
                $where .= ' AND ';
            }
            $where .= "$column = :$column";
            $params[":$column"] = $value;
        }

        // Construction de la requête de comptage
        $query = "SELECT COUNT(*) FROM $table";
        if (!empty($where)) {
            $query .= " WHERE $where";
        }

        // Exécution de la requête avec les valeurs fournies
        $statement = $connection->prepare($query);
        $statement->execute($params);

        // Retourne le nombre de lignes
        return $statement->fetchColumn();
    }


    public function selectWithLike($table, $patterns) {
        $connection = $this->db->getConnection();

        // Construction de la clause WHERE avec l'opérateur LIKE
        $where = '';
        $params = [];
        foreach ($patterns as $column => $pattern) {
            if ($where !== '') {
                $where .= ' OR ';
            }
            $where .= "$column LIKE :pattern_$column";
            $params[":pattern_$column"] = '%' . $pattern . '%';
        }

        // Construction de la requête de sélection
        $query = "SELECT * FROM $table WHERE $where";
        $statement = $connection->prepare($query);

        // Exécution de la requête avec les valeurs fournies
        $statement->execute($params);

        // Retourne les résultats de la requête
        return $statement->fetchAll(PDO::FETCH_ASSOC);

}








}
