<?php

namespace Alura\Arquitetura;

use InvalidArgumentException;

class CPF
{
  private string $numero;

  public function __construct(string $numero)
  {
    // if ($this->validarCPF($numero) === false) {
    //   throw new InvalidArgumentException('CPF inválido!');
    // }

    $this->setNumero($numero);

    $this->numero = $numero;
  }

  private function setNumero(string $numero): void
  {
    $opcoes = [
      "options" => [
        "regexp" => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
      ]
    ];

    if (filter_var($numero, FILTER_VALIDATE_REGEXP, $opcoes) === false) {
      throw new InvalidArgumentException('CPF no formato inválido');
    }

    $this->numero = $numero;
  }

  public function __toString(): string
  {
    return $this->numero;
  }

  // private function validarCPF($cpf)
  // {
  //   // Remove caracteres não numéricos
  //   $cpf = preg_replace('/[^0-9]/', '', $cpf);

  //   // Verifica se o CPF tem 11 dígitos
  //   if (strlen($cpf) != 11) {
  //     return false;
  //   }

  //   // Verifica se todos os dígitos são iguais
  //   if (preg_match('/(\d)\1{10}/', $cpf)) {
  //     return false;
  //   }

  //   // Calcula os dígitos verificadores
  //   for ($t = 9; $t < 11; $t++) {
  //     $d = 0;
  //     for ($c = 0; $c < $t; $c++) {
  //       $d += $cpf[$c] * (($t + 1) - $c);
  //     }
  //     $d = ((10 * $d) % 11) % 10;
  //     if ($cpf[$c] != $d) {
  //       return false;
  //     }
  //   }

  //   return true;
  // }
}
