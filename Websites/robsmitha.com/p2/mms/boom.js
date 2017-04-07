// initialize random test variable 1-4
test = Math.floor((Math.random() * 4) + 1);
tiles = 0;
function Play(id){		
	
	// tile check
	if (id == test)
	{
		document.getElementById(id).style.backgroundColor = "red";
		alert("GAME OVER");
	}else 
	{
		document.getElementById(id).style.backgroundColor = "grey";
		tiles++
	}
	// check if win
	if (tiles == 3)
	{
		alert("You Win :)");
	}
}