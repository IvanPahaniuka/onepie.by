<?php



function get_items() {

	return R::getAll("SELECT * FROM `pie`");

}