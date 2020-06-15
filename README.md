# siguia-app

O SiGuia é o Guia de descanso do motorista. Nosso desafio é aumentar a oferta de pontos de descanso nas rodovias, conectando os motoristas aos melhores locais de parada e descanso. Para mais informações acesse: https://bit.ly/30IXPrE

Para rodar esse projeto, faça:

#### Instalando o projeto
```bash
$ docker-compose up
```

#### Instalando as dependências
```bash
$ docker-compose exec app ./docker/backend.install.sh
```

Se estiver no Linux ou Mac, a api poderá ser chamada por localhost:80, se Windows será 192.168.99.100:80
