<?php

function remove_accents($str) {
	$accented_caracter = array('á','à','ã','â','é','ê','í','ó','ô','õ','ú','ü','ç','ñ','Á','À','Ã','Â','É','Ê','Í','Ó','Ô','Õ','Ú','Ü','Ç','Ñ');
	$not_accented_caracter = array('a','a','a','a','e','e','i','o','o','o','u','u','c','n','A','A','A','A','E','E','I','O','O','O','U','U','C','N');

	return str_replace($accented_caracter, $not_accented_caracter, $str);
}

function replace_spaces_to_underline($str) {
	return str_replace(' ', '_', $str);
}

function turn_to_link($str) {
	$str = remove_accents($str);
	$str = replace_spaces_to_underline($str);
	
	return $str;
}

function replace_underline_to_spaces($str) {
	return str_replace('_', ' ', $str);
}

function remove_spaces($str) {
	return str_replace(' ', '', $str);
}

// generates name without special caracters and spaces
function default_password_generator($str) {
	$str = remove_accents($str);
	$str = strtolower($str);
	$str = replace_spaces_to_underline($str);
	
	return $str;
}

function create_client_folder($folder_name) {
	$folder_name = remove_accents($folder_name);
	$folder_name = strtolower($folder_name);
	$folder_name = replace_spaces_to_underline($folder_name);

	// generates folder name with the appropriate number
	$folder_number = 1;
	while (file_exists('clients/'.$folder_name.$folder_number)) {
		/* $folder_name = $folder_name . $folder_number; */
		$folder_number++;
	}
	// create the client's folder with apropriated name
	mkdir('clients/'.$folder_name.$folder_number) or die("Erro ao criar diretório.");
	$folder_name = $folder_name.$folder_number;
	
	return $folder_name;
}
?>