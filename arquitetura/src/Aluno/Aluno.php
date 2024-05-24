<?php

namespace Alura\Arquitetura\Aluno;

use Alura\Arquitetura\CPF;
use Alura\Arquitetura\Email;

class Aluno
{
  private CPF $cpf;
  private string $nome;
  private Email $email;
  private array $telefones;

  public static function comCpfNomeEEmail(string $cpf, string $nome, string $email): self
  {
    return new Aluno(
      new CPF($cpf),
      $nome,
      new Email($email)
    );
  }

  public function __construct(CPF $cpf, string $nome, Email $email) {
    $this->cpf = $cpf;
    $this->nome = $nome;
    $this->email = $email;
  }

  public function adicionarTelefone(string $ddd, string $numero): self
  {
    $this->telefones[] = new Telefone($ddd, $numero);
    return $this;
  }
}
