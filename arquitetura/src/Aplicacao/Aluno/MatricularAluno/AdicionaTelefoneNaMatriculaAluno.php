<?php

namespace Alura\Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Dominio\CPF;

class MatricularAluno
{
  public RepositorioDeAluno $repositorioDeAluno;

  public function __construct(RepositorioDeAluno $repositorioDeAluno = null) {
    $this->repositorioDeAluno = $repositorioDeAluno;
  }

  public function executa(TelefoneDto $dados): void
  {
    $cpf = new CPF($dados->cpf);
    $aluno = $this->repositorioDeAluno->buscarPorCpf($cpf);
    $aluno->adicionarTelefone($dados->ddd, $dados->numero);
    $this->repositorioDeAluno->atualiza($aluno);
  }
}
