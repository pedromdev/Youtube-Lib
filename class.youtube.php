<?php

/**
*
*	Classe Youtube
*
*	@author Pedro Marcelo de Sá Alves
*	@version 1.13.1
*/

define('SEARCH_VIDEOS', 'http://gdata.youtube.com/feeds/api/videos');
define('CHANNEL_VIDEOS', 'http://gdata.youtube.com/feeds/api/users/%username%/uploads');

class Youtube{

	/**
	*
	*	Versão da API de dados do Youtube
	*
	*	@since 1.0
	*	@var string
	*/
	private $v = '2';
	
	/**
	*
	*	ID do usuário ou canal no Youtube
	*
	*	@since 1.0
	*	@var string
	*/
	private $author = '';

	/**
	*
	*	Número máximo de vídeos que devem aparecer
	*
	*	@since 1.0
	*	@var int
	*/
	private $max_results = '';

	/**
	*
	*	Parâmetro usado para que a API do Youtube
	*	rejeite ou não parâmetros inválidos	
	*
	*	@since 1.0
	*	@var string
	*/
	private $strict = 'true';

	/**
	*
	*	Índice do primeiro vídeo da lista	
	*
	*	@since 1.0
	*	@var int
	*/
	private $start_index = '1';

	/**
	*
	*	Formato do feed que será retornado
	*
	*	@since 1.0
	*	@var string
	*/
	private $alt = 'atom';

	/**
	*
	*	Chamada da função de retorno
	*	OBS: Usado somente quando alt for
	*	json-in-script
	*
	*	@since 1.0
	*	@var string
	*/
	private $callback = '';

	/**
	*
	*	Recupera vídeos de uma categoria
	*	específica
	*
	*	@since 1.8
	*	@var string
	*/
	private $category = '';

	/**
	*
	*	String alfanumérica que identifica o seu aplicativo
	*
	*	@since 1.8
	*	@var string
	*/
	private $client = '';

	/**
	*
	*	Especifica que os vídeos devem estar disponíveis
	*	em um formato de vídeo específico
	*
	*	@since 1.8
	*	@var int
	*/
	private $format = '';

	/**
	*
	*	Chave do desenvolvedor
	*
	*	@since 1.8
	*	@var string
	*/
	private $key = '';

	/**
	*
	*	Restringe a pesquisa a vídeos que têm um local
	*	geográfico especificado nos seus metadados
	*
	*	@since 1.8
	*	@var string
	*/
	private $location = '';

	/**
	*
	*	Define uma área geográfica
	*
	*	@since 1.8
	*	@var string
	*/
	private $location_radius = '';

	/**
	*
	*	Restringe a pesquisa aos vídeos que possuem um título,
	*	uma descrição ou palavras-chave em um idioma específico
	*
	*	@since 1.8
	*	@var string
	*/
	private $lr = '';

	/**
	*
	*	Usado para ordenar a lista de vídeos
	*
	*	@since 1.8
	*	@var string
	*/
	private $orderby = '';

	/**
	*
	*	Usado para consulta de vídeos
	*
	*	@since 1.8
	*	@var string
	*/
	private $q = '';

	/**
	*
	*	Array que será usado para montar a consulta
	*
	*	@since 1.0
	*	@var array
	*/
	private $array_query = array();


	/**
	*
	*	Método construtor
	*
	*	@since 1.0
	*/
	public function __construct() {}

	/**
	*
	*	Métodos de acesso para as variáveis
	*
	*	@since 1.0
	*/

	/* V */
	public function setV($v)
	{
		if (intval($v) != 1 && intval($v) != 2)
		{
			$this->v = '2';
		}
		else
		{
			$this->v = $v;
		}
	}

	public function getV(){ return $this->v; }

	/* AUTHOR */
	public function setAuthor($author)
	{
		if (is_string($author))
		{
			$this->author = $author;
		}
		else
		{
			$this->author = '';
		}
	}

	public function getAuthor(){ return $this->author; }

