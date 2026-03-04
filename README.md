# EduConnect 🎓 - Gestão Escolar Inteligente

O **EduConnect** é uma plataforma de gestão para Ensino Médio que utiliza o ecossistema Laravel para conectar Adminstração, Professores e Alunos, com foco futuro em predição de dados via Machine Learning.

## 🚀 Tecnologias Utilizadas
* **Framework:** [Laravel 12](https://laravel.com)
* **Painel Administrativo:** [Filament V5](https://filamentphp.com)
* **Autenticação:** [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits) (Blade/Tailwind)
* **Frontend:** [Tailwind CSS](https://tailwindcss.com) & [Vite](https://vitejs.dev)
* **Banco de Dados:** MySQL 

---

## 🛠️ Pré-requisitos
Antes de começar, você precisará ter instalado em sua máquina:
* PHP >= 8.2
* Composer
* Node.js & NPM
* Um servidor de banco de dados (MySQL, por exemplo)

---

## 📦 Passo a Passo para Instalação

Siga as instruções abaixo para clonar e rodar o projeto localmente:

### 1. Clonar o Repositório
```bash
git clone [https://github.com/donzzim/EduConnect.git](https://github.com/donzzim/EduConnect.git)
cd EduConnect
```

### 2. Instalar Dependências do PHP
```bash
composer install
```

### 3. Instalar Dependências do Frontend
```bash
npm install
```

### 4. Configurar o Ambiente
Copie o arquivo de exemplo e configure suas credenciais de banco de dados:
```bash
cp .env.example .env
```
Nota: Abra o arquivo .env e edite as linhas DB_DATABASE, DB_USERNAME e DB_PASSWORD conforme sua configuração local.

### 5. Gerar a Chave da Aplicação
```bash
php artisan key:generate
```

### 6. Rodar as Migrations e Seeders
```bash
php artisan migrate --seed
```

### 7. Criar o Link de Armazenamento
```bash
php artisan storage:link
```

## 🏃 Servindo a Aplicação

Para ver o projeto funcionando, você precisará de dois terminais rodando simultaneamente:

### Terminal 1 (PHP):
```bash
php artisan serve
```
### Terminal 2 (Vite/Assets):
```bash
npm run build
npm run dev
```
O projeto estará disponível em: http://localhost:8000
O painel administrativo em: http://localhost:8000/admin
