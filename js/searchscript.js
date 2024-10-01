let timeout;

function autocomplete(term, listId) {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        if (term.length < 1) {
            document.getElementById(listId).innerHTML = "";
            return;
        }
        
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `../process/suggestions.php?term=${term}`, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const airports = JSON.parse(xhr.responseText);
                let suggestions = "";
                
                airports.forEach(function(airport) {
                    suggestions += `<li onclick="selectItem('${airport}', '${listId}')">${airport}</li>`;
                });
                
                document.getElementById(listId).innerHTML = suggestions;
            }
        };
        xhr.send();
    }, 300);  // 300ms delay to debounce
}
if (airports.length === 0) {
    document.getElementById(listId).innerHTML = "<li>No matches found</li>";
}
   