<?php
// O valor de rpm deve ser no mínimo zero (0) e valor máximo 6.000.
// Para o valor de marcha, -1 representa “ré”, 0 representa “ponto morto”, 1 representa “primeira marcha” e assim sucessivamente, até 5, que representa “quinta marcha”.
// Quando o carro estiver desligado, rpm e velocidadeEmKm devem ser 0.
// Quando estiver ligado e em ponto morto, rpm deve estar em 100. Um método acelerar() deve aumentar o rpm em 200, cada vez que for chamado, independente da marcha, respeitando o limite máximo.
// Um método desacelerar() deve fazer o mesmo, na proporção inversa, respeitando o limite mínimo.
// Se acelerar() for chamado com a marcha não estando em “ponto morto”, velocidade deve aumentar de 10 km vezes a marcha atual (ex., se tiver em segunda marcha, aumentará de 20 em 20 km). Considere que a ré aumente de 10 em 10 km. O desacelerar() deve ter comportamento similar, na proporção inversa de velocidade.
// Um método passarMarcha() deve receber a marcha desejada. Se for informada uma marcha não permitida, ele deve lançar uma exceção do tipo MarchaException, com a mensagem “Marcha não suportada”. Se tentar passar a marcha ré sem estar em ponto morto ou sem estar
// em primeira marcha com RPM abaixo de 2.000, uma exceção do tipo MarchaException deve ser lançada, com a mensagem “A caixa de marcha foi forçada. Engate ponto morto e repita a operação.”.
// Crie também um método subirMarcha(), que suba a marcha em 1, respeitando o limite máximo, sem excedê-lo e sem lançar exceção.
// Crie o método descerMarcha() que faça o mesmo, na direção inversa.
// Crie também os métodos ligar() e desligar(). O ligar() deve apenas mudar o estado do carro se o mesmo estiver desligado, fazendo mudar o rpm como já indicado. O desligar() deve fazer com que acelerar() perca seu comportamento. Crie métodos adicionais que informem os valores dos demais estados (atributos) do carro. O construtor deve receber apenas o modelo do mesmo.
class Carro {
  private string $modelo;
  private float $rpm;
  private int $marcha;
  private int $velocidadeEmKm;
  private bool $ligado;
  
}
?>

