// Get elements by ID
//const toggleFormButton = document.getElementById("toggle-form-button");
//const toggleTableButton = document.getElementById("toggle-table-button");
//const form = document.getElementById("score-form");
//const table = document.querySelector(".board");

// Initially, both form and table are hidden
//let formVisible = false;
//let tableVisible = false;

//toggleFormButton.addEventListener("click", () => {
  //  formVisible = !formVisible;

   // if (formVisible) {
   //     form.style.display = "block";
   //     table.style.maxHeight = "none"; // Close the table
    //    toggleTableButton.textContent = "Toggle Table";
  //  } else {
  //      form.style.display = "none";
  //  }
//});

//toggleTableButton.addEventListener("click", () => {
   // tableVisible = !tableVisible;

   // if (tableVisible) {
   //     table.style.display = "block"; // Show the table
   //     form.style.display = "none"; // Close the form
   //     toggleFormButton.textContent = "Toggle Form";
  //  } else {
  //      table.style.display = "none";
 //   }
//});

document.addEventListener("DOMContentLoaded", function () {
    const formElement = document.getElementById("score-form");
    const tableElement = document.querySelector(".table-container");
    const searchResultsElement = document.getElementById("search-results");
    const toggleFormButton = document.getElementById("toggle-form-button");
    const toggleTableButton = document.getElementById("toggle-table-button");
    const searchButton = document.getElementById("search-button");

    // Initially, hide the table and search results
    tableElement.style.display = "none";
    searchResultsElement.style.display = "none";

    toggleFormButton.addEventListener("click", function () {
        formElement.style.display = "block";
        tableElement.style.display = "none";
        searchResultsElement.style.display = "none";
    });

    toggleTableButton.addEventListener("click", function () {
        formElement.style.display = "none";
        tableElement.style.display = "block";
        searchResultsElement.style.display = "none";
    });

    searchButton.addEventListener("click", function () {
        formElement.style.display = "none";
        tableElement.style.display = "none";
        searchResultsElement.style.display = "block";
    });
});

function toggleInput(inputId, checkboxId) {
    const inputField = document.getElementById(inputId);
    const checkbox = document.getElementById(checkboxId);
    
    if (checkbox.checked) {
      inputField.disabled = true;
      inputField.value = ""; // Clear the input field value
    } else {
      inputField.disabled = false;
    }
  }
