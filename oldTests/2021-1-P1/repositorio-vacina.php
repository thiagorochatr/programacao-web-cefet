<?php

namespace vac;

interface RepositorioVacina {
  public function vacinas() : array;
  public function vacinaComId(int $id) : Vacina|null;
  public function atualizarVacima(Vacina $vacina) : void;
}

?>