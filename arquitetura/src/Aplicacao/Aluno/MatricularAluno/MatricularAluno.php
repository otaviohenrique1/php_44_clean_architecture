<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;

class MatricularAluno
{
  public RepositorioDeAluno $repositorioDeAluno;

  public function __construct(RepositorioDeAluno $repositorioDeAluno = null) {
    $this->repositorioDeAluno = $repositorioDeAluno;
  }

  public function executa(MatricularAlunoDto $dados): void
  {
    $aluno = Aluno::comCpfNomeEEmail(
      $dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno
    );
    $this->repositorioDeAluno->adicionar($aluno);
  }
}
