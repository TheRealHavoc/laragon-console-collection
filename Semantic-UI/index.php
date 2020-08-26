<?php
    $request = (object) [];
    $request->uri = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Laragon</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" intergrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	</head>
	<body style="background: #f7faff">

        <div class="ui secondary menu" style="background: white; box-shadow: 0px 2px 6px 1px rgba(0,0,0,0.1);">
            <div class="ui center aligned container">
                <div class="item">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
                        <g>
                            <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="12.0835" y1="1.7188" x2="12.0835" y2="22.5">
                                <stop offset="0.0181" style="stop-color:#3BB6FF"/>
                                <stop offset="0.3023" style="stop-color:#39AFFF"/>
                                <stop offset="0.5519" style="stop-color:#36A3FF"/>
                                <stop offset="0.7173" style="stop-color:#359FFF"/>
                                <stop offset="0.8316" style="stop-color:#3398FF"/>
                                <stop offset="0.9639" style="stop-color:#3297FF"/>
                            </linearGradient>
                            <path fill="url(#SVGID_1_)" d="M0.838,8.631c0.041-0.123,1.769-6.05,8.613-6.133c0,0,2.87-3.246,6.78,0   c0,0,1.061,0.872,1.643,2.682c0,0,5.134,0.779,5.965,5.022c0,0,1.732,6.987-4.133,11.896c0,0-0.826,0.661-1.376,0.968   c0,0-1.22,0.002-1.472,0c-0.537-0.004-0.876,0-1.364,0c0,0-0.75-0.268-0.781-1.125c0,0-0.063-2.98-0.046-3.495   c0,0,0.015-0.482-0.687-0.452c0,0-0.67-0.077-0.765,0.499c0,0-0.016,3.074-0.031,3.619c0,0-0.047,0.907-1.061,0.951   c0,0-3.635,0.11-4.118-0.062c0,0-0.842-0.156-0.905-0.952c0,0-0.687-4.056-0.811-5.318c0,0-2.309-1.28-2.777-1.623   c0,0,0.156,4.133,1.591,5.881c0,0,0.25,0.219-0.25,0.53c0,0-0.187,0.156-0.375,0.064c0,0-6.155-3.438-3.888-12.213"/>
                            <path fill="#006699" d="M7.728,14.285c0,0,5.37,3.061,8.619-1.853c0,0,2.631-3.436,1.583-7.101c0,0,1.845,3.08-1.725,7.859   C16.206,13.191,13.178,17.451,7.728,14.285z"/>
                            <path fill="#CEE6FF" d="M5.603,13.563c0,0,0.383,1.773-0.795,2.331c0,0-2.68-1.104-2.409-3.143c0,0,0.084-0.509,0.583-0.197   c0,0,1.186,0.645,2.122,0.831C5.103,13.385,5.579,13.429,5.603,13.563z"/>
                            <path fill="#006699" d="M4.859,10.566c0,0,0.404-1.727,1.929-1.618c0,0,1.296,0.035,1.342,1.817   C8.13,10.766,7.109,8.1,4.859,10.566z"/>
                        </g>
                    </svg>
                </div>

                <a class="item <?php echo ($request->uri == '/' ? 'active' : '') ?>" href="/">Home</a>
                <a class="item <?php echo ($request->uri == '/?info' ? 'active' : '') ?>" href="?info">Info</a>
            </div>
        </div>

        <?php
            if (!isset($_GET['info'])):
        ?>
            <div class="ui aligned container">
                <div class="ui segments">
                    <div class="ui segment">
                        <h2 class="ui header">Projects</h2>
                    </div>
                    <div class="ui segment">
                        <div class="ui large relaxed divided list">

                            <?php
								$i = 0;

                                foreach (glob('*', GLOB_ONLYDIR) as $directory):
                                	$virtualhost = "http://{$directory}.local";
									$created_on = date("F d Y H:i:s", filemtime($directory));
									
									$i++;
                            ?>
                                <div class="item">
                                    <i class="large folder outline middle aligned icon"></i>
                                    <div class="content">
                                        <a href="<?php echo $virtualhost; ?>" class="header"><?php echo $virtualhost; ?></a>
                                        <a href="<?php echo $virtualhost; ?>" class="header"><?php echo $virtualhost; ?></a>
                                        <div class="description">Created on: <?php echo $created_on; ?></div>
                                    </div>
                                </div>
                            <?php
                                endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="ui secondary segment">
                        <p>Showing <?php echo $i; ?> project<?php echo ($i == 1) ? '' : 's';?>.</p>
                    </div>
                </div>

                <div class="ui three column grid">
                    <div class="column">
                        <div class="ui fluid card">
                            <div class="content">
                                <div class="header">Server Software</div>
                                <div class="description">
                                    <?php echo $_SERVER['SERVER_SOFTWARE']; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="ui fluid card">
                            <div class="content">
                                <div class="header">PHP version</div>
                                <div class="description">
                                    <?php echo phpversion(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="ui fluid card">
                            <div class="content">
                                <div class="header">Document root</div>
                                <div class="description">
                                    <?php echo $_SERVER['DOCUMENT_ROOT']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                else:
            ?>
                <div class="ui aligned container">
                    <?php
                        ob_start();
                        phpinfo();
                        $pinfo = ob_get_contents();
                        ob_end_clean();

                        $pinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$pinfo);
                        echo $pinfo;
                    ?>
                </div>
            <?php
                endif;
            ?>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
	</body>
</html>