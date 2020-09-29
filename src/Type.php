<?php



class Type
{
    private $id;
    private $nom;
    private $deleted;


    public function getID(){
        return $this->id;
    } 
    public function getNom(){
        return $this->nom;
    } 
    public function getDeleted(){
        return $this->deleted;
    } 




    public function setID(int $id){
        $this->id = $id;
    } 
    public function setNom(string $nom){
        $this->nom = $nom;
    } 
    public function setDeleted(bool $deleted){
        $this->deleted = $deleted;
    } 

    /**
     * Functions 
     */
    public function findTypeName( $pdo, $id)
    {
        $stmt = $pdo->prepare("SELECT nom FROM types WHERE id = ?  ");
        $stmt->execute(array($id));
        $name = $stmt->fetch();
        return $name['nom'];
    }


    public function getAll( $pdo)
    {
        $stmt = $pdo->prepare("SELECT * FROM types WHERE deleted = 0 ORDER BY id ASC");
        $stmt->execute();
        $types = $stmt->fetchAll();
        return $types;
    }

    
    public function deleteType( $pdo, $id)
    {
        $stmt = $pdo->prepare("UPDATE types SET deleted = 1 WHERE id = ?  ");
        $stmt->execute(array($id));
    }


    public function addType( $pdo, $value)
    {
        $stmt = $pdo->prepare("INSERT INTO types ( `nom`, `deleted`) VALUES (?,?) ");
        $stmt->execute(array($value,0));
    }

    public function findCategorie( $pdo, $id)
    {
        $stmt = $pdo->prepare("SELECT * FROM types WHERE id = ?");
        $stmt->execute(array($id));
        $type = $stmt->fetch();
        return $type;
    }

    public function modifyType( $pdo, $value, $id)
    {
        $stmt = $pdo->prepare("UPDATE types SET nom = ? WHERE id = ?  ");
        $stmt->execute(array($value, $id));
    }

}