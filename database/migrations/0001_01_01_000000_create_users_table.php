<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Execute as migrações.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Cria uma coluna de id auto-incremento
            $table->string('name'); // Nome
            $table->string('cpf')->unique(); // CPF, deve ser único
            $table->string('contato'); // Contato
            $table->string('cidade'); // Cidade
            $table->string('email')->unique(); // Email, deve ser único
            $table->string('password'); // Senha
            $table->timestamps(); // Cria colunas created_at e updated_at
        });
    }

    /**
     * Reverte as migrações.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users'); // Remove a tabela se a migração for revertida
    }
}
