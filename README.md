Youtube-Lib
===========

<b>Autor:</b> Pedro Marcelo de Sá Alves<br>
<b>E-mail:</b> pedromarcelodesaalves@gmail.com<br>
<b>Data de criação:</b> 14 de maio de 2014<br>
<b>Última atualização:</b> 16 de junho de 2014<br>
<b>Versão atual:</b> 1.10.1<br>

Biblioteca criada para o melhor funcionamento do parser de dados retirados do Youtube.

<table>
	<thead>
		<tr>
			<th colspan="4"><h2>Variáveis presentes</h2></th>
		</tr>
		<tr>
			<th>Variável</th>
			<th>Função</th>
			<th>Métodos de acesso</th>
			<th>Valores</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>v</b></td>
			<td>Especifica a versão da API que o  YouTube deve usar para manipular a solicitação da API.</td>
			<td>
				<ul>
					<li>setV(param)</li>
					<li>getV()</li>
				</ul>
			</td>
			<td>1, 2</td>
		</tr>
		<tr>
			<td><b>author</b></td>
			<td>Restringe a pesquisa a vídeos enviados por um usuário específico do YouTube.</td>
			<td>
				<ul>
					<li>setAuthor(param)</li>
					<li>getAuthor()</li>
				</ul>
			</td>
			<td>Strings</td>
		</tr>
		<tr>
			<td><b>max-results</b></td>
			<td>Especifica o número máximo de resultados que deve ser incluído no conjunto de resultados.</td>
			<td>
				<ul>
					<li>setMaxResults(param)</li>
					<li>getMaxResults()</li>
				</ul>
			</td>
			<td>Int</td>
		</tr>
		<tr>
			<td><b>strict</b></td>
			<td>Pode ser usado para instruir o YouTube a rejeitar uma solicitação da API se ela tiver parâmetros de solicitação inválidos.</td>
			<td>
				<ul>
					<li>setStrict(param)</li>
					<li>getStrict()</li>
				</ul>
			</td>
			<td>true (default), false</td>
		</tr>
		<tr>
			<td><b>start-index</b></td>
			<td>Especifica o índice do primeiro resultado encontrado que deve ser incluído no conjunto de resultados.</td>
			<td>
				<ul>
					<li>setStartIndex(param)</li>
					<li>getStartIndex()</li>
				</ul>
			</td>
			<td>Int</td>
		</tr>
		<tr>
			<td><b>alt</b></td>
			<td>Especifica o formato do feed a ser retornado.</td>
			<td>
				<ul>
					<li>setAlt(param)</li>
					<li>getAlt()</li>
				</ul>
			</td>
			<td>atom, rss, json, json-in-script</td>
		</tr>
		<tr>
			<td><b>callback</b></td>
			<td>Identifica a função de retorno de chamada para a qual a resposta à API será enviada. OBS: usado somente quando o parâmetro alt for json-in-script.</td>
			<td>
				<ul>
					<li>setCallback(param)</li>
					<li>getCallback()</li>
				</ul>
			</td>
			<td>Strings</td>
		</tr>
		<tr>
			<td><b>category</b></td>
			<td>Permite recuperar vídeos que estão em uma categoria específica ou que estão marcados com uma determinada palavra-chave ou tag de desenvolvedor.</td>
			<td>
				<ul>
					<li>setCategory(param)</li>
					<li>getCategory()</li>
				</ul>
			</td>
			<td>Strings</td>
		</tr>
		<tr>
			<td><b>client</b></td>
			<td>Uma string alfanumérica que identifica o seu aplicativo. O parâmetro client é um meio alternativo de especificar o seu ID de cliente.</td>
			<td>
				<ul>
					<li>setClient(param)</li>
					<li>getClient()</li>
				</ul>
			</td>
			<td>Strings</td>
		</tr>
		<tr>
			<td><b>format</b></td>
			<td>Especifica que os vídeos devem estar disponíveis em um formato de vídeo específico.</td>
			<td>
				<ul>
					<li>setFormat(param)</li>
					<li>getFormat()</li>
				</ul>
			</td>
			<td>Strings</td>
		</tr>
		<tr>
			<td><b>key</b></td>
			<td>Especifica a chave do desenvolvedor, uma string alfanumérica que identifica o desenvolvedor ou a empresa que faz uma solicitação à API.</td>
			<td>
				<ul>
					<li>setKey(param)</li>
					<li>getKey()</li>
				</ul>
			</td>
			<td>Strings</td>
		</tr>
		<tr>
			<td><b>location</b></td>
			<td>Restringe a pesquisa a vídeos que têm um local geográfico especificado nos seus metadados.</td>
			<td>
				<ul>
					<li>setLocation(param)</li>
					<li>getLocation()</li>
				</ul>
			</td>
			<td>Strings ('latitude,longitude')</td>
		</tr>
		<tr>
			<td><b>location-radius</b></td>
			<td>Define uma área geográfica, juntamente com o parâmetro <i>location</i>.</td>
			<td>
				<ul>
					<li>setLocationRadius(param)</li>
					<li>getLocationRadius()</li>
				</ul>
			</td>
			<td>Strings</td>
		</tr>
		<tr>
			<td><b>lr</b></td>
			<td>Restringe a pesquisa aos vídeos que possuem um título, uma descrição ou palavras-chave em um idioma específico.</td>
			<td>
				<ul>
					<li>setLr(param)</li>
					<li>getLr()</li>
				</ul>
			</td>
			<td>Strings (<a href="http://www.loc.gov/standards/iso639-2/php/code_list.php">
				códigos de idioma formados por duas letras e definidos pela ISO 639-1
			</a>)</td>
		</tr>
		<tr>
			<td><b>orderby</b></td>
			<td>Especifica o valor que será usado para ordenar os vídeos no conjunto de resultados da pesquisa.</td>
			<td>
				<ul>
					<li>setOrderby(param)</li>
					<li>getOrderby()</li>
				</ul>
			</td>
			<td>relevance, published, viewCount e rating</td>
		</tr>
		<tr>
			<td><b>q</b></td>
			<td>Especifica um termo de consulta de pesquisa. O YouTube pesquisará todos os metadados dos vídeos que corresponderem ao termo.</td>
			<td>
				<ul>
					<li>setQ(param)</li>
					<li>getQ()</li>
				</ul>
			</td>
			<td>Strings</td>
		</tr>
	</tbody>
