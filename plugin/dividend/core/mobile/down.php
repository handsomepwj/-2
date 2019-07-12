<?php  if( !defined("IN_IA") ) 
{
	exit( "Access Denied" );
}
require(EWEI_SHOPV2_PLUGIN . "dividend/core/page_login_mobile.php");
class Down_EweiShopV2Page extends DIvidendMobileLoginPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$page_title = "商城";
		if( !empty($_W["shopset"]["shop"]["name"]) ) 
		{
			$page_title = $_W["shopset"]["shop"]["name"];
		}
		$member = $this->model->getInfo($_W["openid"]);

//获取一级下线队长信息8
		$mb = pdo_fetch("select * from" . tablename("ewei_shop_member") . "where agentid =:agentid and isheads = 1 and headsstatus = 1 ",array( ":agentid" => $member["id"]));

//获取二级下线队长信息7
		$mb1 = pdo_fetch("select * from" . tablename("ewei_shop_member") . "where agentid =:agentid and isheads = 1 and headsstatus = 1 ",array( ":agentid" => $mb["id"]));

//获取三级下线队长信息6
		$mb2 = pdo_fetch("select * from" . tablename("ewei_shop_member") . "where agentid =:agentid and isheads = 1 and headsstatus = 1 ",array( ":agentid" => $mb1["id"]));		

//一级下线队长人数
		$count = pdo_fetch("select count(id) from " . tablename("ewei_shop_member") . "where agentid =:agentid and isheads = 1 and headsstatus = 1 ", array(":agentid" => $member["id"]));

//自己会员的分红
		$dividen = pdo_fetchall("select * from " . tablename("ewei_shop_order"). "where headsid = :headsid and status >= 3", array(":headsid" => $member["id"]) );
		
		if( !empty($dividen) ) 
				{
					
					foreach( $dividen as $v ) 
					{		
						//$dividend = iunserializer($v["price"]);
						$dividend_ok += $v["price"];
					}

				}



//一级下线的分红
		$dividen1 = pdo_fetchall("select * from " . tablename("ewei_shop_order"). "where headsid = :headsid and status >= 3", array(":headsid" => $mb["id"]) );

		
		$dividena = pdo_fetchall("select * from " . tablename("ewei_shop_order"). "where headsid = 0 and status >= 3 and agentid=:headsid", array(":headsid" => $mb["id"]) );
		echo ("<script>console.log('".json_encode($dividen1)."');</script>");
		echo ("<script>console.log('".json_encode($dividena)."');</script>");
		if( !empty($dividena) ) 
				{
					
					foreach( $dividena as $k ) 
					{		
						//$dividend = iunserializer($v["price"]);
						$dividend_oka += $k["price"];
					}
					
				}
	
		if( !empty($dividen1) ) 
				{
					
					foreach( $dividen1 as $v ) 
					{		
						//$dividend = iunserializer($v["price"]);
						$dividend_ok1 += $v["price"];
					}
					
				}
//二级下线队长人数
		$count1 = pdo_fetch("select count(id) from " . tablename("ewei_shop_member") . "where agentid =:agentid and isheads = 1 and headsstatus = 1 ", array(":agentid" => $mb["id"]));
		//$mem = pdo_fetchall("select * from " . tablename("ewei_shop_member") . "where headsid = :headsid and isheads = 0 and headsstatus = 0 " , array(":headsid" => $member["id"]));

		//$mb = pdo_fetch("select * from" . tablename("ewei_shop_member") . "where agentid =:agentid and isheads = 1 and headsstatus = 1 ",array( ":agentid" => $member["id"]));


//二级下线的分红
		$dividen2 = pdo_fetchall("select * from " . tablename("ewei_shop_order"). "where headsid = :headsid and status >= 3", array(":headsid" => $mb1["id"]) );

		$dividenb = pdo_fetchall("select * from " . tablename("ewei_shop_order"). "where headsid = 0 and status >= 3 and agentid=:headsid", array(":headsid" => $mb1["id"]) );
		if( !empty($dividenb) ) 
				{
					
					foreach( $dividenb as $k ) 
					{		
						//$dividend = iunserializer($v["price"]);
						$dividend_okb += $k["price"];
					}
					
				}
		if( !empty($dividen2) ) 
				{
				
					foreach( $dividen2 as $v ) 
					{		
						//$dividend = iunserializer($v["price"]);
						$dividend_ok2 += $v["price"];
					}
				}
//三级下线队长人数
		$count2 = pdo_fetch("select count(id) from " . tablename("ewei_shop_member") . "where agentid =:agentid and isheads = 1 and headsstatus = 1 ", array(":agentid" => $mb1["id"]));



