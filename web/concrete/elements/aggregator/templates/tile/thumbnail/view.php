<? defined('C5_EXECUTE') or die("Access Denied."); ?>
<?
if (is_array($image)) {
	$image = $image[0];
}
?>

<div style="width: 100%; height: 100%; background-repeat: no-repeat; background-position: center; background-image: url('<?=$image->getPath()?>');">
	<a style="width: 100%; height: 100%; display: block" href="#" data-overlay="aggregator-item"></a>
</div>