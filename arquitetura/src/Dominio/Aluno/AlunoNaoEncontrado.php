<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\CPF;
use DomainException;

class AlunoNaoEncontrado extends DomainException
{
  public function __construct(CPF $cpf) {
    parent::__construct("Aluno com CPF $cpf não encontrado");
  }
}
