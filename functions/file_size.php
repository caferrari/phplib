<?php
/** Returns a human readable size format
 * @author Carlos André Ferrari <carlos@ferrari.eti.br>
 * @param Integer $size
 * @return String
 */
function file_size($size, $l=0){
	$t = array('b', 'Kb', 'Mb', 'Gb', 'Tb');
	while ($size >= 1024)
	{
		$l++;
		$size = $size / 1024;
	}
	$n = number_format($size, 2) . $t[$l];
	return preg_replace("@\.0+$@", '', $n);
}
