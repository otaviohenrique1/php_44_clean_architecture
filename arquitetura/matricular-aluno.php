<?php

use Alura\Arquitetura\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Infra\Aluno\RepositorioDeAlunoEmMemoria;

require_once 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];


$aluno = Aluno::comCpfNomeEEmail($cpf, $nome, $email)->adicionarTelefone($ddd, $numero);

$repositorio = new RepositorioDeAlunoEmMemoria();
$repositorio->adicionar($aluno);

// php matricular-aluno.php "123.456.789-10" "Vinicius Dias" "email@exemple.com" "24" "999999999"