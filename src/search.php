<?php

require 'functions.php';

$results = [];

if (isset($_GET['gsearch'])) {
    $section = $_GET['section'];
    $searchBy = ($section == 'name') ? 'name' : 'description';
    $val = $_GET['gsearch'];

    $query = $client->search([
        'size' => 100,
        'index' => 'faker_data',
        'body' => [
            'query' => [
                'match' => [
                    $searchBy => $val
                ]
            ]
        ]
    ]);
    
    $results = $query['hits']['hits'];
}

?>
<!DOCTYPE html>
<html>
<body>
    <h1>Search Engine</h1>
    <form action="" method="GET">
        <label for="gsearch">Search:</label>
        <select name="section">
            <option value="name"> By Name </option>
            <option value="descp"> By Description </option>
        </select>
        <label for="gsearch">Text:</label>
        <input type="search" id="gsearch" name="gsearch">
        <input type="submit">
    </form>
    <hr/>
    <ul>
        <?php foreach ($results as $_r) : ?>
        <li><?php echo $_r['_source']['name'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>