	/* MAX RESULTS */
	public function setMaxResults($max_results)
	{
		if (!is_numeric($max_results))
		{
			$this->max_results = '25';
		}
		else
		{
			$this->max_results = intval($max_results);
		}
	}

	public function getMaxResults(){ return $this->max_results; }

	/* STRICT */
	public function setStrict($strict)
	{
		if (is_string($strict))
		{
			if ($strict != 'true' && $strict != 'false')
			{
				$this->strict = 'true';
			}
			else
			{
				$this->strict = $strict;
			}
		}
		else
		{
			$strict = http_build_query(array('key' => $strict));

			if ($strict == 'key=1')
			{
				$this->strict = 'true';
			}
			elseif ($strict == 'key=0')
			{
				$this->strict = 'false';
			}
			else
			{
				$this->strict = 'true';
			}
		}
		
	}

	public function getStrict(){ return $this->strict; }

	/* START INDEX */
	public function setStartIndex($start_index)
	{
		if (!is_numeric($start_index))
		{
			$this->start_index = '';
		}
		else
		{
			$this->start_index = intval($start_index);
		}
	}

	public function getStartIndex(){ return $this->start_index; }

	/* ALT */
	public function setAlt($alt)
	{
		$alt_arr = array('atom', 'rss', 'json', 'json-in-script');

		if (!in_array($alt, $alt_arr))
		{
			$this->alt = 'atom';
		}
		else
		{
			$this->alt = $alt;
		}
	}

	public function getAlt(){ return $this->alt; }

	/* CALLBACK */
	public function setCallback($callback){
		if (is_string($callback))
		{
			$this->callback = $callback;
		}
		else
		{
			$this->callback = '';
		}
	}

	public function getCallback(){ return $this->callback; }

	/* CATEGORY */
	public function setCategory($category){
		if (is_string($category))
		{
			$this->category = $category;
		}
		else
		{
			$this->category = '';
		}
	}

	public function getCategory(){ return $this->category; }

	/* CLIENT */
	public function setClient($client){
		if (is_string($client))
		{
			$this->client = $client;
		}
		else
		{
			$this->client = '';
		}
	}

	public function getClient(){ return $this->client; }

	/* FORMAT */
	public function setFormat($format){
		if (is_string($format))
		{
			$this->format = $format;
		}
		else
		{
			$this->format = '';
		}
	}

	public function getFormat(){ return $this->format; }

	/* KEY */
	public function setKey($key){
		if (is_string($key))
		{
			$this->key = $key;
		}
		else
		{
			$this->key = '';
		}
	}

	public function getKey(){ return $this->key; }

	/* LOCATION */
	public function setLocation($location)
	{
		if (preg_match('/^-?(?:\d+|\d*\.\d+),-?(?:\d+|\d*\.\d+)$/', $location))
		{
			$this->location = $location;
		}
		else
		{
			$this->location = '';
		}
	}

	public function getLocation(){ return $this->location; }

	/* LOCATION RADIUS */
	public function setLocationRadius($location_radius)
	{
		if (preg_match('/^(?:\d+|\d*\,\d+)(m|km|pés|mi)$/', $location_radius))
		{
			$this->location_radius = $location_radius;
		}
		else
		{
			$this->location_radius = '';
		}
	}

	public function getLocationRadius(){ return $this->location_radius; }

	/* LR */
	public function setLr($lr)
	{
		if (is_string($lr) && strlen($lr) == 2)
		{
			$this->lr = $lr;
		}
		else
		{
			$this->lr = '';
		}
	}

	public function getLr(){ return $this->lr; }

	/* ORDERBY */
	public function setOrderby($orderby)
	{
		$orderby_arr = array('relevance', 'published', 'viewCount', 'rating');

		if (!in_array($orderby, $orderby_arr))
		{
			$this->orderby = '';
		}
		else
		{
			$this->orderby = $orderby;
		}
	}

	public function getOrderby(){ return $this->orderby; }

	/* Q */
	public function setQ($q)
	{
		if (is_string($q))
		{
			$this->q = $this->escapeQuery($q);
		}
		else
		{
			$this->q = '';
		}
		
	}

