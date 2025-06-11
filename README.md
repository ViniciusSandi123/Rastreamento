# 📦 Rastreamento de Entregas

Aplicação fullstack (Laravel + Vue.js + MySQL) para rastreamento de entregas, com dados mockados.

---

## ⚙️ Requisitos

### 🪟 Windows

- [WSL 2](https://learn.microsoft.com/pt-br/windows/wsl/install)
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)

> Certifique-se de que o WSL e o Docker Desktop estejam **ativos e rodando** antes de executar os comandos.

### 🐧 Linux

- Docker Engine instalado
- Docker Compose Plugin (ou `docker-compose` binário)

```bash
# Exemplo para sistemas Debian/Ubuntu:
sudo apt update
sudo apt install docker.io docker-compose-plugin
```

> O serviço Docker deve estar ativo. Inicie-o com:
```bash
sudo systemctl start docker
```

---

## 🚀 Instruções para execução

### 1. Configuração do ambiente

Acesse a pasta:

```
.\Rastreamento\Backend
```

Edite o arquivo `.env` e ajuste a string de conexão com o banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=rastreamento
DB_USERNAME=root
DB_PASSWORD=1234
```

---

### 2. Inicialização via Docker

Acesse o diretório onde está localizado o `docker-compose.yml`:

```
.\Rastreamento
```

Execute os comandos abaixo para construir e subir os containers:

```bash
docker-compose build --no-cache
docker-compose up
```

> Isso irá criar e subir automaticamente os containers, instalar dependências e preparar o ambiente de desenvolvimento.

---

### 🐳 Containers criados

- `mysql`: banco de dados MySQL com os dados da aplicação.
- `rastreamento-app`: backend com Laravel (PHP).
- `rastreamento-frontend`: frontend com Vue.js.

---

### 📦 Funcionalidades automáticas ao iniciar

Ao subir o ambiente com Docker:

- As **migrations** e os **seeders** são executados automaticamente.
- Os dados mockados (localizados em `.\Rastreamento\Backend\app\Mocks`) são inseridos.
- Todas as dependências do Laravel e do Vue.js são instaladas.

---

## 🔗 Endpoints da API

- Buscar entregas por CPF:
  ```
  GET http://127.0.0.1:8000/api/entregas?cpf={cpf-do-destinatario}
  ```

- Detalhar entrega por ID:
  ```
  GET http://127.0.0.1:8000/api/entregas/{id-da-entrega}
  ```

### Exemplos:

- `http://127.0.0.1:8000/api/entregas?cpf=54795289042`
- `http://127.0.0.1:8000/api/entregas/02f7f23c-d4c2-44a2-b1e7-7b50be4a203b`

---

## 🌐 Acesso à aplicação

Frontend (com backend integrado):  
[http://localhost:5173/entrega](http://localhost:5173/entrega)

---

## 📁 Estrutura do projeto

```
Rastreamento/
├── Backend/              # Backend Laravel
├── Frontend/             # Frontend Vue.js
└── docker-compose.yml    # Orquestração com Docker
