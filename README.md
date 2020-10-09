<p align="center">
    <a href="https://codemastersolucoes.com" target="_blank">
        <img data-testid="logo" src="https://cms-public-images.s3.amazonaws.com/logo.png">
    </a>
    <h1 align="center">Pacote simplificado para persistência de logs</h1>
</p>

[![License](https://poser.pugx.org/codemastersolutions/code-log/license)](https://github.com/codemastersolutions/code-log/blob/HEAD/LICENSE.md)
[![Latest Stable Version](https://poser.pugx.org/codemastersolutions/code-log/v)](//packagist.org/packages/codemastersolutions/code-log)
[![Latest Unstable Version](https://poser.pugx.org/codemastersolutions/code-log/v/unstable)](//packagist.org/packages/codemastersolutions/code-log)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/codemastersolutions/code-log.svg?style=flat-square)](https://packagist.org/packages/codemastersolutions/code-log)
![Run Tests](https://github.com/codemastersolutions/code-log/workflows/Run%20Tests/badge.svg?branch=main)

[![Total Downloads](https://poser.pugx.org/codemastersolutions/code-log/downloads)](//packagist.org/packages/codemastersolutions/code-log)
[![Monthly Downloads](https://poser.pugx.org/codemastersolutions/code-log/d/monthly)](//packagist.org/packages/codemastersolutions/code-log)
[![Daily Downloads](https://poser.pugx.org/codemastersolutions/code-log/d/daily)](//packagist.org/packages/codemastersolutions/code-log)

[![SonarCloud](https://sonarcloud.io/images/project_badges/sonarcloud-black.svg)](https://sonarcloud.io/dashboard?id=codemastersolutions_code-log)

[![Lines of Code](https://sonarcloud.io/api/project_badges/measure?project=codemastersolutions_code-log&metric=ncloc)](https://sonarcloud.io/dashboard?id=codemastersolutions_code-log)
[![Quality gate](https://sonarcloud.io/api/project_badges/quality_gate?project=codemastersolutions_code-log)](https://sonarcloud.io/dashboard?id=codemastersolutions_code-log)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=codemastersolutions_code-log&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=codemastersolutions_code-log)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=codemastersolutions_code-log&metric=security_rating)](https://sonarcloud.io/dashboard?id=codemastersolutions_code-log)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=codemastersolutions_code-log&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=codemastersolutions_code-log)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=codemastersolutions_code-log&metric=sqale_index)](https://sonarcloud.io/dashboard?id=codemastersolutions_code-log)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=codemastersolutions_code-log&metric=bugs)](https://sonarcloud.io/dashboard?id=codemastersolutions_code-log)

## Instalação

``` bash
composer require codemastersolutions/code-log
```

## Instruções de uso

``` php
use CodeMaster\CodeLog\Logging\Log;

//Log do tipo debug, para tratar errors
Log::debug('log', ['dados para análise']);

//Log do tipo error, registrar erros
Log::error('log', ['dados para análise']);

//Log do tipo info, para registrar eventos
Log::info('log', ['dados para análise']);

//Log do tipo success, para registrar eventos de sucesso
Log::success('log', ['dados para análise']);
```

Utilizando a facade para persistência de logs

``` php
use CodeMaster\CodeLog\Facades\CodeLog;

//Log do tipo debug, para tratar errors
CodeLog::debug('log', ['dados para análise']);

//Log do tipo error, registrar erros
CodeLog::error('log', ['dados para análise']);

//Log do tipo info, para registrar eventos
CodeLog::info('log', ['dados para análise']);

//Log do tipo success, para registrar eventos de sucesso
CodeLog::success('log', ['dados para análise']);
```

Utilizando o helper para persistência de logs

``` php
//Log do tipo debug, para tratar errors
codelog('log', ['dados para análise']);

/*** Explicitando o level do log ***/
//Log do tipo debug, para tratar errors
codelog('log', ['dados para análise'], Log::DEBUG);

//Log do tipo error, registrar erros
codelog('log', ['dados para análise'], Log::ERROR);

//Log do tipo info, para registrar eventos
codelog('log', ['dados para análise'], Log::INFO);

//Log do tipo success, para registrar eventos de sucesso
codelog('log', ['dados para análise'], Log::SUCCESS);
```

### Testes Automatizados

``` bash
composer test
```

ou

``` bash
./phpunit
```

### Testes Automatizados com Observabilidade de Alterações

``` bash
./phpunit-watcher
```

### Filtrando testes

``` bash
./phpunit-watcher --filter=nome-do-teste
```

## Creditos

- [CodeMaster Soluções](https://github.com/codemastersolutions)
- [Gilson Gabriel](https://github.com/gilsongabriel)

## Autor

- [Gilson Gabriel](https://github.com/gilsongabriel)

## Licença

MIT. Consulte o [Arquivo de licença](LICENSE.md) para obter mais informações.