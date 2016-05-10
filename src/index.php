<?php session_start(); ?>
<?php
	//init variables
	$cf = array(); /* contact form */
	$sr = false;   /* server response */

	if(isset($_SESSION['cf_returndata'])){
		$cf = $_SESSION['cf_returndata'];
		$sr = true;
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Jon Boley</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/icomoon/style.css">
        <link rel="stylesheet" href="assets/css/contactstyle.css">
        <style>
        	  /* Sticky footer styles
			  -------------------------------------------------- */

			  html,
			  body {
				height: 100%;
				/* The html and body elements cannot have any padding or margin. */
			  }

			  /* Wrapper for page content to push down footer */
			  #wrap {
				min-height: 100%;
				height: auto !important;
				height: 100%;
				/* Negative indent footer by it's height */
				margin: 0 auto -60px;
			  }

			  /* Set the fixed height of the footer here */
			  #push,
			  #footer {
				height: 60px;
			  }
			  #footer {
				background-color: #f5f5f5;
			  }

			  /* Lastly, apply responsive CSS fixes as necessary */
			  @media (max-width: 767px) {
				#footer {
				  margin-left: -20px;
				  margin-right: -20px;
				  padding-left: 20px;
				  padding-right: 20px;
				}
			  }



			  /* Custom page CSS
			  -------------------------------------------------- */
			  /* Not required for template or sticky footer method. */

			  #wrap > .container {
				padding-top: 40px;
			  }
			  .container .credit {
				margin: 20px 0;
			  }

			  code {
				font-size: 80%;
      		  }
        </style>
		<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css">

		<style>
			  @media (max-width: 979px) {
				.navbar-fixed-top {
					margin-bottom: 0px;
				}
				#wrap > .container {
					padding-top: 0px;
				}
			  }
		</style>

        <script src="assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!--script src="assets/js/bootstrap-dropdown.js"></script-->

		<script>
			minL=20;
			var bName = navigator.appName;

			function taCount(taObj,Cnt) {
				objCnt=createObject(Cnt);
				objVal=taObj.value;
				if (objCnt) {
					if(bName == "Netscape"){
						objCnt.textContent=objVal.length;}
					else{objCnt.innerText=objVal.length;}
				}
				return true;
			}
			function createObject(objId) {
				if (document.getElementById) return document.getElementById(objId);
				else if (document.layers) return eval("document." + objId);
				else if (document.all) return eval("document.all." + objId);
				else return eval("document." + objId);
			}
		</script>

		<!-- Captcha -->
		<script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
    <body><!-- data-spy="scroll" data-target=".navbar" data-offset="50"-->
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

		<div id="wrap">

			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="http://jboley.com">Jon Boley, PhD</a>
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li class="divider-vertical"></li>
								<li class="active anchor"><a href="#home"><i class="icon-home"></i> Home</a></li>
								<li class="divider-vertical"></li>
								<!--li class="anchor"><a href="#about"><i class="icon-search"></i> About</a></li>
								<li class="divider-vertical"></li>
								<li class="anchor"><a href="#research"><i class="icon-briefcase"></i> Research</a></li>
								<li class="divider-vertical"></li-->
								<li><a href="resume/resume_boley.pdf"><i class="icon-file"></i> R&eacute;sum&eacute;</a></li>
								<li class="divider-vertical"></li>
								<li><a href="#contactWindow" role="button" data-toggle="modal"><i class="icon-envelope"></i> Contact</a></li>
								<li class="divider-vertical"></li>

								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">Personal <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="personal.html"><i class="icon-headphones"></i> Hobbies</a></li>
										<li><a href="personal.html#quotes"><i class="icon-comment"></i> Quotes</a></li>
										<li><a href="personal.html#media"><i class="icon-camera"></i> Media</a></li>
										<li class="divider"></li>
										<li class="nav-header">Other Websites</li>
										<li><a href="http://blog.jboley.com">Boley Beer Blog</a></li>
										<li><a href="http://perceptualentropy.com">PerceptualEntropy.com</a></li>
									</ul>
								</li>
							</ul>
							<p class="navbar-text pull-right"><a href="http://my.jboley.com" style="color:#000000;"><i class="icon-lock"></i></a></p>
							<!--form class="navbar-form pull-right">
								<input class="span2" type="text" placeholder="Email">
								<input class="span2" type="password" placeholder="Password">
								<button type="submit" class="btn">Sign in</button>
							</form-->
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div><!--navbar-->

			<div class="container" id="home">

				<!--p style="color:gray;font-size:75%;margin-bottom:20px;"-->
					<?php
						/**
						 * @link http://gist.github.com/385876
						 */
						function csv_to_array($filename='', $delimiter=',')
						{
							if(!file_exists($filename) || !is_readable($filename))
								return FALSE;

							$header = NULL;
							$data = array();
							if (($handle = fopen($filename, 'r')) !== FALSE)
							{
								while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
								{
									if(!$header)
										$header = $row;
									else
										$data[] = array_combine($header, $row);
								}
								fclose($handle);
							}
							return $data;
						}
					?>
					<?php
						$filename = "text/quotes.csv";
						$quoteArray = csv_to_array($filename);
						$index = rand(0,count($quoteArray)-1);
						$contents = $quoteArray[$index];
						//print $contents[1];
					?>
				<!--/p-->

				<div id="myCarousel" class="carousel slide">
				  <div class="carousel-inner" style="color:gray;font-size:75%;margin-top:2px;margin-bottom:20px;">
				  	<?php
				  		for ($i=0; $i<10; $i++)
						  {
						  	$index = rand(0,count($quoteArray)-1);
						  	$contents = $quoteArray[$index];
						  	if ($i==0){
						  		print("<div class=\"active item\" style=\"margin-bottom:2px;\">\n");
						  	}
						  	else {
							  	print("<div class=\"item\" style=\"margin-bottom:2px;\">\n");
							}
						  	print($contents[1]."\n");
						  	print("</div>\n");
						  }
					?>
				  </div>
				</div>

				<div id="errors" class="alert alert-error <?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Oops!</strong> There were some problems with your form submission:
					<ul>
						<?php
						if(isset($cf['errors']) && count($cf['errors']) > 0) :
							foreach($cf['errors'] as $error) :
						?>
						<li><?php echo $error ?></li>
						<?php
							endforeach;
						endif;
						?>
					</ul>
				</div><!--id="errors"-->
				<div id="success" class="alert alert-success <?php echo ($sr && $cf['form_ok']) ? 'visible' : ''; ?>">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Thanks!</strong> I will respond to your message ASAP!
				</div>

				<div class="media">
					<a class="pull-left">
				    	<img class="media-object img-rounded" src="http://www.gravatar.com/avatar/576f8c54bb2b8267459c560b27effa14.png" style="width:80px; height:80px;">
					</a>
					<div class="media-body">
						<p>You have arrived at JBoley.com, the web home of Jonathan Boley (aka Jon).  Here you will find information about me, my life, and career.</p>
						<p>I am a Research Scientist at GN ReSound, where I specialize in hearing science and signal processing.</p>
						<p>
							<a href="http://www.linkedin.com/in/boley" ><img src="http://www.linkedin.com/img/webpromo/btn_viewmy_160x25.gif" width="160" height="25" border="0" alt="View Jon Boley's profile on LinkedIn"></a>
							<!--a href="http://www.linkedin.com/in/boley"><i class="icon-linkedin"></i></a-->
							<a href="http://google.com/+JonBoleyPhD"><i class="icon-google-plus"></i></a>
							<a href="http://facebook.com/jon.boley.35"><i class="icon-facebook"></i></a>
							<a href="http://twitter.com/JonBoley"><i class="icon-twitter"></i></a>
							<a href="http://github.com/JonBoley"><i class="icon-github"></i></i></a>
							<a href="http://keybase.io/boley"><i class="icon-key"></i></a>
							<a href="http://orcid.org/0000-0001-9211-3739"><img src="i/orcid.png" style="width:14px;height:14px;margin-top:1px;vertical-align:text-top;"/></a>
						</p>
					</div>
				</div>


				<div id="about">

					<div>
						<ul class="nav nav-tabs" id="aboutTabs">
							<li class="active"><a href="#work" data-toggle="tab">Work</a></li>
							<li><a href="#education" data-toggle="tab">Education</a></li>
							<li><a href="#research" data-toggle="tab">Research</a></li>
							<li><a href="#publications" data-toggle="tab">Publications</a></li>
    						<li><a href="#presentations" data-toggle="tab">Presentations</a></li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane fade active in" id="work">
								<p>Since 2011, I have been a research scientist at <a href="http://www.gnresound.com/">GN ReSound</a>, where I am a principal investigator on several projects relating to hearing science and digital signal processing.</p>
								<p>2007-2011: Ran a consulting business (<a href="http://lsbaudio.com">LSB Audio, LLC</a>) part-time while working on my PhD.</p>
								<p>2003-2007: DSP Engineer at <A HREF="http://www.shure.com" target="new">Shure Incorporated</A> where I contibuted to a couple Advanced Development projects.  I was a summer intern in 2003 & 2004, then a full-time employee from May 2005 through August 2007.</p>
								<p>2000-2002: Three summer internships at <A HREF="http://www.mot.com">Motorola</A> doing everything from reverse engineering other company's cell phones to designing the audio system for OnStar.</p>
								<p>1998: Spent the summer after highschool doing electronics assembly and repair at <A HREF="http://www.drivecon.com/">DriveCon</A>.</p>
							</div><!--work-->
							<div class="tab-pane fade" id="education">
								<p>Ph.D., Biomedical Engineering - <A HREF="http://web.ics.purdue.edu/~jdboley/">Purdue University</A> (2013)<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thesis: <A HREF="research/BoleyDissertation.pdf">"Effects of Hearing Aid Amplification on Robust Neural Coding of Speech"</A>
								</p>
								<p>M.S., Music Engineering - University of Miami (2005)<br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thesis: <A HREF="school/miami/thesis.pdf">"<em>Auditory Component Analysis</em>: Using Perceptual Pattern Recognition to Identify and Extract Independent Components From an Auditory Scene"</A>.<br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#msprojects" style="padding: 0px 0px;">
									  <small>Click here to see more projects...</small>
									</button>
								</p>
								<div id="msprojects" class="collapse" style="margin-left:20px;">
									<ul><small>
										<li><strong>MPEG Committee</strong> (Represented the University of Miami at MPEG Meetings)
											   <ul><li>Conducted Listening Tests for Spatial Audio Coding</li>
											   <li>Worked with others to define standards and develop an audio library</li></ul>
										</li>
										<li><strong>Adaptive Feedback Reduction</strong> (Implemented an adaptive filter that removes acoustic feedback)</li>
										<li><a href="research/een698report.doc"><strong>Comparison of Cochlear Filter Banks</strong></a> (Compared Lyon's auditory filterbank with the ERB model.  Note: I now realize there were several problems with this study.  For instance, the 3 things I was comparing were very different things and probably should never have been compared in this way.)</li>
										<li><strong>MPEG Psychoacoustic Model 2 for Matlab</strong> (Click <a href="http://www.perceptualentropy.com/Model2.zip">HERE</a> for the code.)</li>
										<li><strong>Audio Steganography</strong> (Hiding data in an audio signal... included noise shaping and lossless compression)</li>
									</small></ul>
								</div>
								<p>B.S., Electrical Engineering  - University of Illinois at Urbana-Champaign (2003)<br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Senior Design Project: Designed a <a href="school/uiuc/Headphones.doc">portable audio spatializer</a> for headphones (using Dolby algorithms on a 56k DSP)<br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#bsprojects" style="padding: 0px 0px;">
									  <small>Click here to see more projects...</small>
									</button>
								</p>
								<div id="bsprojects" class="collapse" style="margin-left:20px;">
									<ul><small>
										  <li><strong><a href="http://www.perceptualentropy.com/coder.html" target="new">Perceptual Audio Coding</a></strong> (Learning to implement coders like MP3, AAC, AC3, etc.)</li>
										  <li><strong>Psychoacoustics</strong> (Imlementing various principles of psychoacoustics in Matlab)</li>
										  <li><strong>Audiovisual Speech Recognition in Automotive Environment </a></strong> (A project at <a href="http://audio.isl.uiuc.edu/avsr/">The Beckman Institute</a> that used 2 cameras and 2 microphones to enhance speech recognition)</li>
										  <li><strong>Automotive Hands-Free Telephones</strong> (echo-cancellation, noise-reduction, objective analysis of audio quality)</li>
										  <li><strong>Surround-Sound Headphones</strong> Used MIT's HRTF data to create a virtual 3D environment</li>
										  <li><strong>Using FFT's as Band-Pass Filters</a></strong></li>
										  <li><strong>Determing Loudspeaker Response</strong> (reference: C.A.
											Ewaskio and O.K. Mawardi (1950), &quot;Electroacoustic Phase Shift in Loudspeakers.&quot;
											<em>Journal of the Acoustical Society of America </em> <strong> 22</strong>(4)<em>:444-448.)</em></li>
										  <li><strong>Sound Analysis/Synthesis Techniques</strong> (reference: R.J. McAulay
											and T.F. Quatieri (1986), &quot;Speech Analysis/ Synthesis Based on a Sinusoidal
											Representation.&quot; <em>IEEE Transactions.</em> ASSP <strong>34</strong>(4):744-754.)</li>
										  <li><strong>Pitch Perception</strong> (reference: J.C.R. Licklider, &quot;A Duplex
											Theory of Pitch Perception.&quot; Experientia VII(4):128-134.)</li>
										  <li><strong>Basic Audio Coding</strong> (reference: Noll, &quot;MPEG Digital
											Audio Coding,&quot; <em>IEEE Signal Processing Magazine</em>, Sept. '97.)</li>
										  <li><strong>Advanced Coding Techniques</strong> (includes Water-Filling Bit Allocation
											and Sub-Band Quantization Using Signal-Mask Ratio)</li>
										  <li><strong>Speech Recognition</strong> (reference: Steven P. Davis and Paul Mermelstein,
											&quot;Comparison of Parametric Representations for Monosyllabic Word Recognition
											in Continuously Spoken Sentences.&quot; <em>IEEE Transactions ASSP</em> <strong>28</strong>(4):357-366.)</li>
										  <li><strong>Adaptive Filtering</strong></li>
									</ul>
								</small></div>
								<p><b>Other education:</b><br>
									<a href="http://www.pmi.org/Certification/Project-Management-Professional-PMP.aspx">Project Management Professional</a> (2010-Present)<br>
									<a href="http://www.esi-intl.com/certificates/project-management-and-it-project-management-certificates/master-certificate-in-project-management">Masters Certificate, Project Management</a> - The George Washington University, Washington D.C. (2009)<br>
									<a href="https://www.krannert.purdue.edu/executive/certificate/amp/home.php">Applied Management Principles</a> ("Mini-MBA" Course) Purdue University, West Lafayette, IN (2008)<br>
									Certificate, Electronic Equipment Repair <a href="http://www.techcampus.org/">Lake County Area Vocational Center</a>, Grayslake, IL (1998)
								</p>
							</div><!--education-->
							<div class="tab-pane fade" id="research">
								<p>
									My passion is studying audio perception, both behavioral and neurological. By combining my knowledge of psychoacoustics and auditory neurophysiology with my experience in digital signal processing, I enjoy creating technologies that improve audio quality.
								</p>
								<p>
									I'm slowly working on a wiki of auditory knowledge.  Check out the (very) early form at <a href="http://www.perceptualentropy.com/wiki">http://www.perceptualentropy.com/wiki</a>
								</p>
								<p>
									Some areas of research that I'm interested in include:
									<small><ul>
										<li>Psychoacoustics</li>
										<ul>
											<li>Masking, Loudness, Pitch, Localization, etc.</li>
											<li>Auditory Scene Analysis</li>
											<li>Computational Models of Perception</li>
											<li>Psychometric Methods</li>
										</ul>
										<li>Neural Coding</li>
										<ul>
											<li>Neural Correlates of Psychoacoustic Phenomena</li>
											<li>Coding of Relative Magnitude & Phase</li>
											<li>Efferent Control Systems</li>
										</ul>
										<li>Algorithms for Improving Audio Quality</li>
										<ul>
											<li>Adaptive Gain Control, Noise Reduction/Cancellation, Microphone Beamforming, etc.</li>
											<li>Audio Coding (MPEG, ADPCM, etc) & Error Concealment</li>
										</ul>
										<li>Hearing Impairment</li>
										<ul>
											<li>Diagnostic & Rehabilitation Methods</li>
											<li>Design of Prosthetic Devices (hearing aids, cochlear implants, brainstem implants, etc)</li>
										</ul>
									</ul></small>
								</p>
							</div><!--research-->
							<div class="tab-pane fade" id="publications">
								<p>
									<a href="http://www.mendeley.com/profiles/jon-boley/"><img border="0" src="http://www.mendeley.com/embed/icon/1/blue/small" alt="Research papers by Jon Boley"/></a>
								</p>
    							<p align="justify">
									Humphrey, E.J., S.K. Rits, J, Boley, O. Masciarotte. <a href="research/USpatent_8713593.pdf">"Detection System and Method for Mobile Device Application."</a> U.S. Patent No. 8,713,593. 29 April 2014.
								</p>
        						<p align="justify">
									Boley, J. <a href="http://jboley.com/research/BoleyDissertation.pdf">Effects of hearing aid amplification on robust neural coding of speech.</a> PhD Dissertation. Purdue University, 2013.
								</p>
								<p align="justify">
									Boley, J., M. Lester, and C. Danner, &quot;<a href="http://lsbaudio.com/publications/AES129_DynRange.pdf">Measuring Dynamics: Comparing and Contrasting Algorithms for the Computation of Dynamic Range</a>&quot; 2010 (129th Audio Engineering Society Convention).
								</p>
								<p align="justify">
									Gaston, L., J. Boley, S. Selter, and J. Ratterman, &quot;<a href="http://lsbaudio.com/publications/AES128_AV_SDT.pdf">The Influence of Individual Audio Impairments on Perceived Video Quality</a>&quot; 2010 (128th Audio Engineering Society Convention).
								</p>
								<p align="justify">
									Heinz, M., J. Swaminathan, J. Boley, and S. Kale, &quot;Across-Fiber Coding of Temporal Fine-Structure: Effects of Noise-Induced Hearing Loss on Auditory Nerve Responses,&quot; in <a href="http://www.amazon.com/Neurophysiological-Bases-Auditory-Perception/dp/1441956859/ref=sr_1_1?ie=UTF8&s=books&qid=1257864635&sr=8-1">The Neurophysiological Bases of Auditory Perception</a>. Springer (New York), 2010.
								</p>
								<p align="justify">
									Kale, S., J. Boley, J. Swaminathan, M. Heinz, &quot;<a href="http://web.ics.purdue.edu/~jdboley/ARO2010.pdf">Within and across fiber temporal fine structure coding following noise induced hearing loss</a>,&quot; February 2010  (Poster at the 33rd Midwinter Meeting of the Association for Research in Otolaryngology)
								</p>
								<p align="justify">
									Boley, J. and M. Lester, &quot;<a href="http://lsbaudio.com/publications/AES127_ABX.pdf">Statistical Analysis of ABX Results Using Signal Detection Theory</a>&quot; 2009 (127th Audio Engineering Society Convention)<br>
									[Click <a href="http://www.lsbaudio.com/ABX">HERE</a> for supplemental information.]
								</p>
								<p align="justify">
									Boley J., &quot;<a href="http://jboley.com/research/QLA/QLA.pdf">Improving hearing aid dynamic gain control algorithms based on auditory nerve coding</a>,&quot; 2008 (Qualifying Literature Assessment for Ph. D. Dissertation, Purdue University)
								</p>
								<p align="justify">
									Boley J. and M. Heinz, &quot;<a href="http://web.ics.purdue.edu/~jdboley/Boley_Poster_Sept_2008.pdf">Quantifying the Effects of Hearing Aid Dynamics on Temporal Coding in the Auditory Nerve</a></b>,&quot; September 2008 (Poster at the First International Symposium on Audible Acoustics in Medicine and Physiology, Purdue University)
								</p>
								<p align="justify">
									Lester M. and Boley J., &quot;<a href="http://lsbaudio.com/publications/AES_Latency.pdf">The Effects of Latency on Live Sound Monitoring</a>&quot;, 2007. (123rd Audio Engineering Society Convention)
								</p>
								<p align="justify">
									Boley J., &quot;<a href="http://lsbaudio.com/publications/AES_ACA.pdf">Auditory Component Analysis</a>,&quot; 2006 (121st Audio Engineering Society Convention)
								</p>
								<p align="justify">
									Boley J., &quot;<a href="http://lsbaudio.com/publications/jonsthesis.pdf">Auditory Component Analysis: Using Perceptual Pattern Recognition to Identify and Extract Independent Components from an Auditory Scene</a>,&quot; 2005 (University of Miami Master's Thesis)
								</p>
							</div><!--publications-->
    						<div class="tab-pane fade" id="presentations">
								<p>2014: <A HREF="talks/phase">The Psychoacoustics of Phase</A> (presented to the Chicago section of the Audio Engineering Society)</p>
								<iframe width="560" height="315" src="//www.youtube.com/embed/qOM_M926o-g?rel=0" frameborder="0" allowfullscreen></iframe>
								<p>2013: <A HREF="talks/BoleyPhD_Defense_PPT.pdf">The Effects of Hearing Aid Amplification on Robust Neural Coding of Speech</A> (PhD Defense)</p>
								<p>2006: <A HREF="talks/High_Fs_PPT.pdf">Why Higher Sampling Rates Are Better… And Worse</A> (presented to the Univ of Miami student section of the Audio Engineering Society)</p>
							</div><!--work-->
						</div><!--class="tab-content"-->

					</div><!--class="well"-->
				</div><!--id="about"-->

			</div><!--class="container"-->

			<div id="push"></div>

		</div><!--id="wrap"-->

		<div id="footer">
			<div class="container">
				<p class="muted credit">&copy; Jon Boley 2013.</p>
			</div>
		</div>

		<!-- Contact Modal -->
		<div id="contactWindow" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-body">
				<div id="contact-form" class="clearfix">

					<form id="myform" method="post" action="process.php">
						<label for="name">Name: </label>
						<input type="text" id="name" name="name" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['name'] : '' ?>" placeholder="John Doe" required style="margin-bottom:5px;"/>

						<label for="email" style="">Email Address: </label>
						<input type="email" id="email" name="email" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" placeholder="johndoe@example.com" required style="margin-bottom:5px;"/>

						<label for="message">Message: <small>(<span id=charCounter>0</span> characters)</small></label>
						<textarea onKeyUp="return taCount(this,'charCounter')" id="message" name="message" placeholder="Your message must be greater than 20 characters" required data-minlength="20"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['message'] : '' ?></textarea>

						<div class="g-recaptcha" data-sitekey="6LcmYd0SAAAAAEABtK_82T3QPBrRgUX94R6oTx_u"></div>

						<!--span id="loading"></span-->
						<p style="margin:0;">
							<input class="btn btn-primary" type="submit" value="Submit" style="width:100px;"/>
							<button class="btn pull-right" data-dismiss="modal" aria-hidden="true">Cancel</button>
						</p>
					</form>
					<?php unset($_SESSION['cf_returndata']); ?>
				</div><!--id="contact-form"-->
			</div><!--class="modal-body"-->
		</div><!--id="contactwindow"-->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!--script>
        	window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.9.1.min.js"><\/script>')
        </script-->

        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-38494371-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

		<script>
			var offset = 48;

			$('.anchor a').click(function(event) {
				event.preventDefault();
				$($(this).attr('href'))[0].scrollIntoView();
				scrollBy(0, -offset);
			});
		</script>

		<script>
			$('.carousel').carousel({
			  interval: 20000
			})
		</script>

		<script>
			<?php if($sr) { ?>
        		$(function() {
					$('#alertWindow').modal('show');
				});

			<?php } ?>

		</script>


    </body>
</html>
