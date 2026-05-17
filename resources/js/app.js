import { Sorting } from './enums/taskSortingOptions.js'; 
import { sortingTasks } from './utils/sorting.js';

addEventListener("DOMContentLoaded", (event) => { 
    sortingTasks();
})
