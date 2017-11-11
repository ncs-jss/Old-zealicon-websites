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


?>



<div id="container" class="wrapper">
    <div class="md-modal md-effect-1" id="modal-1">
        <div class="md-content">
            <ul id="modal-nav">
            <?php
foreach($categories as $index=>$cat){
    echo '<li data-category="'.$index.'"><a href="javascript:" data-category="'.$index.'" >'.$cat.'</a></li>' ;
}
                    
            ?>
            </ul>
            <ul class="sidebar">

            </ul>
            <button class="md-close">X</button>
            <div class="event-details">


            </div>
        </div>
    </div>

    
      <?php
    
foreach($categories as $index=>$cat){
    echo '<div id="modal-data-'.$index.'" style="display:none;">';
    echo '<ul id="modal-data-nav">';
    foreach($events[$cat] as $event){
        echo '<li data-id="'.$event['id'].'"><a href="javascript:">'.$event['name'].'</a></li>'; 
    }
    echo '</ul>';

    foreach($events[$cat] as $event){
        echo '<div id="modal-data-content" data-id='.$event['id'].'>'; 
        echo '<header><h1>'.$event['name'].'</h1></header>';

        $data = base64_decode($event['data']);
        $dataArr = json_decode($data);
        echo '<div class="content-left">';
        echo '<p>'.htmlspecialchars_decode($dataArr->about).'</p><hr>';
        echo '<h3>Description</h3>';
        echo '<p>'.htmlspecialchars_decode($dataArr->description).'</p><hr>'; 
        echo '<h3>Rules</h3>';

        echo '<ol>';
        foreach($dataArr->rules as $el)
            echo '<li>'.$el.'</li>';
        echo '</ol>';

        echo '<hr>';
        if($dataArr->filePath!=''){
         echo '<h3>Attachments</h3>';
         echo '<a href="backoffice/'.$dataArr->filePath.'" download>download </a>';
        }
        echo '</div>';

        echo '<div class="content-right">';
        if($event['winner1']!=''){
            echo '<h3>Results</h3>';
            echo '<p>'.$event['winner1'].'</p>';
            echo '<p>'.$event['winner2'].'</p>';
            echo '<hr>';
        }
        echo '<h3>Prizes</h3>';
        echo '<p>'.$dataArr->prize1.'</p>';
        echo '<p>'.$dataArr->prize2.'</p>';
        echo '<hr>';

        echo '<h3>Contact</h3>';
        echo '<p>';

        $contact1 = explode(',',$dataArr->contact1);
        foreach($contact1 as $el)
            echo $el.'<br>';
        $contact2 = explode(',',$dataArr->contact2);
        foreach($contact2 as $el)
            echo $el.'<br>';
        echo '</p>';        

        echo '</div>';
        echo '</div>';    
    }
    echo '</div>';

}
    
        ?>
      




    <ul id="scene" class="scene unselectable" data-friction-x="0.1" data-friction-y="0.1" data-scalar-x="25" data-scalar-y="15">
        <li class="layer" data-depth="0.00"></li>
        <li class="layer logo" data-depth="0.10"><div class="background"></div>
        </li>
        <li class="layer" data-depth="0.15">
            <ul class="rope depth-10">
                <li><img src="assets/images/rope.png" alt="Rope"></li>
                <li class="hanger position-2">
                    <div class="board dance swing-1"></div>
                </li>
                <li class="hanger position-4">
                    <div class="board cloud-1 swing-3"></div>
                </li>
            </ul>
        </li>
        <li class="layer" data-depth="0.30">
            <ul class="rope depth-30">
                <li><img src="assets/images/rope.png" alt="Rope"></li>

                <li class="hanger position-1">
                    <div class="board tabla swing-3"></div>
                </li>
                <li class="hanger position-7">
                    <div class="board  ncs swing-5"></div>
                </li>
                <li class="hanger position-5">
                    <div class="board cloud-4 swing-1"></div>
                </li>
            </ul>
        </li>
        <li class="layer" data-depth="0.50"><div class=" road  depth-50"></div></li> 
        <li class="layer" data-depth="0.50"><div class="road car1  depth-50"></div></li> 
        <li class="layer" data-depth="0.50"><div class="road car2  depth-50"></div></li> 
        <li class="layer" data-depth="0.60">
            <ul class="rope depth-60">
                <li><img src="assets/images/rope.png" alt="Rope"></li>
                <li class="hanger position-3">
                    <div class="board art swing-5"></div>
                </li>
                <li class="hanger position-6">
                    <div class="board cloud-2 swing-2"></div>
                </li>
                <li class="hanger position-8">
                    <div class="board  swing-4 tablet"></div>
                </li>
            </ul>
        </li>
        <li class="layer" data-depth="0.60"><div class="grass top plain depth-60"></div></li> 
        <li class="layer" data-depth="0.70">
            <div class="grass middle depth-70">
                <div class="notes">
                    <img src="assets/images/notes.png">
                </div>
            </div>
        </li>
        <li class="layer" data-depth="0.80"><div class="wave plain depth-80"></div></li>
        <li class="layer" data-depth="0.90"><div class="wave paint depth-90"></div></li>
        <li class="layer" data-depth="1.00"><div class="grass top depth-100"></div></li>
    </ul>
    <section id="dataModal" class="wrapper about hide accelerate">
        <div class="cell accelerate">
            <div class="cables center accelerate">
                <div class="panel accelerate">
                    <header>
                        <h1>About<em>Zealicon</em></h1>
                    </header>
                    <a href="javascript:" class="closeModal">X</a>
                    <p> Amidst our wrapped up lives, we tend to contain our talents as well. These talents and skills are what make each one of us stand out of the crowd, all we need is a platform. <br>
                        <strong>ZEALICON</strong> is the annual techno-cultural fest of JSS Academy of Technical Education,  Noida. <br>
                        An oppurtunity for each one of us to bring out our best by competing with adept individuals.
                        ZEALICON 2015 is lined up with a plethora of much exuberant cultural as well as technical events.<br> Unlike the common notion that advancements in technology are making the traditions and culture futile, we at JSS believe that culture and technology can go hand in hand. The three day extravaganza of <strong> Zealicon </strong> aims to spread the word.
                        <br>
                        <strong> Zebi</strong> and <strong>Zikon</strong> have come back in time to march along with us in this joyful journey to revive the diversified culture and enrich our minds for a better future.<br> 
                    </p>
                    <p class="margin-bottom">We welcome you all to be a part of the megaevent. <br>  <strong>
                        "FEEL THE ZEAL"</strong> 
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="top-bar">
        <ul class="nav">
            <li class="active"><a href="javascript:" class="i" data-show="aboutBlock">About</a></li>
            <li><a href="javascript:" class="i" data-show="events">Events</a></li>
            <li><a href="javascript:" class="i" data-show="reach">Reach</a></li>
            <li><a href="javascript:" class="i" data-show="team">Team</a></li>
            <li><a href="javascript:" class="i" data-show="sponsors">Sponsors</a></li>
            <li><a href="javascript:" class="i" data-show="contact">Contact</a></li>
            <li><a href="assets/EVENT_TRACK.pdf" data-show="none" download>Schedule</a></li>
        </ul>
        <ul class="social">
            <li><a href="https://www.facebook.com/zealicon" target="_blank">
                <img src="assets/images/fb.png">
            </a></li>
            <li><a href="https://twitter.com/zealicon_jss" target="_blank">
                <img src="assets/images/twitter.png">
            </a></li>
            <li><a href="https://youtu.be/s_GmgT8-M_Y" target="_blank">
                <img src="assets/images/youtube.png" >
            </a></li>
        </ul>
        <audio id="background_audio"  loop>
            <source src="assets/bg_music.mp3" type="audio/mpeg" />
        </audio> 
        <a href="javascript" id="mute">
            <img src="assets/images/audio.png">
        </a>
    </div>
    <div class="aboutBlock hideBlock">
        <header>
            <h1>About <em>Zealicon</em></h1>
        </header>
        <a href="javascript:" class="closeModal">X</a>
        <p> Amidst our wrapped up lives, we tend to contain our talents as well. These talents and skills are what make each one of us stand out of the crowd, all we need is a platform. <br>
            <strong>ZEALICON</strong> is the annual techno-cultural fest of JSS Academy of Technical Education,  Noida. <br>
            An oppurtunity for each one of us to bring out our best by competing with adept individuals.
            ZEALICON 2015 is lined up with a plethora of much exuberant cultural as well as technical events.<br> Unlike the common notion that advancements in technology are making the traditions and culture futile, we at JSS believe that culture and technology can go hand in hand. The three day extravaganza of <strong> Zealicon </strong> aims to spread the word. 
            <br>
            <strong> Zebi</strong> and <strong>Zikon</strong> have come back in time to march along with us in this joyful journey to revive the diversified culture and enrich our minds for a better future.<br> 
        </p>
        <p class="margin-bottom">We welcome you all to be a part of the megaevent. <br>  <strong>
            "FEEL THE ZEAL"</strong> </p>
    </div>
    <div class="events hideBlock" id="event-nav">
        <header>
            <h1>Events <em></em></h1>
        </header>
        <a href="javascript:" class="closeModal">X</a>
        <ul>
 
            <?php
