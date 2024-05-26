<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\AlunoNaoEncontrado;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Dominio\CPF;
use Exception;

class RepositorioDeAlunoEmMemoria implements RepositorioDeAluno
{
  private $alunos = [];

  public function adicionar(Aluno $aluno): void
  {
    $this->alunos[] = $aluno;
  }

  public function atualiza(Aluno $aluno): void
  {
    /* Arrumar */
    $index = array_search($aluno->cpf(), $this->alunos);
    array_replace($this->alunos, [
      $index => $aluno
    ]);
  }

  public function buscarPorCpf(CPF $cpf): Aluno
  {
    $alunoFiltrados = array_filter(
      $this->alunos,
      fn (Aluno $aluno) => $aluno->cpf() == $cpf
    );

    if (count($alunoFiltrados) === 0) {
      throw new AlunoNaoEncontrado($cpf);
    }

    if (count($alunoFiltrados) > 1) {
      throw new Exception();
    }

    return $alunoFiltrados[0];
  }
  public function buscarTodos(): array
  {
    return $this->alunos;
  }
}
