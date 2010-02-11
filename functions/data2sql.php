<?php
/** Retorna um tamanho de arquivo legivel
 * @author Carlos André Ferrari <carlos@ferrari.eti.br>
 * @param String $data
 * @return String
 */
function data2sql($data){
	return preg_replace("@^([0-9]{2})/([0-9]{2})/([0-9]{4})@", "$3-$2-$1", $data);
}