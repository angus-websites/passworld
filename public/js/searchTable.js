
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


    function clear(){
        $searchInput.val("")
        searchTable("",$targetTable)
        $searchInput.focus()
    }

    //When input changes
    $searchInput.on("keyup", function() {
        //Get the term
        var term = $(this).val();
        searchTable(term,$targetTable)
    });

    //When the user clicks the "Clear" button
    $clearButton.click(function(){
        clear()
    })

})