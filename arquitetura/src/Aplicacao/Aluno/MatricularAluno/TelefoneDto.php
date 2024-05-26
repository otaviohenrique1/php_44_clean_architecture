<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

class TelefoneDto
{
  public string $cpf;
  public string $ddd;
  public string $numero;

  public function __construct(
    string $cpf,
    string $ddd,
    string $numero
  ) {
    $this->cpf = $cpf;
    $this->ddd = $ddd;
    $this->numero = $numero;
  }
}
