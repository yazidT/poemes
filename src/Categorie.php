<?php

namespace App;


class Categorie
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

    public function getAll( $pdo)
    {
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE deleted = 0 ORDER BY id ASC");
        $stmt->execute();
        $posts = $stmt->fetchAll();
        return $posts;
    }

    
    public function deleteCategorie( $pdo, $id)
    {
        $stmt = $pdo->prepare("UPDATE categories SET deleted = 1 WHERE id = ?  ");
        $stmt->execute(array($id));
    }


    public function addCategorie( $pdo, $value)
    {
        $stmt = $pdo->prepare("INSERT INTO `categories`( `nom`, `deleted`) VALUES (?,?) ");
        $stmt->execute(array($value,0));
    }



}