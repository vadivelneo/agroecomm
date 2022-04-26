<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	
	//Page info
	protected $data = Array();
	protected $pageName = FALSE;
	protected $template = "main";
	protected $hasNav = TRUE;
	//Page contents
	protected $javascript = array();
	protected $css = array();
	protected $fonts = array();
	//Page Meta
	protected $title = FALSE;
	protected $description = FALSE;
	protected $keywords = FALSE;
	protected $author = FALSE;
	
	function __construct()
	{	

		parent::__construct();
		$this->data["uri_segment_1"] = $this->uri->segment(1);
		$this->data["uri_segment_2"] = $this->uri->segment(2);
		$this->title = $this->config->item('site_title');
		$this->description = $this->config->item('site_description');
		$this->keywords = $this->config->item('site_keywords');
		$this->author = $this->config->item('site_author');
		
		$this->pageName = strToLower(get_class($this));
	}
	 
	
	protected function _render($view) {
		//static
		$toTpl["javascript"] = $this->javascript;
		$toTpl["css"] = $this->css;
		$toTpl["fonts"] = $this->fonts;
		
		//meta
		$toTpl["title"] = $this->title;
		$toTpl["description"] = $this->description;
		$toTpl["keywords"] = $this->keywords;
		$toTpl["author"] = $this->author;
		
		//data
		$toBody["content_body"] = $this->load->view($view,array_merge($this->data,$toTpl),true);
		
		//nav menu
		if($this->hasNav){
			$this->load->helper("nav");
			$toMenu["pageName"] = $this->pageName;
			$toHeader["nav"] = $this->load->view("template/nav",$toMenu,true);
		}
		$toHeader["basejs"] = $this->load->view("template/basejs",$this->data,true);
		
		$toBody["header"] = $this->load->view("template/header",$toHeader,true);
		$toBody["footer"] = $this->load->view("template/footer",'',true);
		
		$toTpl["body"] = $this->load->view("template/".$this->template,$toBody,true);
		
		
		//render view
		$this->load->view("template/skeleton",$toTpl);
		
	}
	
	public function html2ascii($s)
	{
	 	// convert links
		 $s = preg_replace('/<a\s+.*?href="?([^\" >]*)"?[^>]*>(.*?)<\/a>/i','$2 ($1)',$s);
		 
		 // convert p, br and hr tags
		 $s = preg_replace('@<(b|h)r[^>]*>@i',"\n",$s);
		 $s = preg_replace('@<p[^>]*>@i',"\n\n",$s);
		 $s = preg_replace('@<div[^>]*>(.*)</div>@i',"\n".'$1'."\n",$s);  
		  
		 // convert bold and italic tags
		 $s = preg_replace('@<b[^>]*>(.*?)</b>@i','*$1*',$s);
		 $s = preg_replace('@<strong[^>]*>(.*?)</strong>@i','*$1*',$s);
		 $s = preg_replace('@<i[^>]*>(.*?)</i>@i','_$1_',$s);
		 $s = preg_replace('@<em[^>]*>(.*?)</em>@i','_$1_',$s);
		   
		 // decode any entities
		 $s = strtr($s,array_flip(get_html_translation_table(HTML_ENTITIES)));
		 
		 // decode numbered entities
		// $s = preg_replace('/&#(\d+);/e','chr(str_replace(";","",str_replace("&#","","$0")))',$s);
		 
		 // strip any remaining HTML tags
		 $s = strip_tags($s);
		 
		 // return the string
		return $s;
	}
	
}

