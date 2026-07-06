# Sistema de Controle de Acesso - Santa Casa

Este projeto foi desenvolvido como teste prático para vaga de Desenvolvedor de Sistemas Júnior (Laravel).

## Descrição

O sistema permite o gerenciamento de usuários e controle de acesso baseado em perfis e permissões, centralizando a administração de acessos aos módulos internos da instituição.

---

## Tecnologias utilizadas

- Laravel 13
- PHP 8.3
- MySQL
- Bootstrap 5
- Laravel Breeze (autenticação)
- Spatie Laravel Permission
- Laragon

---

## Autenticação

O sistema utiliza autenticação padrão do Laravel Breeze com e-mail e senha.

---

## Perfis de usuário

### Administrador
- Gerencia usuários
- Gerencia permissões
- Não acessa módulos operacionais

### Colaborador
- Pode acessar módulos conforme permissões atribuídas:
  - Setores Hospitalares
  - Especialidades Médicas
  - Equipamentos
  - Unidades Assistenciais

---

## Funcionalidades

- Login e logout
- CRUD de usuários
- CRUD de permissões
- Atribuição de roles e permissões
- Uso do Spatie Laravel Permission para controle de acesso baseado em roles e permissions
- Proteção de rotas via middleware `role` e `permission`
- Bloqueio de rotas para usuários não autorizados

---

## Banco de dados

O projeto utiliza migrations e seeders.

### Usuário administrador padrão:

- Email: admin@santacasa.org.br  
- Senha: password

---

## Decisões técnicas

- Optei por Laravel Breeze para autenticação por ser uma solução leve, 
  bem integrada ao Laravel e adequada ao escopo do projeto.
- Utilizei Spatie Laravel Permission para gerenciar roles e permissions, 
  evitando reimplementar um sistema de RBAC do zero e aproveitando uma 
  solução testada pela comunidade.
- O controle de acesso às rotas foi implementado via middleware, 
  garantindo que o bloqueio ocorra mesmo em tentativas de acesso direto 
  pela URL, e não apenas na ocultação de menus.
- Reforcei a validação para impedir que o perfil Administrador receba 
  permissões de módulos operacionais, garantindo consistência mesmo 
  que a regra não estivesse explicitamente restrita na tela de atribuição.

---

## Suposições assumidas

- Interpretei "gerenciamento de permissões" como a atribuição das 
  permissões de módulo já existentes a cada usuário, e não como CRUD 
  livre de criação de novas permissões arbitrárias, já que os módulos 
  do sistema são fixos.

---


## Observação

O sistema foi desenvolvido priorizando clareza, separação de responsabilidades e aplicação prática de controle de acesso baseado em roles e permissões.

---


## Instalação

```bash
git clone <repo-url>
cd santa-casa-teste
composer install
npm install
cp .env.example .env
php artisan key:generate
```

### Configuração do banco de dados

Edite o arquivo `.env` com as credenciais do seu banco:

```
DB_DATABASE=santa_casa_teste
DB_USERNAME=root
DB_PASSWORD=
```

### Migrations e Seeders

```bash
php artisan migrate --seed
```

### Build dos assets e execução

```bash
npm run dev
php artisan serve
```

Acesse: `http://127.0.0.1:8000` ou a url exibida no seu terminal: php artisan serve

