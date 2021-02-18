<?php 
namespace Models;

require_once('libraries/database.php');

abstract class Model
{

    protected $pdo;

    protected $table;


    public function __construct()
    {
        $this->pdo = pdoConnect();
    }


     /**
     * Afficher un article selon son id .
     * @param $id
     */

    public function find(int $id)
    {
        
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
    
        $query->execute(['id' => $id]);

        $item = $query->fetch();

        return $item;
    }


    /**
     * Supprimer  dans la base de donnees
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void 
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }



     /**
     * Retourne la liste des artciles classes par date de creation 
     * 
     * @return array
     */
    public function findAll(?string $order = "") : array 
    {
        $sql = "SELECT * FROM {$this->table}";

        if($order) {
            $sql .= " ORDER BY " . $order;
        }
        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();

        return $articles;
    }
}