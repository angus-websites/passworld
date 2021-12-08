
/*
 * Provides functionality for
 * searching through a HTML
 * table
 * 01/12/21
 */

/**
 * Filter the table
 * by the term provided
 * @param  str term  The search term
 * @param  obj table The jquery object table
 * @return None
 */
function searchTable(term,table){
    console.log("Searching.."+table+" for "+term)
    term = term.toUpperCase()
    table.filter(function() {
        $(this).toggle($(this).text().toUpperCase().indexOf(term) > -1)
    });
}




/** Wait for DOM to load */
document.addEventListener('DOMContentLoaded', (event) => {


    var $searchInput = $("#searchInput");
    var $targetTable = $("#"+$searchInput.attr("targetTable")+" tbody tr");
    var $clearButton = $("#clearButton");

    //Setup
    var searchTypeTimer;                //timer identifier
    const searchTypingInterval = 400;   //time in ms, 1 second for example
    var $searchRunning = false;         //Avoid dupliacte searches
    var searchBarShowing = false;



    function clear(){
        $searchInput.val("")
        searchTable("",$targetTable)
        $searchInput.focus()
    }


    //When the user clicks the "Clear" button
    $clearButton.click(function(){
        clear()
    });


    //When user starts typing
    $searchInput.on("keyup", function(event) {
      clearTimeout(searchTypeTimer);
      var thisInput = $(this);
      //Ensure the input is not empty and user is not clicking backspace
      if(thisInput.val().length < 1 && event.keyCode == 8){
        clear()
      }
      else{
        var searchTerm = thisInput.val();
        searchTypeTimer = setTimeout(function() {searchTable(searchTerm, $targetTable);}, searchTypingInterval);
      }
      
    });


})