	public function getQ(){ return $this->q; }

	/* ARRAY QUERY */
	public function getArrayQuery()
	{
		$this->buildArrayQuery();
		return $this->array_query;
	}

	/**
	*
	*	Função escapeQuery
	*
	*	Retorna a uma string conforme o padrão
	*	colocado pelo Youtube para consultas
	*
	*	@since 1.12.4
	*	@return String
	*/
	private function escapeQuery($q)
	{
		$escapes = array(
			' ' => '+',
			"\"" => '%22',
			'|' => '%7C'
		);

		return strtr($q, $escapes);
	}

	/**
	*
	*	Função getUrl
	*
	*	Retorna a url dos dados
	*
	*	@since 1.0
	*	@return String contendo a URL final
	*/
	public function getUrl()
	{
		return strtr(CHANNEL_VIDEOS, array('%username%' => $this->author)) . '?' . $this->buildQuery();
	}

	/**
	*
	*	Função buildArrayQuery
	*
	*	Monta a query em forma de array
	*
	*	@since 1.0
	*	@return Array dos parâmetros
	*/
	private function buildArrayQuery()
	{
		$this->array_query = array(
			'v' => $this->v,
			'max-results' => $this->max_results,
			'strict' => $this->strict,
			'start-index' => $this->start_index,
			'alt' => $this->alt,
			'callback' => $this->callback,
			'category' => $this->category,
			'client' => $this->client,
			'format' => $this->format,
			'key' => $this->key,
			'location' => $this->location,
			'location-radius' => $this->location_radius,
			'lr' => $this->lr,
			'orderby' => $this->orderby,
			'q' => $this->q
		);
	}

	/**
	*
	*	Função buildQuery
	*
	*	Monta a query em forma de string
	*
	*	@since 1.0
	*	@return String contendo a query
	*/
	private function buildQuery()
	{
		$this->buildArrayQuery();

		$arr_q = $this->array_query;

		foreach ($arr_q as $key => $value) {
			if ($value == '' || $value == null) {
				unset($arr_q[$key]);
			}
		}

		return http_build_query($arr_q);
	}

	/**
	*
	*	Função getVideoById
	*
	*	Retorna o vídeo conforme o ID informado
	*
	*	@since 1.9
	*	@return Retorna o vídeo de acordo com o ID informado
	*/
	public function getVideoById($video_id)
	{
		$result = file_get_contents(SEARCH_VIDEOS . '/' . $video_id);

		$result = new SimpleXMLElement($result);

		$arr_result = array();

		$media = $result->children('http://search.yahoo.com/mrss/');
		$yt = $media->children('http://gdata.youtube.com/schemas/2007');
		
		$category_label = $media->group->category->attributes();
			
		$arr_result = array(
			'id' => (string) $video_id,
			'author' => (string) $result->author->name,
			'published' => (string) $result->published,
			'updated' => (string) $result->updated,
			'title' => (string) $media->group->title,
			'thumbnail' => 'http://i.ytimg.com/vi/' . $video_id . '/mqdefault.jpg',
			'description' => (string) $media->group->description,
			'category' => array(
				'name' => (string) $media->group->category,
				'label' => (string) $category_label['label']
			)
		);

		return $arr_result;
	}
	
	/**
	*
	*	Função getVideos
	*
	*	Retorna os vídeos conforme os parâmetros
	*	informados
	*
	*	@since 1.0
	*	@return Retorna os vídeos de acordo com a consulta
	*/
	public function getVideos()
	{
		if ($this->alt == 'atom') {
			return $this->getVideosAtom();
		} elseif ($this->alt == 'rss') {
			return $this->getVideosRss();
		} elseif ($this->alt == 'json') {
			return $this->getVideosJson();
		} elseif ($this->alt == 'json-in-script') {
			return $this->getVideosJsonScript();
		} else {
			return false;
		}
	}

