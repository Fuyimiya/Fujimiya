<?php
require_once "Servico.php";
require_once "Prestador.php";

/**
 * Classe Itens
 * Representa um item dentro da agenda (agendamento específico)
 */
class Itens {
    private $horario;
    private $status;
    private $servico;
    private $prestador;

    public function __construct($horario, $status, Servico $servico, Prestador $prestador) {
        $this->horario = $horario;
        $this->status = $status;
        $this->servico = $servico;
        $this->prestador = $prestador;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function setHorario($horario) {
        $this->horario = $horario;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getServico() {
        return $this->servico;
    }

    public function getPrestador() {
        return $this->prestador;
    }

    public function __toString() {
        return "Horário: {$this->horario} | Status: {$this->status}\n  {$this->servico}\n  {$this->prestador}";
    }
}