<?php
require_once "Itens.php";
require_once "Cliente.php";

/**
 * Classe Agenda
 * Representa a agenda de um cliente com vários itens (agendamentos)
 */
class Agenda {
    private $data;
    private $cliente;
    private $itens = [];

    public function __construct($data, Cliente $cliente) {
        $this->data = $data;
        $this->cliente = $cliente;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getCliente() {
        return $this->cliente;
    }

    // Adiciona item à agenda
    public function addItem(Itens $item) {
        $this->itens[] = $item;
    }

    public function getItens() {
        return $this->itens;
    }

    public function __toString() {
        $saida = "Agenda - Data: {$this->data}\n";
        $saida .= "Cliente: {$this->cliente}\n";
        $saida .= "Itens:\n";

        foreach ($this->itens as $item) {
            $saida .= " - {$item}\n";
        }

        return $saida;
    }
}