foreach($categories as $index=>$cat){
    echo '<li><a href="javascript:" class="md-trigger" data-category="'.$index.'" data-modal="modal-1" >'.$cat.'</a></li>' ;
}

            ?>
        </ul>       
    </div>
    <div class="reach hideBlock">
        <header>
            <h1>Reach <em></em></h1>
        </header>
        <a href="javascript:" class="closeModal">X</a>
        <p>Atithi Devo Bhav</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3502.523079451588!2d77.359504!3d28.614081!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce541dc34567f%3A0x4fd027cb23d66b19!2sJSS+Academy+Of+Technical+Education!5e0!3m2!1sen!2sin!4v1426184999508" width="100%" height="350" frameborder="0" style="border:0"></iframe>
    </div>
    <div class="team hideBlock">
        <header>
            <h1>Web <em>Team</em></h1>
        </header>
<a href="javascript:" class="closeModal">X</a>
        <ul class="ch-grid">
            <li>
                <div class="ch-item ch-img-1">
                    <div class="ch-info">
                        <h3>Aman Agarwal</h3>
                        <p><a href="https://www.facebook.com/aman.agarwal41" target="_blank" title="Team Lead">Godfather</a></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="ch-item ch-img-2">
                    <div class="ch-info">
                        <h3>Piyush Singh</h3>
                        <p><a href="https://www.facebook.com/thepiyushsingh" target="_blank" title="Technical Lead">Refiner</a></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="ch-item ch-img-3">
                    <div class="ch-info">
                        <h3>Anant Garg</h3>
                        <p><a href="https://www.facebook.com/infinitegarg" target="_blank" title="Front end Engineer">Architect</a></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="ch-item ch-img-4">
                    <div class="ch-info">
                        <h3>Prashant Chaudhary</h3>
                        <p><a href="https://www.facebook.com/prashant.chaudhary.33449" target="_blank" title="Developer">Soft Hammer</a></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="ch-item ch-img-5">
                    <div class="ch-info">
                        <h3>Nikhil Srivastava</h3>
                        <p><a href="https://www.facebook.com/nikhil.srivastava.180410" target="_blank" title="Developer">Finisher</a></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="ch-item ch-img-6">
                    <div class="ch-info">
                        <h3>Nikhil Verma</h3>
                        <p><a href="https://www.facebook.com/v.nikz143" target="_blank" title="Developer">Wrangler</a></p>
                    </div>
                </div>
            </li>
        </ul>    
    </div>
    <div class="sponsors hideBlock">
        <header>
            <h1>Sponsors <em></em></h1>
        </header>
        <a href="javascript:" class="closeModal">X</a>
        <p> </p>
        <p><img src="assets/images/ebay.jpg" width="75%" style="margin:0 auto"></p>
        <p><img src="assets/images/junegaa.png" width="75%" style="margin:0 auto"></p>
    </div>
    <div class="contact hideBlock">
        <header>
            <h1>Contact <em></em></h1>
        </header>
        <a href="javascript:" class="closeModal">X</a>
        <p> </p>
        <p>Professor R.B. Sharma<br><strong>Festival Convenor</strong><br>+0120-2400104</p>
        <p>Aman Agarwal<br><strong>Festival Secretary</strong><br>+91-9910693604</p>
    </div>
    <div class="login hideBlock">
        <header>
            <h1>Register<em></em></h1>
        </header>
        <a href="javascript:" class="closeModal">X</a>
        <p>Quite anxious huh!</p>
        <p>Just give us a little time more.</p>        
    </div>
    <div class="schedule hideBlock">
        <header>
            <h1><em>Schedule</em></h1>
        </header>
        <a href="javascript:" class="closeModal">X</a>
        <p>Will be added to the Timeline soon.</p>        
    </div>
</div>
<link rel="stylesheet" type="text/css" href="assets/css/styles.css?version=20"/>
<link rel="stylesheet" href="assets/css/newStyle.css?version=95">
<script src="assets/js/libraries.min.js"></script>
<script src="assets/js/jquery.parallax.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/modalEffects.js"></script>
<script src="assets/js/home.js"></script>