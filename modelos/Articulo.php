<?php
    class Articulo {
        private $conn;
        private $table="articulos";

        public function __construct($cx){
            $this->conn = $cx;
        }

        public function listar(){
            try {
                $qry = "select * from view_".$this->table;
                $st = $this->conn->prepare($qry);
                $st->execute();
                $rows = $st->fetchAll(PDO::FETCH_OBJ);
                return $rows;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function agregar ($titulo, $imagen, $texto, $usuario_id) {
            try {
                $qry = "INSERT INTO ".$this->table." (titulo, imagen, texto, usuario_id) values (:titulo, :imagen, :texto, :usuario_id)";
                $st = $this->conn->prepare($qry);
                $st->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $st->bindParam(':imagen', $imagen, PDO::PARAM_STR);
                $st->bindParam(':texto', $texto, PDO::PARAM_STR);
                $st->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
                $st->execute();
                //echo "<h1>".$qry."</h1>";
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }