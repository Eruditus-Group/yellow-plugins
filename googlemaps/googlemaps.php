<?php
// Googlemaps plugin, https://github.com/datenstrom/yellow-plugins/tree/master/googlemaps
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowGooglemaps
{
	const VERSION = "0.6.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("googlemapsZoom", "15");
		$this->yellow->config->setDefault("googlemapsStyle", "flexible");
	}
	
	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = null;
		if($name=="googlemaps" && $shortcut)
		{
			list($address, $zoom, $style, $width, $height) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($zoom)) $zoom = $this->yellow->config->get("googlemapsZoom");
			if(empty($style)) $style = $this->yellow->config->get("googlemapsStyle");
			$language = $page->get("language");
			$output = "<div class=\"".htmlspecialchars($style)."\">";
			$output .= "<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfTLtHsMnjg_1Mfg2yYLu6xvWl390IcFyJmgtHAw8TrLmlOzQ/viewform?embedded=true" width="640" height="900" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
</div>";
		}
		return $output;
	}
}

$yellow->plugins->register("googlemaps", "YellowGooglemaps", YellowGooglemaps::VERSION);
?>
