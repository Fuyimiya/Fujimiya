<?php
    class Decoracao{
        public function __construct(
            private string $descritivo = ""
        ){}
        //método get
        public function getDescritivo()
        {
            return $this->descritivo;
        }
        //método set
        public function setDescritivo($descritivo)
        {
            $this->descritivo = $descritivo;
        }
    }
?>