	/**
	*
	*	Função getVideosaAtom
	*
	*	Retorna os vídeos depois do parser feito
	*	no formato Atom
	*
	*	@since 1.0
	*	@return Resultado da consulta pelo formato Atom
	*/
	protected function getVideosAtom()
	{
		$this->buildQuery();
		
		$result = file_get_contents($this->getUrl());

		$result = new SimpleXMLElement($result);

		$arr_result = array();

		foreach ($result->entry as $entry) {
			$media = $entry->children('http://search.yahoo.com/mrss/');
			$yt = $media->children('http://gdata.youtube.com/schemas/2007');
			
			$category_label = $media->group->category->attributes();
			
			$arr_result[] = array(
				'id' => (string) $yt->videoid,
				'author' => (string) $entry->author->name,
				'published' => (string) $entry->published,
				'updated' => (string) $entry->updated,
				'title' => (string) $entry->title,
				'thumbnail' => 'http://i.ytimg.com/vi/' . $yt->videoid . '/mqdefault.jpg',
				'description' => (string) $media->group->description,
				'category' => array(
					'name' => (string) $media->group->category,
					'label' => (string) $category_label['label']
				)
			);
		}

		return $arr_result;
	}

	/**
	*
	*	Função getVideosRss
	*
	*	Retorna os vídeos depois do parser feito
	*	no formato RSS
	*
	*	@since 1.0
	*	@return Resultado da consulta pelo formato Rss
	*/
	protected function getVideosRss()
	{
		$this->buildQuery();

		$curl = curl_init($this->getUrl());
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		$result = curl_exec($curl);
		curl_close($curl);

		$result = new SimpleXMLElement($result);

		$arr_result = array();

		foreach ($result->channel->item as $item) {
			$media = $item->children('http://search.yahoo.com/mrss/');
			$atom = $item->children('http://www.w3.org/2005/Atom');
			$yt = $media->children('http://gdata.youtube.com/schemas/2007');
			
			$category_label = $media->group->category->attributes();
			
			$arr_result[] = array(
				'id' => (string) $yt->videoid,
				'author' => (string) $item->author,
				'pubDate' => (string) $item->pubDate,
				'updated' => (string) $atom->updated,
				'title' => (string) $item->title,
				'thumbnail' => 'http://i.ytimg.com/vi/' . $yt->videoid . '/mqdefault.jpg',
				'description' => (string) $media->group->description,
				'category' => array(
					'name' => (string) $media->group->category,
					'label' => (string) $category_label['label']
				)
			);
		}

		return $arr_result;
	}

	/**
	*
	*	Função getVideosJson
	*
	*	Retorna os vídeos depois do parser feito
	*	no formato Json
	*
	*	@since 1.0
	*	@return Resultado da consulta pelo formato Json
	*/
	protected function getVideosJson()
	{
		$this->buildQuery();

		$content = file_get_contents($this->getUrl());
		$json = json_decode($content);

		$arr_result = array();

		foreach ($json->feed->entry as $video) {
			$id = $video->{'media$group'}->{'yt$videoid'}->{'$t'};
			$arr_result[] = array(
				'id' =>  $id,
				'author' => $video->author[0]->name->{'$t'},
				'published' => $video->published->{'$t'},
				'updated' => $video->updated->{'$t'},
				'title' => $video->title->{'$t'},
				'thumbnail' => 'http://i.ytimg.com/vi/' . $id . '/mqdefault.jpg',
				'description' => $video->{'media$group'}->{'media$description'}->{'$t'},
				'category' => array(
					'name' => $video->{'media$group'}->{'media$category'}[0]->{'$t'},
					'label' => $video->{'media$group'}->{'media$category'}[0]->label
				)
			);
		}

		return $arr_result;
	}

	/**
	*
	*	Função getVideosJsonScript
	*
	*	Retorna os vídeos depois do parser feito
	*	no formato json-in-script
	*
	*	@since 1.0
	*	@return Resultado da consulta pelo formato json-in-script
	*/
	protected function getVideosJsonScript()
	{
		$this->buildQuery();
	}
}
