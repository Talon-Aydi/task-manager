import { Sorting } from './enums.js'; 

addEventListener("DOMContentLoaded", (event) => { 
    
    const option = document.getElementById('sortFilter');

    function handleSortChange() {
        const selectedSorting = option.value; 

        switch (selectedSorting) {
            case Sorting.FirstUpdated: 
                console.log('First Updated: To be implemented');
                break;
            case Sorting.LastUpdated: 
                console.log('Last Updated: To be implemented');
                break;
            case Sorting.StatusAsc: 
                console.log('Status Ascended: To be implemented');
                break;
            case Sorting.StatusDesc: 
                console.log('Status Descended: implemented');
                break;
        }
    }

    if (option) {
        handleSortChange();

        option.addEventListener('change', handleSortChange);
    }
    
})
