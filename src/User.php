<?php


class User
{
    private $id;
    private $nom;
    private $prenom;
    private $pseudo;
    private $email;
    private $passe;
    private $deleted =0;


    public function getID(){
        return $this->id;
    } 
    public function getNom(){
        return $this->nom;
    } 
    public function getPrenom(){
        return $this->prenom;
    } 
    public function getPseudo(){
        return $this->pseudo;
    } 
    public function getEmail(){
        return $this->email;
    }
    public function getPasse(){
        return $this->passe;
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
    public function setPrenom(string $prenom){
        $this->prenom = $prenom;
    } 
    public function setPseudo(string $pseudo){
        $this->pseudo = $pseudo;
    } 
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function setPasse(string $passe){
        $this->passe = $passe;
    } 
    public function setDeleted(bool $deleted){
        $this->deleted = $deleted;
    } 

    /**
     * Functions 
     */
    public function createUser($pdo)
    {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, pseudo, email, passe) VALUES (?,?,?,?,?)");
        $stmt->execute(array($this->nom, $this->prenom, $this->pseudo, $this->email, $this->passe));
    }


    public function getUser($pdo, $email)
    {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?  ");
        $stmt->execute(array($email));
        $user = $stmt->fetch();
        return $user;
    }

    public function checkEmail( $pdo, $email)
    {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?  ");
        $stmt->execute(array($email));

        $user = $stmt->fetch();
        return $user;
    }


    public function findUserName( $pdo, $id)
    {
        $stmt = $pdo->prepare("SELECT pseudo FROM utilisateurs WHERE id = ?  ");
        $stmt->execute(array($id));

        $name = $stmt->fetch();
        return $name['pseudo'];
    }




    public function getAll( $pdo)
    {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE deleted = 0 ORDER BY id DESC");
        $stmt->execute();
        $posts = $stmt->fetchAll();
        return $posts;
    }

    
    public function deleteUser( $pdo, $id)
    {
        $stmt = $pdo->prepare("UPDATE utilisateurs SET deleted = 1 WHERE id = ?  ");
        $stmt->execute(array($id));
    }


}