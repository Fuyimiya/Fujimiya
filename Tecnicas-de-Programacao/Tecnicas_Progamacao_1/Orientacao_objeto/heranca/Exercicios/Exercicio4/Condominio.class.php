<?php
// Classe Condominio
class Condominio {
    private $dataGeracao;
    private $valor;
    private $dataPagamento;
    private $loja; // associação com Loja

    public function __construct($dataGeracao, $valor, $dataPagamento, Loja $loja) {
        $this->dataGeracao = $dataGeracao;
        $this->valor = $valor;
        $this->dataPagamento = $dataPagamento;
        $this->loja = $loja;
    }

    public function getDataGeracao() {
        return $this->dataGeracao;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getDataPagamento() {
        return $this->dataPagamento;
    }

    public function getLoja() {
        return $this->loja;
    }

    // Método para exibir os dados (sem var_dump)
    public function exibirDados() {
        echo "Data de Geração: " . $this->dataGeracao . "<br>";
        echo "Valor: R$ " . $this->valor . "<br>";
        echo "Data de Pagamento: " . $this->dataPagamento . "<br>";
        echo "Loja Número: " . $this->loja->getNumero() . "<br>";
        echo "Lotes: " . $this->loja->getLotes() . "<br>";
    }
}
?>