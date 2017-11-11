<?php
header('location:http://zealicon.in');
session_start();

if(!isset($_SESSION['user']))
{
$flag=0;
$_SESSION['lev']="X";
$_SESSION['ques']="";
}
else if(isset($_SESSION['user'])||$_SESSION['user']=="")
{
    $flag=1;	
}
//echo $flag;
//echo $_SESSION['err'];
//echo $_SESSION['err2'];
?> 
<style>
.error {color: #FF0000;}
</style>


<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Algothematics | Home</title>
<script src="global/jq.js"></script>
    <meta name="description" content="">
    <meta name="author" content="Zealicon 2015">
    <meta name="application-name" content="Algothematics">
    <meta name="keywords" content="zealicon 2015, zealicon, JSSATEN, JSSATE, JSS academy of technical education, alogothematics, mathematical puzzles, brain twisters, contest, zealicon 2k15, zealicon event, algothematics leaderboard">
    <link rel="stylesheet" href="indexstyles.css" >
    <link rel="shortcut icon" href="downloads/favicon2.png" type="image/png">
    <link rel="stylesheet" href="downloads/component_form.css" >
    <link rel="stylesheet" href="downloads/component.css" >
    <link rel="stylesheet" href="button.css">
	<link rel="stylesheet" href="buttons/button2.css">
	
    <script type="text/javascript"> 
$(document).ready(function () {
    var once="00";
    var reg=[0,0,0,0,0,0];
	$(".content").hide();
    $(".login").hide();
    $(".register").hide();
    $(".battleground").hide();
    $(".leaderboard").hide();
    	<?php if((!$flag==1)&&($_GET['page']=="battleground")){?>
		window.history.pushState('obj', '', '?page=login');
		 $(".content").hide();
        $(".login").fadeIn(500);
        $(".register").hide();
        $(".battleground").hide();
        $(".leaderboard").hide();
		<?php } ?>
		<?php if(((!$flag==1)&&($_GET['page']=="leaderboard"))||((!$flag==1)&&($_GET['page']=="battleground"))){?>
		window.history.pushState('obj', '', '?page=login');
		 $(".content").hide();
        $(".login").fadeIn(500);
        $(".register").hide();
        $(".battleground").hide();
        $(".leaderboard").hide();
		<?php } 
		 else 
		 { if(isset($_GET['page']) && $_GET['page']!=''){?>
			$(".<?php echo $_GET['page'];?>").fadeIn(500);
		<?php }else{?>
			$(".content").fadeIn(500);
		<?php }}?>

    
    
    
    $("#home_icon").click(function () {
	window.history.pushState('obj', '', '?page=content');
        $(".content").fadeIn(500);
        $(".content").show();
        $(".login").hide();
        $(".register").hide();
        $(".battleground").hide();
        $(".leaderboard").hide();
    });
    $("#logout_icon").click(function () {
	    $(".content").fadeIn(500);
        $(".content").show();
        $(".login").hide();
        $(".register").hide();
        $(".battleground").hide();
        $(".leaderboard").hide();
    });
	$("#login_icon").click(function () {
	window.history.pushState('obj', '', '?page=login');
        $(".content").hide();
        $(".login").fadeIn(500);
        $(".login").show();
        $(".register").hide();
        $(".battleground").hide();
        $(".leaderboard").hide();
    });
    
    $("#register_icon").click(function () {
	window.history.pushState('obj', '', '?page=register');
        $(".login").hide();
        $(".content").hide();
        $(".register").fadeIn(500);
        $(".register").show();
        $(".battleground").hide();
        $(".leaderboard").hide();
    });
	
    $("#battle_icon").click(function () {
	window.history.pushState('obj', '', '?page=battleground');
        $(".login").hide();
        $(".register").hide();
        $(".content").hide();
        $(".battleground").fadeIn(500);
        $(".battleground").fadeIn(500);
        $(".leaderboard").hide();
    });
    
    $("#leaderbrd_icon").click(function () {
	window.history.pushState('obj', '', '?page=leaderboard');
        $(".login").hide();
        $(".register").hide();
        $(".content").hide();
        $(".leaderboard").fadeIn(500);
        $(".battleground").hide();
    });
    
	$("#logout_icon").click(function(){
        $(".content").fadeIn(500);
        $(".login").hide();
        $(".register").hide();
        $(".battleground").hide();
        $(".leaderboard").hide();
    });
	$("#leaderbrd_icon2").click(function(){
	window.history.pushState('obj', '', '?page=login');
        $(".content").hide();
        $(".login").fadeIn(500);
        $(".register").hide();
        $(".battleground").hide();
        $(".leaderboard").hide();
    });
	$("#battle_icon2").click(function(){
	window.history.pushState('obj', '', '?page=login');
        $(".content").hide();
        $(".login").fadeIn(500);
        $(".register").hide();
        $(".battleground").hide();
        $(".leaderboard").hide();
    });
    
    
    $("#text_box").click(function () {
        if(once.charAt(0)=='0'){
            once="1"+once.substring(1,once.length);
            document.getElementById("text_box").className +=" input--filled";
        }
    
    });
    
    $("#text_box2").click(function () {
        if(once.charAt(1)=='0'){
            once=once.substring(0,once.length-1)+"1";
            document.getElementById("text_box2").className +=" input--filled";
        }
    
    });


     $('form').on('focus','.input__field_r',function(){
            var x= $(this).parent().attr('id');
            var i=parseInt(x.charAt(x.length-1));

            console.log(x);

            if(reg[i-3]===0){
                reg[i-3]=1;
                console.log("here");
                console.log($(''+x));
                document.getElementById(x).className+=" input--filled_r";
             }
             if(reg[i-3]===0){
                reg[i-3]=1;
                console.log("here");
                console.log($(''+x));
                document.getElementById(x).className+=" input--filled_r";
             }
        });
    
});
    </script>
    
    
</head>

<body style="height:95%">
    
    <table style="width:100%; height:100%;">
        <tr><th class="center"><a id="zeal"  target="_blank" href="http://www.zealicon.in"><p class="centerx" id="zealii">ZEALICON'15</p></a></th><th class="as"><div>ALGOTHEMATICS</div></th></tr>
        <tr><td style="height:8%"><p style="text-transform:capitalize;font-size:16px;font-weight:lighter;display:block;margin:auto;text-align:center;"><?php if(isset($_SESSION['user'])){echo "Welcome ";echo $_SESSION['user'];}?></p></td><td rowspan="7" style="position:relative;z-index:10000;">
            <div id="box">
                
                
                
            <div class="content"><div style="display:table-cell;padding:0px;margin:0px;height:100%;width:100%;position:relative;"><p class="info">
                "Algothematics" (Algorithms + Mathematics) is an online event that involves solving of some cumbersome mathematical problems. The event's questions are planned such that the player needs to build some algorithm to solve a mathematical problem. One thing that is even more interesting is that user need to just fill in the numerical answer he gets. No submission of source code is required.</p> </div>                </div>
                
                
                
                
               <form action = "log.php" method = "post" id="input">
            <div class="login">
                <div  style="display:table-cell;padding:0px;margin:0px;height:100%;width:100%;position:relative;"><p class="info" style="left:0%;right: 0%;width:100%;" id="xxxc">
            Enter your login details:
                <br/><br/>
                    <span class="input input--akira"  id="text_box" >
					<input required class="input__field input__field--akira" type="email" name="email" id="input-22" value="<?php echo $_SESSION['email']?>" style="border-width:0px;padding:0px;" id="zx"/>
					<label class="input__label input__label--akira" for="input-22">
						<span class="input__label-content input__label-content--akira" id="hint">Email Address</span>
					</label>
				</span>
                    
                    <span class="input input--akira" id="text_box2">
					<input required class="input__field input__field--akira" type="password" name="password" id="input-22" style="border-width:0px;padding:0px;" />
					<label class="input__label input__label--akira" for="input-22">
						<span class="input__label-content input__label-content--akira" id="hint">Password</span>
					</label>
				</span>
                <span style="display:block;" class="error" id="err_login"><button id="button_login" class="btn btn-1 btn-1e" type="submit"  name="button_login">Log in</button><br> <?php echo $_SESSION['err'];?>  </span>
                    
                    <?php  $_SESSION['err']="";?>
                    
                </p>
                </div>
            </div>
            
                </form>
                
                
            <div class="register" style="height:100%;width:100%;margin:0px;">
                <div  style="display:table-cell;padding:0px;margin:0px;height:100%;width:100%;position:relative;">
                    <form class="registerfrm" action="register.php" method="post" enctype="multipart/form-data" style="width:72%;left:0px;right:0px;">
			
				<table class="table" style="width:140%;">
                    
					<tr>
                        <td style="width:50%"><span class="input_r input--akira_r" id="text_box3"  style="width:90%;">
					<input required class="input__field_r input__field--akira_r" type="text" id="input-22"  style="border-width:0px;padding:0px;" name="fname" value="<?php echo $_SESSION['name1'];?>"   />
					<label class="input__label_r input__label--akira_r" for="input-22">
						<span class="input__label-content_r input__label-content--akira_r" id="hint">FIRST NAME</span>
					</label>
                            </span>
                        </td> 
                        <td style="width:50%"><span class="input_r input--akira_r" id="text_box4"  style="width:90%;">
					<input required class="input__field_r input__field--akira_r" type="text" id="input-22"  style="border-width:0px;padding:0px;" name="lname" value="<?php echo $_SESSION['name2'];?>"   />
					<label class="input__label_r input__label--akira_r" for="input-22">
						<span class="input__label-content_r input__label-content--akira_r" id="hint">LAST NAME</span>
					</label>
                            </span>
                        </td> 
                    </tr>
                    
                    <tr>
                        <td><span class="input_r input--akira_r" id="text_box5" style="width:90%;">
					<input required class="input__field_r input__field--akira_r" type="email" id="input-22"  style="border-width:0px;padding:0px;" name="email" value="<?php echo $_SESSION['mail'];?>"  />
					<label class="input__label_r input__label--akira_r" for="input-22">
						<span class="input__label-content_r input__label-content--akira_r" id="hint">EMAIL ADDRESS</span>
					</label>
                            </span>
                        </td> 
                        <td><span class="input_r input--akira_r" id="text_box6" style="width:90%;">
					<input required class="input__field_r input__field--akira_r" type="text" id="input-22"  name="college" style="border-width:0px;padding:0px;" value="<?php echo $_SESSION['clg'];?>"  />
					<label class="input__label_r input__label--akira_r" for="input-22">
						<span class="input__label-content_r input__label-content--akira_r" id="hint">COLLEGE</span>
					</label>
                            </span>
                        </td> 
                    </tr>
                    
                    <tr>
                        <td><span class="input_r input--akira_r" id="text_box7" style="width:90%;">
					<input required class="input__field_r input__field--akira_r" type="password" id="input-22"  name="password" style="border-width:0px;padding:0px;" />
					<label class="input__label_r input__label--akira_r" for="input-22">
						<span class="input__label-content_r input__label-content--akira_r" id="hint">PASSWORD</span>
					</label>
                            </span>
                        </td> 
                        <td><span class="input_r input--akira_r" id="text_box8" style="width:90%;">
					<input required class="input__field_r input__field--akira_r" type="password" id="input-22" name="conpassword" style="border-width:0px;padding:0px;" />
					<label class="input__label_r input__label--akira_r" for="input-22">
						<span class="input__label-content_r input__label-content--akira_r" id="hint">CONFIRM PASSWORD</span>
					</label>
                            </span>
                        </td> 
                    </tr>
                    
					
                    <tr><td colspan="2" id="err_register" class="error"><p style="display:block;text-align:center;margin:0px;"><?php echo $_SESSION['err2'];?></p></td></tr>
                    <tr><td colspan="2"><button type="submit" class="btn btn-1 btn-1e" id="regist" name="regist" style="display:block;text-align:center;margin:auto;">Register</button></td></tr>
					<?php  $_SESSION['err2']="";?>

				</table>
			</form>
                </div>
            </div>
            
                
                
                <form action = "che.php" method = "post" id="input">
                <div class="battleground" id="xx" style="height:100%;width:100%;margin:0px;"><div style="display:table-cell;padding:0px;margin:0px;height:100%;width:100%;position:relative;">
                    <table style="height:100%;width:100%;">
                       <tr class="table_battle"><td style="text-transform: uppercase;font-weight: 700;">level :<?php echo $_SESSION['lev']; ?></td></tr>
                        <tr class="table_battle"><td rowspan="8" style="height:325px;"><p id="ques" style="overflow:auto;"><?php echo $_SESSION['ques']; ?></p></td></tr>
                       <tr class="table_battle"></tr>
                        <tr class="table_battle"></tr>
                        <tr class="table_battle"></tr>
                        <tr class="table_battle"></tr>
                        <tr class="table_battle"></tr>
                        <tr class="table_battle"></tr>
                        <tr class="table_battle"></tr>
                        
                        <tr class="table_battle"><td><input style="color:black;" type="text" name="ans" value="<?php echo $_SESSION['answ'];?>"/></td></tr>
						
                        <tr class="table_battle"><td><button id="submit" class="btn btn-1 btn-1e" name="submit">Submit</button></td></tr>
                        <tr class="table_battle"><td><span id="err_battle" class="error"> <?php echo $_SESSION['err3'];?></span></td></tr>
                    </table>
                </div>
		</div>
		</form>
                
                
            <div class="leaderboard">
                <div  style="display:table-cell;padding:0px;margin:0px;height:100%;width:100%;position:relative;">
                    <form class="registerfrm" style="left:0%;right: 0%;width:100%">
				<table class="table" style="width:100%;">
					<tr>
						<th style="width:10%">S.No.</th>
                        <th style="width:50%">Name</th> 
                        <th style="width:15%">Level</th>
						<th style="width:25%">College</th> 
                    </tr>
					<?php
				require_once('global/dbcon.php');
				$sql="SELECT Firstname, Lastname,college, level FROM persons ORDER BY Level DESC LIMIT 0,10";
				$res=mysqli_query($con, $sql);
				$i=1;
				while($ans=mysqli_fetch_array($res))
					{
						echo "<tr >";
						echo "<td style=text-align:center>";
						echo $i;
						$i++;
						echo "</td>";
						echo "<td style=text-align:center>";
						echo $ans['Firstname'];
						echo " ";
						echo $ans['Lastname'];
						echo "</td>";
						echo "<td style=text-align:center>";
						echo $ans['level'];
						echo "</td>";
						echo "<td style=text-align:center>";
						echo $ans['college'];
						echo "</td>";
						echo "</tr>";
					}
			?>
                    <!-- table rows to be added dynamically -->
				</table>
			</form>
                </div>
                </div>
            
            
            
            
            </td></tr>
        
        
        
        
        <tr class="icons" id="home_row"><td><div class="grid_3">
				<div class="fmcircle_border">
					<div class="fmcircle_in" id="home_icon">
				<span>Home</span><img src="icons/home.png" alt="" />
					</div>
				</div>
	</div></td></tr>
        <tr class="icons" id="login_row"><td><div class="grid_3">
				<div class="fmcircle_border">
				<?php if($flag==1){
										echo"<div class='fmcircle_in' id='logout_icon'><a href='logout.php'><span>Logout</span><img src='icons/logout.png' alt='' /></a></div>";
									}
									else
									{
										echo"<div class='fmcircle_in' id='login_icon'><span>Login</span><img src='icons/login.png' alt='' /></div>";
									}
									?>
					
				</div>
	</div></td></tr>
        <tr class="icons" id="register_row"><td><div class="grid_3">
				<div class="fmcircle_border">
				<?php if($flag==1)
				{
					echo "<a href='https://www.facebook.com/algothematics15' target='_blank'><div class='fmcircle_in' id='register_icon'><span>forum</span><img src='icons/forum.png'/></div></a>";
				}
					else
					{
						echo "<div class='fmcircle_in' id='register_icon'><span>register</span><img src='icons/register.png'/></div>";
					}
					?>
				</div>
	</div></td></tr>
        <tr class="icons" id="battle_row"><td><div class="grid_3">
				<div class="fmcircle_border">
					<div class="fmcircle_in" id=<?php if($flag==1) {echo "battle_icon";} else{ echo"battle_icon2";} ?>>
				<span id="biggerspan">battleground</span><img src="icons/battleground.png" alt="" />
					</div>
				</div>
	</div></td></tr>
        <tr class="icons" id="leaderbrd_row"><td><div class="grid_3">
				<div class="fmcircle_border">
					<div class="fmcircle_in" id="<?php if($flag==1) {echo "leaderbrd_icon";} else{ echo"leaderbrd_icon2";} ?>">
				<span id="biggerspan">leaderboard</span><img src="icons/leaderboard.png" alt="" />
					</div>
				</div>
	</div></td></tr>
        <tr class="icons"><td></td></tr>
        
        
    </table>
    
    
    <script type="text/javascript">
        // $(document).on('focus','.input__field_r',function(){
        //     var x= $(this).parent().attr('id');
        //     console.log(x);
        //     //var i=parseInt(x.charAt(x.length()-1));

        //     console.log(x.length);

        //     if(reg[i]==0){
        //         reg[i]=1;
        //         x.addClass(' input--filled_r');
        //     }
        //     if(reg[i]==1 && this.content==""){
        //         reg[i]=0;
        //         x.removeClass(' input--filled_r');
        //     }
        // });
    </script>
</body>
    
    
    
    <footer>
        <p>&copy Nibble Computer Society</p>
    </footer>

</html>
<?php 
	$_SESSION['err']="";$_SESSION['answ']="";
	$_SESSION['mail']="";$_SESSION['clg']="";$_SESSION['name2']="";$_SESSION['name1']="";
	$_SESSION['err2']="";
	$_SESSION['err3']="";
?>