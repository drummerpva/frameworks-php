<?php
class Lista{
    private $db;
    public function __construct($db){
        $this->db = $db;
    }
    public function getLista(){
        $array = array();
        $sql = $this->db->query("SELECT * FROM lista");
        if($sql->rowCount()>0){
            $array = $sql->fetchAll();
        }
        
        
        return $array;
    }
    public function add($data){
        $sql = $this->db->prepare("INSERT INTO lista(nome,telefone) VALUES(:nome, :telefone)");
        $sql->bindValue(":nome",$data['nome']);
        $sql->bindValue(":telefone",$data['telefone']);
        $sql->execute();
    }
    public function getContato($id){
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM lista WHERE id = ?");
        $sql->execute(array($id));
        if($sql->rowCount()>0){
            $array = $sql->fetch();
        }
        return $array;
    }
    public function atualizar($data, $id){
        $sql = $this->db->prepare("UPDATE lista SET nome = :nome, telefone = :telefone WHERE id = :id");
        $sql->bindValue(":nome",$data['nome']);
        $sql->bindValue(":telefone",$data['telefone']);
        $sql->bindValue(":id",$id);
        $sql->execute();
    }
    public function apagar($id){
        $sql = $this->db->prepare("DELETE FROM lista WHERE id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
    }
    
    
}