<?php
include '../backoffice/common-code/db.php';

$conn = dbConnect();

$sql = 'SELECT DISTINCT category from events';


$categories = array();
foreach($conn->query($sql) as $row){
	array_push($categories,$row['category']);
} 



$sql = 'SELECT id,name,eventData,eventTime,winner1,winner2 from events where display = 1 and category = ?' ;
$stmt = $conn->prepare($sql);

$events = array();

foreach($categories as $cat){
	$stmt->bind_param("s",$cat);

	$stmt->execute(); 	

	$stmt->bind_result($id,$name,$data,$eventTime,$winner1,$winner2);

        while ($stmt->fetch()) {
	$events[$cat][] = array('id'=>$id,'name'=>$name,'data'=>$data,'time'=>$eventTime,'winner1'=>$winner1,'winner2'=>$winner2);	
        }
}


foreach($categories as $index=>$cat){
    echo '<li data-category="'.$index.'"><a href="javascript:" data-category="'.$index.'" >'.$cat.'</a></li>' ;
}

foreach($categories as $index=>$cat){
    echo '<div id="modal-data-'.$index.'" style="display:none;">';
    echo '<ul id="modal-data-nav"';
    foreach($events[$cat] as $event){
        echo '<li data-id="'.$event['id'].'"><a href="javascript:">'.$event['name'].'</a></li>'; 
    }
    echo '</ul>';
    
    foreach($events[$cat] as $event){
        echo '<div id="modal-data-content" data-id='.$event['id'].' >'; 
        echo '<header><h1>'.$event['name'].'</h1></header>';
        
        $data = base64_decode($event['data']);
        $dataArr = json_decode($data);
        echo '<div class="content-left">';
        echo '<p>'.$dataArr->about.'</p><hr>';
        echo '<h3>Description</h3>';
        echo '<p>'.$dataArr->description.'</p><hr>'; 
        echo '<h3>Rules</h3>';
        
        echo '<ol>';
        foreach($dataArr->rules as $el)
            echo '<li>'.$el.'</li>';
        echo '</ol>';
                
            echo '<hr>';
            echo '<h3>Attachments</h3>';
            echo '<a href="'.$dataArr->filePath.' download ">download </a>';
                
        echo '</div>';
        
        echo '<div> class="content-right">';
        echo '<h3>Prizes</h3>';
        echo '<p>'.$dataArr->prize1.'</p>';
        echo '<p>'.$dataArr->prize2.'</p>';
        echo '<hr>';
        echo '<h3>Contact</h3>';
        echo '<p>';
        
        foreach($dataArr->contact1 as $el)
            echo $el.'<br>';
        foreach($dataArr->contact2 as $el)
            echo $el.'<br>';
        echo '</p>';                       
        echo '</div>';
        echo '</div>';    
    }

}

?>