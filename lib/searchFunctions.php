<?php
/**
 * Funzione di ordine superiore funzione che restituisce una funzione
 * Programmazione Funzionale - dichiarativo 
 */
function searchText($searchText) {
    return function($item) use ($searchText){
        if($searchText === '') {
            return true;
        } else {
            $lowerTaskName = strtolower($item['taskName']);
            $lowerSearchStatus = strtolower($searchText);
            return strpos($lowerTaskName,$lowerSearchStatus) !== false; 
        }
    };
}

/**
 * @var string $status è la stringa che corrisponde allo status da cercare
 * (progress|done|todo)
 * @return callable La funzione che verrà utilizzata da array_filter
 */
function searchStatus(string $status) : callable {    
    return function($item) use ($status){
        if($status === '' || $status === 'all'){
            return true;
        }else{
            return $status === $item['status'];
        }
    }; 
} 


