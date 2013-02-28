<?php

$main_dir = wp_upload_dir(); 
$upload_dir = $main_dir['basedir'];
$download_dir = $main_dir['baseurl'];
$exportFile = $upload_dir.'/coretweaks_export.csv';
$fh = fopen($exportFile, 'w') or die("Your uploads folder must exist and be writable to create an export.");
fwrite($fh, $_GET['data']);
fclose($fh);

?>
<a id="downloadLink" href="<?php echo $download_dir; ?>/coretweaks_export.csv">Download</a>

<script>
//document.getElementById('downloadLink').click();
//location.href = 'admin.php?page=seo-automatic-wp-core-tweaks/settings.php';
</script>

<?php
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');


 fputcsv($_GET['data']);
?>