/*    
    Program Name:  Photo Gallery Application
    Author: Rob Smitha  
    Date:   11/02/2016
    Filename: photos.js
 */


"use strict"; // interpret document contents in JavaScript strict mode

/* global variables */
var photoOrder = [1,2,3,4,5];
var figureCount = 3;

/*****************************************populateFigures() FUNCTION*************************************/
/* This method adds src values to img elements based on order specified in photoOrder array             */
/********************************************************************************************************/
function populateFigures() {
    var filename;
    var currentFig;
   
    if (figureCount == 3)
    {
        for ( var i = 1; i < 4; i++ ) // loop runs three times
        {
            filename = "images/IMG_0" + photoOrder[i] + "sm.jpg";
            currentFig = document.getElementsByTagName("img")[i - 1]; // elements with a 's' lol
            currentFig.src = filename;
        } // end loop
    } else
    {
        for ( var i = 0; i < 5; i++ )
        {
            filename = "images/IMG_0" + photoOrder[i] + "sm.jpg";
            currentFig = document.getElementsByTagName("img")[i];
            currentFig.src = filename;
        } // end loop
        
    } // end else


}//end of populateFigures function

/**********************************END OF populateFigures() FUNCTION*************************************/



/*********************************rightArrow() FUNCTION***************************************************/
/* This method shifts all images one figure to the right, and change values in photoOrder array to match */
/********************************************************************************************************/
function rightArrow() {
   for (var i = 0; i < 5; i++) {
      if ((photoOrder[i] + 1) === 6) {
         photoOrder[i] = 1;
      } else {
         photoOrder[i] += 1;
      }//end of else
      
      populateFigures();
      
   }//end of for loop
}//end of rightArrow Function

/***********************************END OF RIGHT ARROW FUNCTION******************************************/

/********************************leftArrow() Function****************************************************/
/*This method shifts all images one figure to the left, and change values in photoOrder array to match  */
/********************************************************************************************************/
function leftArrow() {
    for (var i = 0; i < 5; i++) {
        if ((photoOrder[i] - 1) === 0) {
            photoOrder[i] = 5;
        } else {
            photoOrder[i] -= 1;
        }//end of else
        
      populateFigures();
      
    }//end of for loop
}//end of leftArrow Function

/****************************END OF LEFT ARROW FUNCTION*************************************************/


/***************************************previewFive() Function******************************************/
/*           This method is executed to allow the photo gallery to shift to five image layout.         */
/******************************************************************************************************/
function previewFive() {
    
    var articleEl = document.getElementsByTagName("article")[0]; // locate first element
    
    var lastFigure = document.createElement("figure"); // create figure for img elements for fifth image
    
    lastFigure.id = "fig5";
    lastFigure.style.zindex = "5";
    lastFigure.style.position = "absolute";
    lastFigure.style.right = "45px";
    lastFigure.style.top = "67px";
    
    var lastImage = document.createElement("img");
    lastImage.width = "240";
    lastImage.height = "135";
   
   lastFigure.appendChild(lastImage); // add or attach fifth element to preview
   
   articleEl.appendChild(lastFigure);
   
   // clone figure elemtne for fifth image and edit to be first image
   var firstFigure = lastFigure.cloneNode(true);
   
   firstFigure.id = "fig1";
   firstFigure.style.right = " ";
   firstFigure.style.left = "45px";
   
   articleEl.insertBefore(firstFigure, document.getElementById("fig2"));
   
   // add src values to two new imgs
   document.getElementsByTagName("img")[0].src = "images/IMG_0" + photoOrder[0] + "sm.jpg";
   document.getElementsByTagName("img")[4].src = "images/IMG_0" + photoOrder[4] + "sm.jpg";
   
   figureCount = 5;
   
   // disable the show more images button after it has been selected once
   var numberButton = document.querySelector("#fiveButton p");
   numberButton.removeEventListener("click", previewFive, false);
   
}//end of previewFive()

/****************************************END of previewFive() Function**********************************/



/***********************************createEventListeners() Function*************************************/
/*         This method attaches event listeners to the buttons (left, right, and show all).            */
/*******************************************************************************************************/
function createEventListeners() {
    var leftarrow = document.getElementById("leftarrow"); // declare variable with id #leftarrow
    leftarrow.addEventListener("click", leftArrow, false); // add event handler to leftarrow, executes on click
                                                          
    var rightarrow = document.getElementById("rightarrow"); // decalre variable with id #rightarrow
    rightarrow.addEventListener("click", rightArrow, false); // add event handler to right arrow executes on click
    
    var showAllButton = document.querySelector("#fiveButton p"); // declare a variable for the element fiveButton
    showAllButton.addEventListener("click", previewFive, false); // executed when user clicks show more button
}//end of createEventListeners function

/************************************END OF createEventListeners() FUNCTION****************************/


/************************************setUpPage() FUNCTION**********************************************/
/* create event listeners and populate image elements */
function setUpPage() {
   createEventListeners();
   populateFigures();
}//end of setUpPage Function

/***********************************END OF setUpPage() FUNCTION***************************************/



/* run setUpPage() function when page finishes loading */
if (window.addEventListener) {
      window.addEventListener("load", setUpPage, false); 
} else if (window.attachEvent)  {
      window.attachEvent("onload", setUpPage);
}//end of else if