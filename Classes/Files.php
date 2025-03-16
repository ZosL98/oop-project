<?php
class Files extends Dbh {
    private $file;

    public function __construct($file = null)
    {
        $this->file = $file;
    }

    public function uploadImage() {
        $folder = "uploads/";
        $target = $folder . basename($this->file['name']);

        if ($this->file['type'] === 'image/png' || $this->file['type'] === 'image/jpeg') {
            if ($this->file['size'] > 0) {
                move_uploaded_file($this->file['tmp_name'], $target);

                if ($stm = $this->connect()->prepare("UPDATE uporabniki SET image = :img WHERE id = :id")) {
                    $stm->bindParam(":img", $this->file['name']);
                    $stm->bindParam(":id", $_SESSION['id']);
                    $stm->execute();
                    $stm = null;
                }

                print_r($this->file);
            }
        } else {
            echo "<p>File is not type png or jpeg</p><hr>";
        }
    }

    public function loadImage() {
        if ($stm = $this->connect()->prepare("SELECT image FROM uporabniki WHERE id = :id")) {
            $stm->bindParam(":id", $_SESSION['id']);
            $stm->execute();
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
            $stm = null;

            if ($result) {
                return $result[0]['image'];
            }
        }
    }
}