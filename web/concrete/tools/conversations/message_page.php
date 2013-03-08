<? defined('C5_EXECUTE') or die("Access Denied."); ?>
<? 
$cnv = Conversation::getByID($_POST['cnvID']);
if (is_object($cnv)) {
	$enablePosting = ($_POST['enablePosting'] == 1) ? true : false;
	$enableOrdering = ($_POST['enableOrdering'] == 1) ? true : false;
	$currentPage = (Loader::helper('validation/numbers')->integer($_POST['page'])) ? $_POST['page'] : 1;
	
	$ml = new ConversationMessageList($cnv);

	switch($_POST['orderBy']) {
		case 'date_desc':
			$ml->sortByDateDescending();
			break;
		case 'date_asc':
			$ml->sortByDateAscending();
			break;
		case 'rating':
			$ml->sortByRating();
			break;
	}

	$ml->setItemsPerPage($_POST['itemsPerPage']);

	$summary = $ml->getSummary();
	$totalPages = $summary->pages;

	foreach($ml->getPage($currentPage) as $message) {
		Loader::element('conversation/message', array('message' => $message, 'enablePosting' => $enablePosting));
	}

}