//三级下线的分红
		$dividen3 = pdo_fetchall("select * from " . tablename("ewei_shop_order"). "where headsid = :headsid and status >= 3", array(":headsid" => $mb2["id"]) );


		$dividenc = pdo_fetchall("select * from " . tablename("ewei_shop_order"). "where headsid = 0 and status >= 3 and agentid=:headsid", array(":headsid" => $mb2["id"]) );
		if( !empty($dividenc) ) 
				{
					
					foreach( $dividenc as $k ) 
					{		
						//$dividend = iunserializer($v["price"]);
						$dividend_okc += $k["price"];
					}
					
				}
		if( !empty($dividen3) ) 
				{
					$dividend_ok3 = 0;
					foreach( $dividen3 as $v ) 
					{		
						//$dividend = iunserializer($v["price"]);
						$dividend_ok3 += $v["price"];
					}
				}

		//$list = pdo_fetchall("select * from " . tablename("ewei_shop_member") . " where uniacid = :uniacid order by id desc limit " . ($pindex) * $psize . "," . $psize, array( ":uniacid" => $_W["uniacid"] ));

			//$order = pdo_fetchall("select * from " . tablename("ewei_shop_order") . " where 1 and agentid = 4770 and status >= 0 and uniacid = :uniacid", array( ":uniacid" => $_W["uniacid"] ));

		//echo ("<script>console.log('".json_encode($dividen1)."');</script>");
		//echo ("<script>console.log('".json_encode($dividenc)."');</script>");
		//echo ("<script>console.log('".json_encode($order)."');</script>");
		// echo ("<script>console.log('".json_encode($mb)."');</script>");
		// echo ("<script>console.log('".json_encode($mb2["id"])."');</script>");	
		// echo ("<script>console.log('".json_encode($mb2)."');</script>");	
		include($this->template());
	}


	public function get_list() 
	{
		global $_W;
		global $_GPC;
		$openid = $_W["openid"];
		$member = $this->model->getInfo($openid);
		$groupscount = $member["groupscount"];
		$pindex = max(1, intval($_GPC["page"]));
		$psize = 100;

	//	$mb = pdo_fetch("select * from" . tablename("ewei_shop_member") . "where agentid =:agentid ",array( ":agentid" => $member["id"]));
		//$openid1 = $mb["openid"];
		//$mem = $this->model->getInfo($openid1);
		
	//	$mb1 = pdo_fetch("select * from" . tablename("ewei_shop_member") . "where agentid =:agentid ",array( "//:agentid" => $mb["id"]));
	//	$mb2 = pdo_fetch("select * from" . tablename("ewei_shop_member") . "where agentid =:agentid ",array( "//:agentid" => $mb1["id"]));

		$list = pdo_fetchall("select * from " . tablename("ewei_shop_member") . " where headsid=:headsid and uniacid = :uniacid order by id asc limit 100" , array(":headsid" => $member["id"], ":uniacid" => $_W["uniacid"] ));

//
	//	$list1 = pdo_fetchall("select * from " . tablename("ewei_shop_member") . " where headsid = :headsid and //uniacid = :uniacid order by id desc limit " . ($pindex - 1) * $psize . "," . $psize, array( ":headsid"// => $mb["id"], ":uniacid" => $_W["uniacid"] ));
	//	$list2 = pdo_fetchall("select * from " . tablename("ewei_shop_member") . " where headsid = :headsid and //uniacid = :uniacid order by id desc limit " . ($pindex - 1) * $psize . "," . $psize, array( ":headsid"// => $mb1["id"], ":uniacid" => $_W["uniacid"] ));
	//	$list3 = pdo_fetchall("select * from " . tablename("ewei_shop_member") . " where headsid = :headsid and uniacid = :uniacid order by id desc limit " . ($pindex - 1) * $psize . "," . $psize, array( ":headsid" => $mb2["id"], ":uniacid" => $_W["uniacid"] ));


		if( !empty($list) ) 
		{
			
			foreach( $list as &$row ) 
			{
				
				$order = pdo_fetchall("select id,price,dividend from " . tablename("ewei_shop_order") . " where openid=:openid and headsid = :headsid and uniacid=:uniacid", array( ":uniacid" => $_W["uniacid"], ":openid" => $row["openid"], ":headsid" => $member["id"] ));
				
				
				$money = 0;

				foreach( $order as $k => $v ) 
				{
					$dividend = iunserializer($v["dividend"]);
					$money += $dividend["dividend_price"];
				}
				$row["ordercount"] = count($order);
				$row["moneycount"] = floatval($money);
				$row["createtime"] = date("Y-m-d H:i", $row["createtime"]);
					

				
			}
			unset($row);
		}
	
		
		show_json(1, array( "list" => $list, "total" => $groupscount, "pagesize" => $psize ));
	}
}
?>