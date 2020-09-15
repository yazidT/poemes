<?php




class Post
{
    private $id;
    private $utiId;
    private $catId;
    private $contenu;
    private $auteur;
    private $date;
    private $pays;
    private $note;
    private $deleted;

    /**
     * Getters 
     */
    public function getID(){
        return $this->id;
    } 
    public function getUtiID(){
        return $this->utiId;
    } 
    public function getCatID(){
        return $this->catId;
    } 
    public function getContenu(){
        return $this->contenu;
    } 
    public function getAuteur(){
        return $this->auteur;
    } 
    public function getDate(){
        return $this->date;
    } 
    public function getPays(){
        return $this->pays;
    }
    public function getNote(){
        return $this->note;
    } 
    public function getDeleted(){
        return $this->deleted;
    } 



    /**
     * Setters 
     */

    public function setID(int $id){
        $this->id = $id;
    }
    public function setUtiID(int $utiId){
        $this->utiId = $utiId;
    }
    public function setCatID(int $catId){
        $this->catId = $catId;
    }  
    public function setContenu(string $contenu){
        $this->contenu = $contenu;
    } 
    public function setAuteur(string $auteur){
        $this->auteur = $auteur;
    } 
    public function setDate(string $date){
        $this->date = $date;
    } 
    public function setPays(string $pays){
        $this->pays = $pays;
    }
    public function setNote(int $note){
        $this->note = $note;
    } 
    public function setDeleted(bool $deleted){
        $this->deleted = $deleted;
    } 


    /**
     * Functions 
     */

    public function getAll( $pdo)
    {
        $stmt = $pdo->prepare("SELECT * FROM postes ORDER BY id ASC");
        $stmt->execute(array(2));
        $posts = $stmt->fetchAll();
        return $posts;
    }


}