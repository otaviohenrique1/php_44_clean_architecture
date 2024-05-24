<?php

namespace Alura\Arquitetura\Dominio\Aluno;

use Alura\Arquitetura\Dominio\CPF;
use Alura\Arquitetura\Dominio\Email;

class FabricaAluno
{
  private Aluno $aluno;

  public function comCpfEmailNome(string $numeroCpf, string $email, string $nome): self
  {
    $this->aluno = new Aluno(
      new CPF($numeroCpf),
      $nome,
      new Email($email)
    );
    return $this;
  }

  public function adcionaTelefone(string $ddd, string $numero): self
  {
    $this->aluno->adicionarTelefone($ddd, $numero);
    return $this;
  }

  public function aluno(): Aluno
  {
    return $this->aluno;
  }
}
