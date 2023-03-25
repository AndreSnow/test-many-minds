<h1 align="center">Test Many Minds</h1>

   <p>
   
   - [Sobre](#sobre)
   - [Preview](#preview)
   - [Funcionalidades](#Funcionalidades)
   - [Como Usar](#como-usar)
   - [Como Contribuir](#como-contribuir)
   - [Licença](#licença)

   </p>

---

<h2 align="center">Sobre</h2>

Esse projeto foi desenvolvido no intuito de gerenciar um pequeno dashboard contendo produtos, colaboradores e consulta de compras;

Documentação no [postman](https://documenter.getpostman.com/view/14026033/2s93RNxueT)

<a href=""></a>

</p>

---

<h2 align="center">Preview</h2>

- Funcionamento da aplicação:

   <p align="center">
      <img src="https://i.ibb.co/hssSfqq/image.png" width="400" alt="Preview">
   </p>

- Modelagem do banco:
   <p align="center">
      <img src="https://i.ibb.co/hXfgb42/Captura-de-tela-2023-03-24-145809.png" alt="modelagem do banco tmm" border="0" width="400">
   </p>

---

<h2 align="center">Funcionalidades</h2>
   
- Exibir e alterar lista de produtos;
- Exibir e alterar lista de compras;
- Exibir e alterar lista de colaboradores, caso tenha permissão;
- Login na aplicação;

<h2 align="center">Como Usar</h2>

- Clone esse repositorio:

```sh
git clone https://github.com/AndreSnow/test-many-minds.git tmm
```

- Entrar no diretorio:

```sh
cd tmm
```

<h3> Com Docker </h3>

- Renomei o **.env.exemple** para **.env**
- Com docker, será necessário ter:

  - docker

- Inicialize o container:

```sh
docker compose up -d --build
```

- Entre no container **mysql_tmm** para inserir e criar o banco e as tabelas, lembrando que isso também pode ser feito pelo seu SGBD de preferência, apenas fazendo o import dos arquivos SQL, contidos [aqui](https://github.com/AndreSnow/test-many-minds/tree/master/sql), caso tenha feito o import dos arquivos, pule os próximos passos

```sh
docker exec -it mysql_tmm bash
```

- Acesse o MySQL

```sh
mysql -utest -p
```

- Abra os arquivos SQL, copie-os e cole-os dentro do seu container:

- Agora clique em => [projeto](localhost:88/index.php/) para acessar e faça login
  - user
  ```sh
  admin@admin.com
  ```
  - password
  ```sh
  KvmTest132
  ```

<h3>Sem Docker</h3>

- Sem o docker, será necessário ter:
  - PHP>=8.0
  - MySQL>=8.0

mude as configurações de conexão com o banco de dados em **config/database.php**

- Execute o servidor do PHP:

```sh
php -S localhost:8000
```

- Pode testar o backend pelo postman ou localmente, usando a rota:

```sh
localhost:8000/
```

---

<h2 align="center">Como Contribuir</h2>

- De um Fork no projeto.

- Crie uma nova branch com sua modificações:

```sh
git checkout -b my-feature
```

- Salve suas configurações e crie um commit dizendo com o que você contribuiu:

```sh
git commit -m "feature: My new feature"
```

- Nos envie:

```sh
git push origin my-feature
```

---

<h2 align="center">Licença</h2>

<p align="center">
   Este repositório está sob licença MIT. Você pode acessar o arquivo <a href="https://github.com/AndreSnow/test-many-minds/tree/master/sql">LICENSE</a> para mais detalhes. 😉
</p>

---

Esse projeto foi desenvolvido por **[@André Neves](https://www.linkedin.com/in/andré-n-922181a6/)**.

---

Se isso te ajudou, dê uma ⭐, isso vai me ajudar também!
😉

---

   <div align="center">

[![Linkedin Badge](https://img.shields.io/badge/-Andre%20Neves-292929?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/andr%C3%A9-n-922181a6/)](https://www.linkedin.com/in/andré-n-922181a6/)

   </div>
