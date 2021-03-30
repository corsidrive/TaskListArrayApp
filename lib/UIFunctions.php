<?php
/**
 * Funzioni per interfaccia grafica
 */

 function getStatusClass($status){
        $statusAvaible = [
            'done' => 'secondary',
            'todo' => 'danger',
            'progress' => 'primary',
        ];
        return $statusAvaible[$status];
 }
