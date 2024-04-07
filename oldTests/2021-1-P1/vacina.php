<?php

namespace vac;

class Vacina {
  private $id;
  private $nome;
  private $fabricante;
  private $doses;
  private $eficacia;
  private $eficaciaDelta;
  private $perdaMensal;

  public function __construct(
    $id = 0,
    $nome = '',
    $fabricante = '',
    $doses = 0,
    $eficacia = 0,
    $eficaciaDelta = 0,
    $perdaMensal = 0
  ) {
    $this->setId($id);
    $this->setNome($nome);
    $this->setFabricante($fabricante);
    $this->setDoses($doses);
    $this->setEficacia($eficacia);
    $this->setEficaciaDelta($eficaciaDelta);
    $this->setPerdaMensal($perdaMensal);
  }

  public function eficaciaAposMeses(int $meses, bool $delta = false) {
    $meses < 0 ? $meses = 0 : $meses;
    $r = 0;
    if ($delta) {
      $r = $this->eficaciaDelta - ($meses * $this->perdaMensal);
    } else {
      $r = $this->eficacia - ($meses * $this->perdaMensal);
    }
    return $r < 0 ? 0 : $r;
  }

  public function getId() {
    return $this->id;
  }
  function setId($id) {
    $this->id = $id;
  }
  public function getNome() {
    return $this->nome;
  }
  function setNome($nome) {
    $this->nome = $nome;
  }
  function getFabricante() {
    return $this->fabricante;
  }
  function setFabricante($fabricante) {
    $this->fabricante = $fabricante;
  }
  function getEficacia() {
    return $this->eficacia;
  }
  function setEficacia($eficacia) {
    $this->eficacia = $eficacia;
  }
  function getEficaciaDelta() {
    return $this->eficaciaDelta;
  }
  function setEficaciaDelta($eficaciaDelta) {
    $this->eficaciaDelta = $eficaciaDelta;
  }
  function getDoses() {
    return $this->doses;
  }
  function setDoses($doses) {
    $this->doses = $doses;
  }
  function getPerdaMensal() {
    return $this->perdaMensal;
  }
  function setPerdaMensal($perdaMensal) {
    $this->perdaMensal = $perdaMensal;
  }
};

$vac = new Vacina(
  0, 'CoviKiller', 'Acme S/A', 2, 0.95, 0.65, 0.05
);

echo $vac->eficaciaAposMeses(4, true);