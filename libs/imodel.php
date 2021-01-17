<?php
    interface IModel2{
        
        public function save();
        public function getAll();
        public function get($id);
        public function delete($id);
        public function update();
        public function from($array); // no se que es esto
    }
?>