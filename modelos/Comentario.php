<?php

class Comentario {
    private $table = "comentarios";
    private $conn;

    public function __construct($cx) {
        $this->conn = $cx;
    }

    public function listar($usuario_id, $rol_id) {
        try {
            $cad = "";
            if ($rol_id!=1) {
                $cad = " where prop_art = :usuario_id";
            }
            $qry = "select * from view_" . $this->table . $cad;
            $st = $this->conn->prepare($qry);
            if ($rol_id!=1) {
                $st->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
            }
            $st->execute();
            return $st->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getComentario ($id) {
        try {
            $qry = "select * from view_" . $this->table . " where id = :id";
            $st = $this->conn->prepare($qry);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            return  $st->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Excepción generada : " . $e->getMessage();
            return false;
        }
    }

    public function editarComentario ($estado, $id) {
        try {
            $qry = "update ". $this->table ." set estado = :estado where id = :id";
            $st = $this->conn->prepare($qry);
            $st->bindParam (':estado', $estado, PDO::PARAM_INT);
            $st->bindParam (':id', $id, PDO::PARAM_INT);
            $st->execute();
            return true;
        } catch (PDOException $e) {
            echo "ocurrio un error al editar el estado del comentario : " . $e->getMessage();
            return false;
        }
    }

    public function borrar ($id) {
        $qry = "delete from " . $this->table . " where id = :id";
        try {
            $st = $this->conn->prepare($qry);
            $st->bindParam (":id", $id, PDO::PARAM_STR);
            $st->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}