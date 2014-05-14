<?php

/*
*
*	Classe Youtube
*
*	@author Pedro Marcelo de Sá Alves
*	@version 1.0
*/

define('SEARCH_VIDEOS', 'http://gdata.youtube.com/feeds/api/videos');

class Youtube{

	/*
	*
	*	Versão da API de dados do Youtube
	*
	*	@since 1.0
	*/
	private $v = '2';
	
	/*
	*
	*	ID do usuário ou canal no Youtube
	*
	*	@since 1.0
	*/
	private $author = '';

	/*
	*
	*	Número máximo de vídeos que devem aparecer
	*
	*	@since 1.0
	*/
	private $max_results = '';

	/*
	*
	*	Parâmetro usado para que a API do Youtube
	*	rejeite ou não parâmetros inválidos	
	*
	*	@since 1.0
	*/
	private $strict = 'true';

	/*
	*
	*	Índice do primeiro vídeo da lista	
	*
	*	@since 1.0
	*/
	private $start_index = '1';

	/*
	*
	*	Formato do feed que será retornado
	*
	*	@since 1.0
	*/
	private $alt = 'atom';

	/*
	*
	*	Chamada da função de retorno
	*	OBS: Usado somente quando alt for
	*	json-in-script
	*
	*	@since 1.0
	*/
	private $callback = '';

	/*
	*
	*	Array que será usado para montar a consulta
	*
	*	@since 1.0
	*/
	private $array_query = array();


	/*
	*
	*	Método construtor
	*
	*	@since 1.0
	*/
	public function __construct() {}

	/*
	*
	*	Métodos de acesso para as variáveis
	*
	*	@since 1.0
	*/

	/* V */
	public function setV($v){ $this->v = $v; }
	public function getV(){ return $this->v; }

	/* AUTHOR */
	public function setAuthor($author){ $this->author = $author; }
	public function getAuthor(){ return $this->author; }

	/* MAX RESULTS */
	public function setMaxResults($max_results){ $this->max_results = $max_results; }
	public function getMaxResults(){ return $this->max_results; }

	/* STRICT */
	public function setStrict($strict){ $this->strict = $strict; }
	public function getStrict(){ return $this->strict; }

	/* START INDEX */
	public function setStartIndex($start_index){ $this->start_index = $start_index; }
	public function getStartIndex(){ return $this->start_index; }

	/* ALT */
	public function setAlt($alt){ $this->alt = $alt; }
	public function getAlt(){ return $this->alt; }

	/* CALLBACK */
	public function setCallback($callback){	$this->callback = $callback; }
	public function getCallback(){ return $this->callback; }

	/* ARRAY QUERY */
	public function getArrayQuery()
	{
		$this->buildArrayQuery();
		return $this->array_query;
	}

	/*
	*
	*	Função getUrl
	*
	*	Retorna a url dos dados
	*
	*	@since 1.0
	*/
	public function getUrl()
	{
		return SEARCH_VIDEOS . '?' . $this->buildQuery();
	}

	/*
	*
	*	Função buildArrayQuery
	*
	*	Monta a query em forma de array
	*
	*	@since 1.0
	*/
	private function buildArrayQuery()
	{
		$this->array_query = array(
			'v' => $this->v,
			'author' => $this->author,
			'max-results' => $this->max_results,
			'strict' => $this->strict,
			'start-index' => $this->start_index,
			'alt' => $this->alt,
			'callback' => $this->callback
		);
	}

	/*
	*
	*	Função buildQuery
	*
	*	Monta a query em forma de string
	*
	*	@since 1.0
	*/
	private function buildQuery()
	{
		$this->buildArrayQuery();

		$arr_q = $this->array_query;

		foreach ($arr_q as $key => $value) {
			if ($value == '') {
				unset($arr_q[$key]);
			}
		}

		return http_build_query($arr_q);
	}

	/*
	*
	*	Função getVideos
	*
	*	Retorna os vídeos conforme os parâmetros
	*	informados
	*
	*	@since 1.0
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

	/*
	*
	*	Função getVideosaAtom
	*
	*	Retorna os vídeos depois do parser feito
	*	no formato Atom
	*
	*	@since 1.0
	*/
	protected function getVideosAtom()
	{
		$query = $this->buildQuery();

		$curl = curl_init($this->getUrl());
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		$result = curl_exec($curl);
		curl_close($curl);

		$result = new SimpleXMLElement($result);

		$arr_result = array();

		foreach ($result->entry as $entry) {
			$media = $entry->children('http://search.yahoo.com/mrss/');
			$yt = $media->children('http://gdata.youtube.com/schemas/2007');

			$arr_result[] = array(
				'id' => $yt->videoid,
				'author' => $entry->author->name,
				'published' => $entry->published,
				'updated' => $entry->updated,
				'title' => $entry->title,
				'thumbnail' => 'http://i.ytimg.com/vi/' . $yt->videoid . '/hqdefault.jpg',
				'description' => $media->group->description,
				'category' => array(
					'name' => $media->group->category,
					'label' => $media->group->category->attributes()['label']
				)
			);
		}

		return $arr_result;
	}

	/*
	*
	*	Função getVideosRss
	*
	*	Retorna os vídeos depois do parser feito
	*	no formato RSS
	*
	*	@since 1.0
	*/
	protected function getVideosRss()
	{
		$query = $this->buildQuery();

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

			$arr_result[] = array(
				'id' => $yt->videoid,
				'author' => $item->author,
				'pubDate' => $item->pubDate,
				'updated' => $atom->updated,
				'title' => $item->title,
				'thumbnail' => 'http://i.ytimg.com/vi/' . $yt->videoid . '/hqdefault.jpg',
				'description' => $media->group->description,
				'category' => array(
					'name' => $media->group->category,
					'label' => $media->group->category->attributes()['label']
				)
			);
		}

		return $arr_result;
	}

	/*
	*
	*	Função getVideosJson
	*
	*	Retorna os vídeos depois do parser feito
	*	no formato Json
	*
	*	@since 1.0
	*/
	protected function getVideosJson()
	{
		$query = $this->buildQuery();
	}

	/*
	*
	*	Função getVideosJsonScript
	*
	*	Retorna os vídeos depois do parser feito
	*	no formato json-in-script
	*
	*	@since 1.0
	*/
	protected function getVideosJsonScript()
	{
		$query = $this->buildQuery();
	}
}