<?php

include_once($_SERVER['DOCUMENT_ROOT']."/Phoneland/models/Model.php");
class NewsModel extends Model{
    public $id;
    public $admin_id;
    public $category_id;
    public $name;
    public $summary;
    public $avatar;
    public $content;
    public $status;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $created_at;
    public $updated_at;
    public function __construct(){
        parent::__construct();
    }
    public function getAll(){
        $query = "SELECT * FROM news";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getByID($id){
        $query = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function getByCategoryID($id){
        $query = "SELECT * FROM news WHERE category_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function create(){
        $query = "INSERT INTO news(admin_id, category_id, name, summary, content, status, seo_title, seo_descriotion, seo_keywords, updated_at)
        Value(:admin_id, :category_id, :name, :summary, :content, :status, :seo_title, :seo_description, :seo_keywords, :updated_at)";
        $stmt = $this->conn->prepare($query);

        $this->admin_id =  htmlspecialchars(strip_tags($this->admin_id));
        $this->category_id =  htmlspecialchars(strip_tags($this->category_id));
        $this->name =  htmlspecialchars(strip_tags($this->name));
        $this->summary =  htmlspecialchars(strip_tags($this->summary));
        $this->avatar =  htmlspecialchars(strip_tags($this->avatar));
        $this->content =  htmlspecialchars(strip_tags($this->content));
        $this->status =  htmlspecialchars(strip_tags($this->status));
        $this->seo_title =  htmlspecialchars(strip_tags($this->seo_title));
        $this->seo_keywords =  htmlspecialchars(strip_tags($this->seo_keywords));
        $this->seo_description =  htmlspecialchars(strip_tags($this->seo_description));
        $this->updated_at =  htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':admin_id', $this->admin_id);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':summary', $this->summary);
        $stmt->bindParam(':avatar', $this->avatar);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':seo_title', $this->seo_title);
        $stmt->bindParam(':seo_description', $this->seo_description);
        $stmt->bindParam(':seo_keywords', $this->seo_keywords);
        $stmt->bindParam(':updates_at', $this->updated_at);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function update($id){
        $query = "UPDATE news SET
            category_id = :category_id, 
            name = :name, 
            summary = :summary, 
            content = :content, 
            status = :status, 
            seo_title = :seo_title, 
            seo_descriotion = :seo_descriotion, 
            seo_keywords = :seo_keywords, 
            updated_at = :updated_at
            where id = :id
        ";
        $stmt = $this->conn->prepare($query);

        $this->category_id =  htmlspecialchars(strip_tags($this->category_id));
        $this->name =  htmlspecialchars(strip_tags($this->name));
        $this->summary =  htmlspecialchars(strip_tags($this->summary));
        $this->avatar =  htmlspecialchars(strip_tags($this->avatar));
        $this->content =  htmlspecialchars(strip_tags($this->content));
        $this->status =  htmlspecialchars(strip_tags($this->status));
        $this->seo_title =  htmlspecialchars(strip_tags($this->seo_title));
        $this->seo_keywords =  htmlspecialchars(strip_tags($this->seo_keywords));
        $this->seo_description =  htmlspecialchars(strip_tags($this->seo_description));
        $this->updated_at =  htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':summary', $this->summary);
        $stmt->bindParam(':avatar', $this->avatar);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':seo_title', $this->seo_title);
        $stmt->bindParam(':seo_description', $this->seo_description);
        $stmt->bindParam(':seo_keywords', $this->seo_keywords);
        $stmt->bindParam(':updates_at', $this->updated_at);
        if($stmt->execute()){
            return true;
        }
        return false;
    }
    public function delete($id){
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function search($query, $limit)
    {
        $sql = "SELECT * FROM news WHERE name LIKE :query LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':query', "%$query%", PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

}