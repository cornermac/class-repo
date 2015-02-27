# animal-web-service
An home-grown JSON web service

All the code required to run on PHP enabled web server can be downloaded from GitHub at:
https://github.com/cornermac/class-repo/tree/master/A8WebService

A working demo page is at:
http://web-students.net/site13/A8WebService/


api.php is a sample API file to be called via AJAX to 
deliver the contents of 2 JSON files, one of which orders the 
animals by class, the other by diet.

The page can be called via AJAX either via GET or POST, using a variable 
named "cat": short for category

<code>
api.php?cat=diet
</code>

In the example above, the parameter cat is loaded with the string "diet" 
which will indicate to the API to load the JSON file containing 
diet sorted results.


index.htm is a sample site showing an example of consuming the data from the api.

First we get the user to choose a category (cat) by selecting one of two radio button options

		<p>Please choose the sort order of the animals returned</p>
		<input type="radio" name="animal_sort" value="diet">Sorted by Diet <br />
		<input type="radio" name="animal_sort" value="class">Sorted by Classification<br />
	The value of the radio button is passed to the ajax call as cat (category)

the ajax call sending the category (cat) to the api.php via GET...

$.ajax({  
		type: "GET",
		dataType: "json",  
		url: "api.php?cat=" + cat,
		success: animalJSON,
	});
	
The data is returned in JSON format

	{"title":"Animals by Diet","animals":[
	  {
		"Name":"Bald Eagle",
		"Classification":"Bird",
		"Habitat":"Land",
		"Diet":"Carnivore"
	  }
	  ]
	  }
	  
and is parsed back onto the web page by the function below.

	function animalJSON(data){
		//$('#output').text(JSON.stringify(data));  //uncomment to view raw output
		
			
		$.each(data.animals, function(i,item){
		
			var text = '<b>Name</b>: ' + item.Name + '<br />';
			text += '<b>Classification</b>: ' + item.Classification + '<br />';
			text += '<b>Habitat</b>: ' + item.Habitat + '<br />';
			text += '<b>Diet</b>: ' + item.Diet + '<br />';
			//text += '<div id="pic"><img src="thumbnails/' + item.Image + '" /></div>';
			$('<div></div>').html(text).appendTo('#creatures');  
		});
	}

Ted Morrill-McClure