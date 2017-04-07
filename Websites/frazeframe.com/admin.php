<!--
	Fraze Frame admin page.
-->

<!DOCTYPE html>
<html>
  <head>
  	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fraze Frame | Admin</title>
    <link rel="stylesheet" type="text/css" href="css/admin-stylesheet.css">
    
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="js/underscore.js"></script>
    <script src="http://www.parsecdn.com/js/parse-1.2.13.min.js"></script>
    <script src="js/admin.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.5.0.min.js"></script>
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </head>

  <body>

    <!-- Admin App Interface -->

		<div class="container-fluid content-card">
	
			<h1>Admin Access</h1>
		
			<div class="edit-content">
				<form id="edit-content-form">
				</form>
			</div>
		
			<div class="content">
			</div>
		</div>

    <!-- Templates -->

    <script type="text/template" id="login-template">
    	<header id="header"></header>
      <div class="login">
        <form class="login-form">
          
          <div class="error" style="display:none"></div>
          
          <strong>
          	Looking for the Fraze Frame website?<br>
          	Visit our home page <a href="index.php">here</a>.<br>
          </strong>
          
          <br>
          <input class="form-item" type="text" id="login-username" placeholder="Admin" onclick="this.select();"/>
          <br><br>
          <input class="form-item" type="password" id="login-password" placeholder="Password" onclick="this.select();"/>
          <br><br>
          <button class="form-item button" id="login-button">Log In</button>
        </form>
      </div>
    </script>

<!-- Manage Game Template -->
    <script type="text/template" id="manage-game-template">

      <div id="user-info">
        Signed in as <%= Parse.User.current().escape("username") %> (<a href="#" class="log-out">Log out</a>)
      </div>
            
      <table id="categories-table">

				<button type="button" class="new-button" id="new-competition-button">Add Competition</button>
				
				<tr id="table-headers">
					<td>
						Prize
					</td>
					<td>
						Start and End Dates
					</td>
					<td>
						Categories
					</td>
					<td>
						Add and Edit
					</td>
				</tr>
				
      </table> 

      <div class="section">
      
				<script>
					var Competition = Parse.Object.extend("Competition");
					var query = new Parse.Query(Competition);
					query.include(["categories"]);
					query.descending(["startDate"]);
					query.find({
  						success: function(results) {
  						
   							// Do something with the returned Parse.Object values
    						for (var i = 0; i < results.length; i++) {
    						
    							// Get competition.
    							var competition = results[i];
    						
    							// Create the row item:
        					var rowItem = document.createElement('tr');
        					
        					// Create the column item.
        					var nameItem = document.createElement('td');
        					var dateItem = document.createElement('td');
        					var categoriesItem = document.createElement('td');
        					var buttonsItem = document.createElement('td');
        					
        					// Create text nodes for name, start date, and end date.
        					var nameNode = document.createTextNode(competition.get('name'));
        					var startDate = document.createTextNode(competition.get('startDate').toDateString());
        					var endDate = document.createTextNode(competition.get('endDate').toDateString());
        					
        					// Create 'calculate winner' button with object id data.
        					var calculateWinnerButton = document.createElement('BUTTON');
        					var calculateWinnerButtonText = document.createTextNode('Calculate Winner');
        					calculateWinnerButton.appendChild(calculateWinnerButtonText);
        					calculateWinnerButton.setAttribute("id", competition.id);
        					calculateWinnerButton.setAttribute("class", "calculate-winner-button");
        					
        					// Create edit button with object id data.
        					var editButton = document.createElement('BUTTON');
        					var editButtonText = document.createTextNode('edit');
        					editButton.appendChild(editButtonText);
        					editButton.setAttribute("id", competition.id);
        					editButton.setAttribute("class", "edit-competition-button");
        					
        					// Create 'add category' button with object id data.
        					var addCategoryButton = document.createElement('BUTTON');
        					var addCategoryButtonText = document.createTextNode('+');
        					addCategoryButton.appendChild(addCategoryButtonText);
        					addCategoryButton.setAttribute("id", competition.id);
        					addCategoryButton.setAttribute("class", "add-category-button");
        					
        					// Create elements for better start date / end date ui.
        					var lineBreak = document.createElement('br');
        					var startDateSpan = document.createElement('span');
        					startDateSpan.style.color = '#00CC00';
        					startDateSpan.appendChild(startDate);
        					var endDateSpan = document.createElement('span');
        					endDateSpan.style.color = '#FF0000';
        					endDateSpan.appendChild(endDate);
        					
        					// Set competition contents in columns.
        					nameItem.appendChild(nameNode);
        					dateItem.appendChild(startDateSpan);
        					dateItem.appendChild(lineBreak);
        					dateItem.appendChild(endDateSpan);
        					
        					// Create elements for better buttons ui.
        					buttonsItem.appendChild(addCategoryButton);
        					var lineBreak = document.createElement('br');
        					buttonsItem.appendChild(lineBreak);
        					buttonsItem.appendChild(editButton);
        					var lineBreak = document.createElement('br');
        					buttonsItem.appendChild(lineBreak);
        					buttonsItem.appendChild(calculateWinnerButton);
        					
        					// Create list of categories and add to row.
        					var categories = competition.get('categories');
        					var categoriesList = document.createElement('ol');
        					categoriesList.setAttribute("class", "categories-list");
        					if (categories.length > 0) {
        						for (var j = 0; j < categories.length; j++) {
        							// Create list item with category.
        							var category = categories[j];
        							var listItem = document.createElement('li');
        							var categoryName = document.createTextNode(category.get('name'));
        							listItem.appendChild(categoryName);
        							categoriesList.appendChild(listItem);
        						}
        					}
        					categoriesItem.appendChild(categoriesList);
        					        					
        					// Add columns to row.
        					rowItem.appendChild(nameItem);
        					rowItem.appendChild(dateItem);
        					rowItem.appendChild(categoriesItem);
        					rowItem.appendChild(buttonsItem);
        					
        					// Add competition to table.
        					document.getElementById('categories-table').appendChild(rowItem);
    						}
  						},
  						error: function(error) {
    					alert("Error: " + error.code + " " + error.message);
  					}
					});
				</script>   
    </script>

  </body>

</html>