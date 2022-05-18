<?php
require_once "Manager.php";
require_once "Pilote.php";


class PiloteManager extends Manager
{

    private $pilotes;

    public function addPilote($pilote)
    {
        $this->pilotes[] = $pilote;
    }

    public function getPilotes()
    {
        return $this->pilotes;
    }
    public function loadPilotes()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM conducteur");
        $req->execute();
        $myPilotes = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myPilotes as $pilote) {
            $p = new Pilote($pilote["id_conducteur"], $pilote["nom"], $pilote["prenom"]);
            $this->addPilote($p);
        }
    }

    public function newPiloteDB($nom, $prenom)
    {
        $req = "INSERT INTO conducteur (nom, prenom)
        VALUES (:nom, :prenom)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
        $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if ($result) {
            $pilote = new Pilote($this->getBdd()->lastInsertId(), $nom, $prenom);
            $this->addPilote($pilote);
        }
    }
}
