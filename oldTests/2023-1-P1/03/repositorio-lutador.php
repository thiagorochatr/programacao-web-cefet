<?php

// Crie a interface que represente o repositório de lutadores.
// Abstração responsável por recuperar e manipular lutadores em algum meio de persistência - tal como um arquivo ou um banco de dados.
// Contenha métodos para:
// I) adicionar um lutador (objeto da classe Lutador) no meio de persistência;
// II) remover um lutador, a partir de um id forecido, do meio de persistência.

namespace Mma;

interface RepositorioLutador {
  public function adicionarLutador(\Lutador $lutador);
  public function removerLutador($id);

}

?>