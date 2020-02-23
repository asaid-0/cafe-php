<?php
    class user {
        private $id;
        private $name;
        //private $password;
        private $room;
        private $ext;
        private $imgPath;
        private $conn;

        public function __construct($id, $name, $room, $ext, $imgPath)
        {
            $this->$id = $id;
            $this->$name = $name;
            $this->$room = $room;
            $this->$ext = $ext;
            $this->$imgPath = $imgPath;
        }

        public function setID($id)
        {
            $this->$id = $id;
        }

        public function setName($name)
        {
            $this->$name = $name;
        }

        public function setRoom($room)
        {
            $this->$room = $room;
        }

        public function setExt($ext)
        {
            $this->$ext = $ext;
        }

        public function setImgPath($imgPath)
        {
            $this->$imgPath = $imgPath;
        }

        public function setConn($conn)
        {
            $this->$conn = $conn;
        }

        public function getId() 
        {
            return $this->$id;
        }

        public function getName() 
        {
            return $this->$name;
        }

        public function getRoom() 
        {
            return $this->$room;
        }

        public function getExt() 
        {
            return $this->$ext;
        }

        public function getImgPath() 
        {
            return $this->$imgPath;
        }

        public function getConn() 
        {
            return $this->$conn;
        }
    }
?>