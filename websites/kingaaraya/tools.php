<?php
// handle the formif (isset($_POST['submit'])) { // write the new informations to file	$filename = "_includes/theme_config";	$handle = fopen($filename, "w");	$new_theme = $_POST['theme'];	if (fwrite($handle, $new_theme) == FALSE) { // if fails leaves program		echo "<p>Could not change the theme due to a system error.</p>";		exit;		}	fclose($handle);}
$page_title ="Kinga Araya | Tools";include('_includes/header.inc');?><p>Theme</p><?php // ************** GET THE CURRENT THEME ***************$filename = "_includes/theme_config";$handle = fopen($filename, "r");$theme = fread($handle, filesize($filename));fclose($handle);// ************ GET THE LIST OF ALL THEMES ************$dh = opendir("_themes");$num_themes = 0;while (false != ($file = readdir($dh))) { 	if ($file != "." && $file != ".." && $file != ".DS_Store") {		$themes[] = $file;		$num_themes++;	}}sort($themes); // sort the themes alphabetically?><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><select name="theme"><?phpfor ($i = 0; $i < $num_themes; $i++) {	echo '<option value="' . $themes[$i] . '" ';	if ($themes[$i] == $theme) echo 'selected="selected"';	echo '>' . $themes[$i] . '</option>';}?></select><input type="submit" name="submit" value="save" /></form><p>Inspect code</p><?php // ************ GET THE LIST OF ALL THE FILES ************$dh = opendir("./");$num_pages = 0;while (false != ($file = readdir($dh))) { 	if ($file != "." && $file != ".." && $file != ".DS_Store" && filetype($file) != 'dir' ) {		$pages[] = $file;		$num_pages++;	}}sort($themes); // sort the themes alphabetically?><form action="tools_inspect.php" method="post"><select name="pages"><?phpfor ($i = 0; $i < $num_pages; $i++) {	echo '<option value="' . $pages[$i] . '">' . $pages[$i] . '</option>';}?></select><input type="submit" name="submit" value="inspect" /></form><?php include('_includes/footer.inc'); ?>