# payment-gateway 0.0.1

![GitHub top language](https://img.shields.io/github/languages/top/beerandcode-oficial/payment-gateway)
![GitHub Release Date](https://img.shields.io/github/release-date/beerandcode-oficial/payment-gateway)
![GitHub issues](https://img.shields.io/github/issues/beerandcode-oficial/payment-gateway)
![GitHub pull requests](https://img.shields.io/github/issues-pr/beerandcode-oficial/payment-gateway)
![GitHub contributors](https://img.shields.io/github/contributors/beerandcode-oficial/payment-gateway)
![GitHub All Releases](https://img.shields.io/github/downloads/beerandcode-oficial/payment-gateway/total)
![GitHub](https://img.shields.io/github/license/beerandcode-oficial/payment-gateway)
<!-- ![GitHub last commit](https://img.shields.io/github/last-commit/beerandcode-oficial/payment-gateway) -->

An open source and free payment gateway for laravel created by Beer And Code Community


## DIRETRIZES DE CODIFICAÇÃO PAYMENT GATEWAY

### Referências:
- https://flowframework.readthedocs.io/en/stable/TheDefinitiveGuide/PartV/CodingGuideLines/PHP.html
- https://github.com/PhpGt/StyleGuide

Este guia descreve o estilo de codificação PHP para a colaboração no projeto Payment Gateway da comunidade Beer And Code.
É provável que desenvolvedores e equipes individuais tenham suas próprias visões fortes sobre determinados estilos de codificação, portanto esse conjunto de documentos deve ser visto como um guia, não um livro de regras. Dito isto, tudo o que está documentado aqui é a preferência dos desenvolvedores principais, portanto, considere os pontos antes de enviar solicitações pull requests (PR).
O objetivo deste documento é ajudar a orientar o estilo das contribuições de código para manter um estilo consistente no repositório, definir e justificar as decisões tomadas dentro dele. 

## VISÃO GERAL
O código de exemplo a seguir mostra uma visão geral do estilo proposto neste guia:
    <?php
    namespace FastFood\Page;
    
    use FastFood\Logic\OrderLogic;
    use FastFood\Menu\MenuFactory;
    use Vendor\Food\FoodOrderInterface;
    
    class OrderPage extends OrderLogic implements FoodOrderInterface {
        const TYPE_MAIN = "order-type-main";
        const TYPE_VEGETARIAN = "order-type-vegetarian";
        const TYPE_VEGAN = "order-type-vegan";
        const TYPE_GLUTENFREE = "order-type-glutenfree";
    
        private OtherClass $menu;
    
        public function go():void 
              {
            $this->menu = MenuFactory::create($_GET["type"]);
            $this->sampleMethod($this->menu->getName(), $this->menu->getSize());
            $output = $this->longMethodWithManyArgs(
                $this->getDefaultSize(),
                123,
                "example"
            );
        }
    
        private function sampleMethod(string $name, int $size = 0):void 
              {
            $maxSize = OtherClass::getMaxSize($name);
    
            if($size === 0) {
                $this->menu->fillEmpty(OtherClass::getDefault());
            }
            elseif($size > $maxSize) {
                $size = $maxSize;
            }
            else {
                switch($size) {
                case OtherClass::SIZE_INDIVIDUAL:
                    $this->menu->setStyle("individual");
                    break;
    
                case OtherClass::SIZE_FAMILY:
                    $this->menu->setStyle("family");
                    break;
    
                default:
                    $this->menu->setStyle(Menu::SIZE_DEFAULT);
                    break;
                }
            }
        }
    
        public function longMethodWithManyArgs(
            int $firstNumber,
            int $secondNumber = 0,
            string $exampleString = null
        ):Menu 
              {
            $duplicate = MenuFactory::create($this->menu->getType());
    
            if($duplicate->getSize() !== 0
            && $duplicate->name === $exampleString) 
                {
                return MenuFactory::createDefault();
            }
    
            return $duplicate;
        }
    }
## CONCEITOS DESTE GUIA DE ESTILO
Consulte uma lista com marcadores simplificada abaixo:

## CONCEITOS GERAIS
- A primeira linha de todos os arquivos .php deve ser exatamente "<?php"
- Nunca use a tag PHP de fechamento (?>)
- Nunca use tags curtas (short tags) do PHP
- Todos os arquivos devem usar apenas UTF-8, sem BOM
- Sempre use o fuso horário America/Sao_Paulo para armazenar data e hora
- Todo arquivo de biblioteca .php deve conter exatamente uma classe
- Todo arquivo de biblioteca .php deve ser livre de efeitos colaterais
- Em arquivos e códigos, use palavras no singular (por exemplo, item, stylesheet, user) em vez de palavras no plural
- Evite notação húngara, onde nomes de arquivos / variáveis que indicam seu tipo
- Use camelCase para nomear variáveis
- Nunca use variáveis globais
- Propriedades sempre devem ser declaradas
- As variáveis sempre devem ser declaradas no topo do bloco em que são usadas
- Evite usar a palavra-chave final, a menos que seja necessário
- Evite chamar funções no namespace global
- Os códigos de programação, variáveis e funções deverão ser escritos em inglês

## INDENTAÇÃO E ESPAÇO EM BRANCO
- Use 4 espaços ao invés de tabulação (PSR-12)
- Evite blocos de código com "dupla indentação" onde nenhuma indentação é necessária para facilitar a leitura
- Não deixe espaços em branco no final das linhas
- Seja o mais rigoroso possível para aplicar 80 linhas de caracteres

## CHAVES E COLCHETES
- As chaves de abertura DEVE seguir sua própria linha (PSR-12)
- As chaves de fechamento devem sempre ser colocadas no início de sua própria linha (PSR-12)
- Toda condicional if() deve conter chaves de abertura e fechamento, ainda que o corpo possua apenas 1 linha.
- Um nível de indentação deve ser aplicado dentro e somente dentro das chaves
- Os condicionais entre colchetes não devem obter indentação extra ao quebrar em linhas separadas
- Nunca deixe declarações condicionais sem restrições ou sem indentação

## ESPAÇOS
- Nenhum espaço extra deve ser colocado após uma palavra-chave da estrutura de controle ou nome da função
- Os colchetes de abertura não devem ter espaço depois; os colchetes de fechamento não devem ter espaço antes
- Vírgulas que separam listas de variáveis devem ter um espaço ou nova linha depois, sem espaço em branco antes
- Um espaço deve envolver operadores binários e ternários, mas não unários
- Um espaço deve envolver todos os operadores de tipo

## DIRETÓRIOS, ARQUIVOS E NAMESPACES
- Diretórios e arquivos devem ser mapeados para namespace ou web (view)
- Os espaços para nome devem ser mapeados para os caminhos de arquivo, conforme PSR-4
- Arquivos e diretórios devem estar em minúsculas com hífen onde não forem mapeados para namespace
- Os arquivos e diretórios mapeados para namespace devem usar UpperCamelCase
- Arquivos e diretórios mapeados na Web devem usar palavras em minúsculas e hifenizadas

## CLASSES
- Uma classe só deve ser carregada automaticamente - nunca use require ou include
- Constantes só devem ser declaradas em uma classe (deve atender somente à classe declarada)
- As constantes devem usar UPPERCASE_UNDERSCORED
- As propriedades devem usar $camelCase
- Os métodos devem usar camelCase()
- As classes devem ter todos ou nenhum membro estático
- Todos os parâmetros devem definir seu tipo sempre que possível
- Todos os métodos devem definir seu tipo de retorno sempre que possível
- Os métodos devem evitar ficar mais de 20-50 linhas

## COMENTÁRIOS
- Se possível evite comentários, pois um um bom código não precisa de comentários (se possível leia o livro Código Limpo)
- Para comentários embutidos, devem ser usados comentários com barra dupla (//)
- Comentários embutidos não devem ter indentação, começando na coluna 1
- Comentários embutidos podem abranger várias linhas, prefixadas com a barra dupla
- Os comentários de bloco devem ser usados apenas para fornecer documentação de classe e método na forma de blocos de documentos
- Os comentários, juntamente com os docblocks, devem ser esparsos e pesados para evitar documentação obsoleta

## ESTRUTURA DE DADOS
- As estruturas de dados que representam coleções devem ser acessíveis por array, collections e / ou iterables
- Estruturas de dados que representam itens individuais devem usar funções getter
- Arrays associativos devem ser usadas apenas para pares simples de valor-chave
- Mova arrays associativos para um object com getter / setter sempre que possível
- Classes estáticas devem ser usadas apenas quando verdadeiramente não tiverem estado

## PADRONIZAÇÃO EM MENSAGENS DE COMMIT (COMMIT SEM NTICO)
- A princípio vamos trabalhar apenas com feat (feature, novo recurso) e fix (hotfix, correção de problemas) 
- O título (primeira linha do commit) deverá estar no imperativo (adiciona) e não adicionado.
- A mensagem do commit deverá ser obrigatoriamente em português, conforme definido por todos em live
- O commit deverá seguir a seguinte estrutura:

        <tipo>[escopo opcional]: <descrição>
        <corpo opcional>
        <rodapé opcional>

Com base nisso, um commit de hotfix ficaria assim:
fix(containers/profile.php): ajusta o argumento da função getPaymentMethods

getPaymentMethods usava o tipo XPTO para receber argumento.
Agora recebe o argumento correto do tipo FOO.

Resolve a issue #132

OBS.: o escopo está opcional, pois quando for um novo recurso (feat) pode ser que entre vários arquivos, inviabilizando informar todos no escopo.

## ATENÇÃO ESPECIAL PARA NOMEAÇÃO DE CLASSES E NAMESPACES

### Nomeação incorreta de namespaces e classes

<table class="table">
    <thead>
        <tr>
            <th>
                Nome completo da classe 
            </th>
            <th>
                Nome não qualificado 
            </th>
            <th>
                Observações
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>\Neos\Flow\Session\Php </td>
            <td>Php</td>
            <td>A classe não é uma representação do PHP</td>
        </tr>
        <tr>
            <td>\Neos\Cache\Backend\File </td>
            <td>Php</td>
            <td>A classe não é uma representação do PHP</td>
        </tr>
        <tr>
            <td>\Neos\Flow\Session\Php </td>
            <td>File</td>
            <td>A classe não representa um arquivo!</td>
        </tr>
        <tr>
            <td>\Neos\Flow\Session\Interface </td>
            <td>Interface</td>
            <td>Não permitido, "Interface" é uma palavra-chave reservada</td>
        </tr>
        <tr>
            <td>\Neos\Foo\Controller\Default </td>
            <td>Default</td>
            <td>Não permitido, "Default" é uma palavra-chave reservada</td>
        </tr>
        <tr>
            <td>\Neos\Flow\Objects\Manager </td>
            <td>Manager</td>
            <td>Apenas "Manager" é muito confuso</td>
        </tr>
    </tbody>
</table>

### Nomeação correta de namespaces e classes

<table class="table">
    <thead>
        <tr>
            <th>
                Nome completo da classe
            </th>
            <th>
                Nome qualificado
            </th>
            <th>
                Observações
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>\Neos\Flow\Session\PhpSession</td>
            <td>PhpSession</td>
            <td>Essa é uma sessão PHP</td>
        </tr>
        <tr>
            <td>\Neos\Flow\Cache\Backend\FileBackend </td>
            <td>FileBackend</td>
            <td>Um arquivo de back-end</td>
        </tr>
        <tr>
            <td>\Neos\Flow\Session\SessionInterface </td>
            <td>SessionInterface</td>
            <td>Um controlador padrão</td>
        </tr>
        <tr>
            <td>\Neos\Foo\Controller\StandardController</td>
            <td>StandardController</td>
            <td>Não permitido, "Interface" é uma palavra-chave reservada</td>
        </tr>
        <tr>
            <td>\Neos\Flow\Objects\ObjectManager</td>
            <td>ObjectManager</td>
            <td>"ObjectManager" é mais claro</td>
        </tr>
        <tr>
            <td>\Neos\Flow\Objects\Manager </td>
            <td>Manager</td>
            <td>Apenas "Manager" é muito confuso</td>
        </tr>
    </tbody>
</table>

### “Edge cases” na nomeação de namespaces e classes

<table class="table">
    <thead>
        <tr>
            <th>
                Nome completo da classe
            </th>
            <th>
                Nome qualificado
            </th>
            <th>
                Observações
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>\Neos\Flow\Mvc\ControllerInterface</td>
            <td>ControllerInterface</td>
            <td>Conseqüentemente, a interface pertence a todos os controladores no sub namespace Controller</td>
        </tr>
        <tr>
            <td>\Neos\Flow\Mvc\Controller\ControllerInterface</td>
            <td></td>
            <td>Bem melhor!</td>
        </tr>
        <tr>
            <td>\Neos\Cache\AbstractBackend</td>
            <td>AbstractBackend</td>
            <td>O mesmo aqui: na realidade, essa classe pertence aos back-ends</td>
        </tr>
        <tr>
            <td>\Neos\Cache\Backend\AbstractBackend</td>
            <td></td>
            <td>Bem melhor!</td>
        </tr>
    </tbody>
</table>

Observação: Ao especificar nomes de classe para PHP, sempre faça referência ao espaço para nome global dentro do código no espaço de nomes usando uma barra invertida à esquerda. Ao fazer referência a um nome de classe dentro de uma string (por exemplo, dado ao método get do ObjectManager, em expressões pointcut ou em arquivos YAML), nunca use uma barra invertida à esquerda. Isso segue a noção nativa do PHP de nomes em strings sempre sendo vistos como totalmente qualificados.

## DIAS E HORÁRIOS DE REVISÃO
Toda terça-feira, das 20:00h as 21:00h

Canal do discord do Beer And Code (LIVES > payment gateway)

Discord: https://discord.gg/mhyKFgv
