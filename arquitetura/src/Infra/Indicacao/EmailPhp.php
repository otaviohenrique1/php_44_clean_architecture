<?php

namespace Alura\Arquitetura\Infra\Indicacao;

use Alura\Arquitetura\Aplicacao\Indicacao\EnviaEmailIndicacao;
use Alura\Arquitetura\Dominio\Aluno\Aluno;

class EmailPhp implements EnviaEmailIndicacao
{
  public function enviaPara(Aluno $alunoIndicado): void {
    mail('usuario@email.com', 'Teste email', 'Teste de envio de email');
  }
  
}
