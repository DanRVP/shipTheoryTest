<h1>Add a Result</h1>
<?= $this->Html->link('Back to results', ['action' => 'index']) ?>
<?php
//Using a simple cakephp formhelper to generate the form
echo $this->Form->create($result);
echo $this->Form->control('first_name');
echo $this->Form->control('surname');
//gather data from API as JSON
$filmJSON = file_get_contents('http://stapi.co/api/v1/rest/movie/search');
//decode to an associative array
$data = json_decode($filmJSON, TRUE);
$filmOption = array();
//loop through $filmOption to get an array to pass through to dropdown menu
foreach ($data['movies'] as $d){
    //make the array associative so that the title is what is passed through as the value to the database
    $filmOption[$d['title']] = $d['title'];
}
//display the dropdown menu (Note dropdown menus display a weird 0 (I think its the way I've made the array so it thinks there should be more arrays) before titles)
echo $this->Form->control('favourite_film', ['options' => [$filmOption]]);
//repeat the above, but for series
$seriesJSON = file_get_contents('http://stapi.co/api/v1/rest/series/search');
$data = json_decode($seriesJSON, TRUE);
$seriesOption = array();
foreach ($data['series'] as $d){
    $seriesOption[$d['title']] = $d['title'];
}
echo $this->Form->control('favourite_series', ['options' => [$seriesOption]]);
//echo $this->Form->control('slug');
echo $this->Form->button(__('Submit'));
echo $this->Form->end();
?>
