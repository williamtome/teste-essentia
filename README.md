# Teste Essentia

Este repositório será usado para aplicar o teste técnico para a vaga de Desenvolvedor Fullstack para a empresa **Essentia**.

### Autor
William Weirich Tomé

### Tecnologias

* PHP 8.2
* Laravel 10
* Composer
* MySQL
* Docker
* HTML 5
* Bootstrap 5

### Passos para executar o projeto

- Criar arquivo `.env` a partir do arquivo `.env.example`

- Instale o Docker na sua máquina. Link para a instalação em [Windows](https://docs.docker.com/desktop/install/windows-install/), [Linux](https://docs.docker.com/desktop/install/linux-install/) ou [Mac](https://docs.docker.com/desktop/install/mac-install/)

- Execute via cmd:
  - `docker-compose up -d --build`

- Para entrar no container execute `docker exec -ti essentia_php /bin/bash`

- Executar via cmd dentro do container:
  - `composer install`
  - `php artisan key:generate`
  - `php artisan storage:link`
  - `php artisan migrate`
  - `php artisan db:seed`
  - `npm install`

- Buildar para processo de desenvolvimento execute via cmd dentro do container:
  - `npm run dev`

- Buildar para deploy execute via cmd dentro do container:
  - `npm run build`
