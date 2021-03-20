<?php
    require './lib/searchFunctions.php';
    require './lib/JSONReader.php';

    $searchText     =  isset($_GET['searchText'])   ?  filter_var($_GET['searchText'],FILTER_SANITIZE_STRING) : '';
    $searchStatus   =  isset($_GET['searchStatus']) ?  filter_var($_GET['searchStatus'],FILTER_SANITIZE_STRING) : 'all';

    $taskList = JSONReader('./dataset/TaskList.json');
    
    $result = array_filter($taskList, searchText($searchText)); 
    $result = array_filter($result, searchText($searchStatus)); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Taklist</title>
</head>
<body>

    <div class="container-fluid bg-secondary py-3 mb-3 text-light">
        <div class="container">
            <h1 class="display-1">Tasklist</h1>
        </div>
    </div>
 
    <div class="container">
        <div class="input-group pb-3 my-1">
            <label class="w-100 pb-1 fw-bold" for="searchText">Cerca</label>
            <input id="searchText" name="searchText" value=""  type="text" class="form-control" placeholder="attività da cercare">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">Invia</button>
            </div>
        </div>

        <div id="status-radio" class=" mb-3">
            <div class="fw-bold pe-2 w-100">Stato attività</div>
              <div class="form-check form-check-inline">
                <input  name="status" value="all" class="form-check-input" type="radio">
                <label class="form-check-label" >tutti</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="status" value="todo" class="form-check-input" type="radio">
                <label class="form-check-label" >da fare</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="status" value="progress" class="form-check-input" type="radio">
                <label class="form-check-label" >in lavorazione</label>
              </div>
              <div class="form-check form-check-inline">
                <input name="status" value="done" class="form-check-input" type="radio">
                <label class="form-check-label" >fatto</label>
              </div>
        </div>
    
        <section class="tasklist mt-3">
            <h1 class="fw-bold fs-6">Elenco delle attività</h1>
            <table class="table">
                
                <?php foreach ($result as $task) { ?>

                    <tr>
                        <th class="w-100">nome</th>
                        <th class="text-center">stato</th>
                        <th class="text-center">data</th>
                    </tr>

                <?php } ?>
                
            </table>

        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>