</table>
<br>
Fonte: <a href="https://developers.google.com/youtube/2.0/developers_guide_protocol_api_query_parameters">
	YouTube API v2.0 – API Query Parameters
</a>

<h2>Exemplos</h2>

<b>Código</b>

```php
$youtube = new Youtube();

$youtube->setAuthor('darksk8erbmx');
$youtube->setMaxResults(4);
$youtube->setStartIndex(2);

print_r($youtube->getVideos());
```

<b>Saída</b>

<pre>
Array
(
    [0] => Array
        (
            [id] => 3t3Uiq_myEU
            [author] => Pedro Marcelo
            [published] => 2012-07-13T01:31:07.000Z
            [updated] => 2012-12-28T11:08:26.000Z
            [title] => Dragon Nest - xDNNx vs LSjow - Swordmaster vs Mercenario - Parte 1
            [thumbnail] => http://i.ytimg.com/vi/3t3Uiq_myEU/hqdefault.jpg
            [description] => Pvp basico da volta de LSjow (enferrujado)
            [category] => Array
                (
                    [name] => Games
                    [label] => Gaming
                )

        )

    [1] => Array
        (
            [id] => IvvuZsY71u4
            [author] => Pedro Marcelo
            [published] => 2013-08-18T13:32:49.000Z
            [updated] => 2014-01-05T09:58:08.000Z
            [title] => Assassin level 11 Dragon Nest
            [thumbnail] => http://i.ytimg.com/vi/IvvuZsY71u4/hqdefault.jpg
            [description] => 
            [category] => Array
                (
                    [name] => Games
                    [label] => Gaming
                )

        )

    [2] => Array
        (
            [id] => ANxrUvnKGHM
            [author] => Pedro Marcelo
            [published] => 2009-10-13T18:25:41.000Z
            [updated] => 2013-11-19T20:28:41.000Z
            [title] => Baldurs Gate Dark Alliance - By Pedro Dark
            [thumbnail] => http://i.ytimg.com/vi/ANxrUvnKGHM/hqdefault.jpg
            [description] => Chars do jogo, builds utilizadas e teste de build.
            [category] => Array
                (
                    [name] => Games
                    [label] => Gaming
                )

        )

    [3] => Array
        (
            [id] => CPTrBzssPDU
            [author] => Pedro Marcelo
            [published] => 2012-10-06T22:24:36.000Z
            [updated] => 2012-10-06T22:45:13.000Z
            [title] => xDNNx - Manticore Nest (Solo)
            [thumbnail] => http://i.ytimg.com/vi/CPTrBzssPDU/hqdefault.jpg
            [description] => 
            [category] => Array
                (
                    [name] => Games
                    [label] => Gaming
                )

        )

)
</pre>

<b>Código</b>

```php
$youtube = new Youtube();

$video = $youtube->getVideoById('3t3Uiq_myEU');

print_r($video);
```

<b>Saída</b>

<pre>
Array
(
    [id] => 3t3Uiq_myEU
    [author] => Pedro Marcelo
    [published] => 2012-07-13T01:31:07.000Z
    [updated] => 2012-12-28T11:08:26.000Z
    [title] => Dragon Nest - xDNNx vs LSjow - Swordmaster vs Mercenario - Parte 1
    [thumbnail] => http://i.ytimg.com/vi/3t3Uiq_myEU/hqdefault.jpg
    [description] => Pvp basico da volta de LSjow (enferrujado)
    [category] => Array
        (
            [name] => Games
            [label] => Gaming
        )

)
</pre>

<h2>Log de mudanças</h2>
<ul>
	<li>
		<h3>1.12.4</h3>
		<ul>
			<li>Método escapeuQuery adicionado para adição de códigos de escape</li>
			<li>Adicionando validação aos métodos de acesso</li>
		</ul>
	</li>
	<li>
		<h3>1.10.1</h3>
		<ul>
			<li>Parser dos dados em JSON completo: método getVideosJson</li>
			<li>Retirando as variáveis $query dos métodos de parser</li>
		</ul>
	</li>
	<li>
		<h3>1.9</h3>
		<ul>
			<li>Função getVideoById adicionada para recuperar um único vídeo pelo seu ID</li>
		</ul>
	</li>
	<li>
		<h3>1.8</h3>
		<ul>
			<li>
				Parâmetros adicionados: category, cliente, format, key, location, location-radius, lr,
				orderby, q
			</li>
			<li>Métodos de acesso para os novos parâmetros</li>
			<li>Parser dos valores para string nos métodos getVideos</li>
		</ul>
	</li>
	<li>
		<h3>1.0</h3>
		<ul>
			<li>Funcionalidade de recuperar vídeos no Youtube</li>
		</ul>
	</li>
</ul>
