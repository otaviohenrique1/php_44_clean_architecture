<?php

namespace Alura\Arquitetura\Infra\Aluno;

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Dominio\Aluno\Telefone;
use Alura\Arquitetura\Dominio\CPF;
use PDO;

class RepositorioDeAlunoComPdo implements RepositorioDeAluno
{
  private PDO $conexao;

  public function __construct(PDO $conexao) {
    $this->conexao = $conexao;
  }

  public function adicionar(Aluno $aluno): void {
    $sql = 'INSERT INTO alunos VALUES (:cpf, :nome, :email)';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue('cpf', $aluno->cpf());
    $stmt->bindValue('nome', $aluno->nome());
    $stmt->bindValue('email', $aluno->email());
    $stmt->execute();

    /** @var Telefone $telefone */
    foreach ($aluno->telefones() as $telefone) {
      $sql = 'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno)';
      $stmt = $this->conexao->prepare($sql);
    }
  }

  public function buscarPorCpf(CPF $cpf): Aluno {}

  public function buscarTodos(): array {}
}
