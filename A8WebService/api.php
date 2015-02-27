<?php
 /**
 * api.php is a sample API file to be called via AJAX to 
 * deliver the contents of 2 JSON files, one of which orders the 
 * animals by class, the other by diet.
 *
 * The page can be called via AJAX either via GET or POST, using a variable 
 * named "cat": short for catagory
 *
 * <code>
 * api.php?cat=diet
 * </code>
 *
 * In the example above, the parameter cat is loaded with the string "diet" 
 * which will indicate to the API to load the JSON file containing 
 * diet sorted results.
 *
 *	Ted Morrill-McClure
 */

if(isset($_REQUEST['cat']))
{//check to be sure data has been transmitted via GET or POST
	switch($_REQUEST['cat'])
	{//determine contents of 'cat'
		case "class":
			include('data/animalsbyclass.js'); //use my class sorted list
			break;
		default:
			include('data/animalsbydiet.js'); //default orders by diet
	}
}else{//if not data sent, inform calling application
	echo "Incorrect parameter sent";
}
