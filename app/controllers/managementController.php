<?php  
	require_once '../DB.php';

	if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 


		if($_REQUEST['action'] == 'manageMembers'){

			include_once "../models/memberModel.php";

			$member = new memberModel();
			$result = $member->getListMember();
			$membersList= $result->fetch_all(MYSQLI_ASSOC);

			require_once "../views/management/membersManagement.php";


		}else if ($_REQUEST['action'] == 'manageComments'){

			include_once '../models/rateCommentModel.php';

			$manage = new rateCommentModel();

			$sumRate= $manage->getSumRate();

			$sumComment =$manage->getSumComment();

			$list = $manage->getAll();

			require_once '../views/management/rateComManagement.php';

		}else if ($_REQUEST['action'] == 'inboxManagement'){
			include_once '../models/chatModel.php';
			$chat = new ChatModel();
			$row = $chat->getAdmininfor();

			require_once '../views/management/inboxManagement.php';



		}else if ($_REQUEST['action'] == 'manageExceptionInfors'){



		}else if ($_REQUEST['action'] == 'detailInboxMang'){
			$user_id = $_GET['user_id'];
			require_once '../views/management/detailInboxManagement.php';

		}else if ($_REQUEST['action'] == 'manageProducts'){

			require_once "../models/productModel.php";

			$product = new productModel();
			$result = $product->getAll();
			$productsList= $result->fetch_all(MYSQLI_ASSOC);

			require_once "../views/management/ProductsManagement.php";

		}
		else if ($_REQUEST['action'] == 'revenueManagement'){

			// include_once '../models/rateCommentModel.php';

			// $manage = new rateCommentModel();

			// $sumRate= $manage->getSumRate();

			// $sumComment =$manage->getSumComment();

			// $list = $manage->getAll();
			require_once "../models/productModel.php";

			$product = new productModel();
			$result = $product->getAll();
			$productsList= $result->fetch_all(MYSQLI_ASSOC);
			require_once '../views/management/RevenueManagement.php';

		}
		else if ($_REQUEST['action'] == 'searchingManagement'){

		require_once "../models/productModel.php";

		// $product = new productModel();
		// $result = $product->getAll();
		// $productsList= $result->fetch_all(MYSQLI_ASSOC);

		require_once "../views/management/SearchingManagement.php";

	}


	}



?>