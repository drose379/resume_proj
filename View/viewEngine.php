<?php

class viewEngine {
	protected $Template = '';
	protected $Content = array();

public function __construct( $tempFile ) {
	$this->Template = $tempFile;
}

public function attach( $key,$content ) {
	$this->Content[$key] = $content;
}

public function view() {
	extract($this->Content);
	$output = require $this->Template;
	return $output;
}

}