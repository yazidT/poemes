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
    public function findCategoryName( $pdo, $id)
    {
        $stmt = $pdo->prepare("SELECT nom FROM categories WHERE id = ?  ");
        $stmt->execute(array($id));
        $name = $stmt->fetch();
        return $name['nom'];
    }


    public function getAll( $pdo)
    {
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE deleted = 0 ORDER BY id ASC");
        $stmt->execute();
        $cats = $stmt->fetchAll();
        return $cats;
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

    public function findCategorie( $pdo, $id)
    {
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute(array($id));
        $cat = $stmt->fetch();
        return $cat;
    }

    public function modifyCategorie( $pdo, $value, $id)
    {
        $stmt = $pdo->prepare("UPDATE categories SET nom = ? WHERE id = ?  ");
        $stmt->execute(array($value, $id));
    }

}