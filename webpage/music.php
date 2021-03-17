<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>


		<div id="listarea">
			<ul id="musiclist">
				<?php
					if(isset($_REQUEST["playlist"])) {
						$musics = explode("\n", file_get_contents('songs/'.$_REQUEST["playlist"]));
					} else {
						$musics = scandir("./songs");
					}

					array_shift($musics);
					array_shift($musics);
					foreach ($musics as $music) {
						$musicSize = filesize("./songs/$music");
						$type = explode(".", $music)[1];
						$className = "mp3item";
						$url = "songs/$music";

						if ($type == "txt") {
							$className = "playlistitem";
							$url = "music.php?playlist=$music";
						}

						echo 
						"<li class=\"{$className}\">
							<a href=\"{$url}\">{$music}</a>
							({$musicSize} b)
						</li>";
					}
				?>
			</ul>
		</div>
	</body>
</html>
