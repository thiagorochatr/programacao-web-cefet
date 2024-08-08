<?php

namespace Mma;

interface RepositorioLutador {
  public function adicionarLutador(\Lutador $lutador);
  public function removerLutador(int $id);
}

?>