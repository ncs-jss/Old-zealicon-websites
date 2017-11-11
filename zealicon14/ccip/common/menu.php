  <div class="nav">
        <script type="text/javascript">
		$(document).ready(function()
		{
			anchor = $('ul.tabs li a');
			current = window.location.pathname.split('/').pop();
			for (var i = 0; i < anchor.length; i++) {
			if(anchor[i].pathname.split('/').pop() == current) 
				anchor[i].className="active";
			else
				anchor[i].className="";
		}});
		</script>
                <div class="container">
                
                    <!-- Standard Nav (x >= 768px) -->
                    <div class="standard">
                    
                        <div class="five column alpha">
                            <div class="logo">
                                <a href="index.php"><img src="images/content/logo.png" /></a><!-- Large Logo -->
								<a href="index.php"><img src="images/content/jss_top.png" style="margin-left:100px;"/></a><!-- Large Logo -->
                            </div>
							
							
                        </div>
                    
                        <div class="eleven column omega tabwrapper">
                            <div class="menu-wrapper">
                                <ul class="tabs menu">
                                    <li>
                                       <a href="index.php" class="active"><span>Home</span></a>
                                        <ul class="child">
                                            <li>	<a href="index.php">About The Conference</a>	</li>
                                            <li>	<a href="under.php">Pre-conference Tutorial</a>	</li>
											<li>	<a href="under.php">Travel Guidelines</a>	</li>
                                            <li>	<a href="tourism-around.php">Tourism Around</a>	</li>
										</ul>
									</li>
									<li>
                                       <a href="organization.php"><span>Organization</span></a>
									</li>
									
                                            <li> <a href="under.php">Keynotes</a></li>
                                    <li>
                                        <a href="callforpapers.php">Call For Papers</a>
                                        <ul class="child">
											<li> <a href="guidelines.php">Guidelines For Submission</a>	</li>
                                            <li> <a href="impdates.php">Important Dates</a></li>
                                            <li> <a href="registration.php">Registration</a></li>
                                            <li> <a href="under.php">Helpline For Submission</a></li>
                                        </ul>
                                    </li>
								
									
									 
                                    <li>
                                        <a href="venue.php">
                                            Venue
                                        </a>
                                        <ul class="child">
                                            <li><a href="venue.php">Conference Venue</a></li>
                                            <li><a href="under.php">Accomodation</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contactus.php">
                                            Contact
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Standard Nav Ends, Start of Mini -->
                    
                    <div class="mini">
                        <div class="twelve column alpha omega mini">
                            <div class="logo">
                                <a href="index.php"><img src="images/content/logo.png" /></a><!-- Small Logo -->
                            </div>
							<div class="logo">
                                <a href="index.php"><img src="images/content/jss_top.png" /></a><!-- Small Logo -->
                            </div>
                        </div>
                        
                        <div class="twelve column alpha omega navagation-wrapper">
                            <select class="navagation">
                                <option value="" selected="selected">Site Navagation</option>
                            </select>
                        </div>
                    </div>
                    <!-- Start of Mini Ends -->
                </div> 
                
            </div>