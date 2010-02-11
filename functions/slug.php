<?php
/** Return the string as slug
 * @author Carlos André Ferrari <carlos@ferrari.eti.br>
 * @param String $t
 * @return String
 */
function slug($t){
	$map = array(
		'/à|á|ã|â|ä|ª/' => 'a',
		'/è|é|ê|ẽ|ë/' => 'e',
		'/ì|í|î|ï/' => 'i',
		'/ò|ó|ô|õ|ø|°|º|ö/' => 'o',
		'/ù|ú|ũ|û|ü/' => 'u',
		'/ç/' => 'c',
		'/ñ/' => 'n',
		'/æ/' => 'ae',
		'/[^\w\s]/' => ' ',
		'/\s+/' => '-'
	);
	$t = preg_replace(array_keys($map), array_values($map), strtolower($t));
	return preg_replace('/^-+|-+$/','',$t);
}