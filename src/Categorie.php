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



}