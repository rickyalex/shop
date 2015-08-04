<?php

function nice_input($value, $field, $primary_key, $list, $xcrud)
{
	return $value.' - test';
}


function my_functions($xcrud){
	$myvalue = $xcrud->get('kode_kustomer'); // data-myvalue attr.
	// some manipulations
	$postdata->set('kode_kustomer', $myvalue );
	// die($myvalue);
	// $xcrud->set_exception('password','Your password is too simple.');
} 

function publish_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'1\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}
function unpublish_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'0\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}

function exception_example($postdata, $primary, $xcrud)
{
    $xcrud->set_exception('ban_reason', 'Lol!', 'error');
    $postdata->set('ban_reason', 'lalala');
}

function test_column_callback($value, $fieldname, $primary, $row, $xcrud)
{
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $xcrud)
{
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if ($ext != 'pdf' && $field == 'uploads.simple_upload')
    {
        unlink($file_path);
        $xcrud->set_exception('simple_upload', 'This is not PDF', 'error');
    }
}

function date_example($postdata, $primary, $xcrud)
{
    $created = $postdata->get('datetime')->as_datetime();
    $postdata->set('datetime', $created);
}

function movetop($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != 0)
            {
                array_splice($result, $key - 1, 0, array($item));
                unset($result[$key + 1]);
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function movebottom($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != $count - 1)
            {
                unset($result[$key]);
                array_splice($result, $key + 1, 0, array($item));
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
// function open_dn($xcrud)
// {
    // if ($xcrud->get('primary'))
    // {
        // $db = Xcrud_db::get_instance();
        // $query = 'UPDATE trans_transaksi_invoice_detail_dn a
									// SET a.status = "Open", a.total = 0
									// WHERE a.nid = ' . (int)$xcrud->get('primary');
        // $query2 = 'UPDATE trans_transaksi_dn_header_new a
									// SET a.status_surat_jalan = "Open"
									// WHERE a.no_surat_jalan = (select b.no_surat_jalan from trans_transaksi_invoice_detail_dn b
										// WHERE b.nid = ' . (int)$xcrud->get('primary') . ')';
        // $db->query($query);
        // $db->query($query2);
    // }
// }
// function close_dn($xcrud)
// {
    // if ($xcrud->get('primary'))
    // {
        // $db = Xcrud_db::get_instance();
        // $query = 'UPDATE trans_transaksi_invoice_detail_dn a
									// SET a.status = "Close1", a.total = 
															// (SELECT b.total 
																	// FROM trans_transaksi_dn_detail_new b 
																	// WHERE b.no_surat_jalan = a.no_surat_jalan)
									// WHERE a.nid = ' . (int)$xcrud->get('primary');
        // $query2 = 'UPDATE trans_transaksi_dn_header_new a
									// SET a.status_surat_jalan = "Close1"
									// WHERE a.no_surat_jalan = (select b.no_surat_jalan from trans_transaksi_invoice_detail_dn b
										// WHERE b.nid = ' . (int)$xcrud->get('primary') . ')';
        // $db->query($query);
        // $db->query($query2);
    // }
// }
function open_dns($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE trans_transaksi_invoices_detail_dn a
									SET a.status = "Open", a.total = 0
									WHERE a.nid = ' . (int)$xcrud->get('primary');
        $query2 = 'UPDATE trans_transaksi_dn_detail_new a
									SET a.status_surat_jalan = "Open"
									WHERE a.no_surat_jalan = (select b.no_surat_jalan from trans_transaksi_invoices_detail_dn b
										WHERE b.nid = ' . (int)$xcrud->get('primary') . ')';
		//die("query1 : ".$query.", query2 : ".$query2);
        $db->query($query);
        $db->query($query2);
        
        $sel = 'SELECT kode_transaksi from trans_transaksi_invoices_detail_dn where nid = ' . (int)$xcrud->get('primary');
		//die("sel : ".$sel);
		$db->query($sel);
		$kode_transaksi = $db->row()['kode_transaksi'];
		
		$query3 = 'UPDATE trans_transaksi_invoices_header a
									SET a.nominal = (SELECT sum(b.total) FROM trans_transaksi_invoices_detail_dn b 
									WHERE b.kode_transaksi = ' . $kode_transaksi . ' and b.status = "Proses Penagihan")
									WHERE a.kode_transaksi = ' . $kode_transaksi . '';
		$db->query($query3);								
    }
}
function close_dns($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE trans_transaksi_invoices_detail_dn a
									SET a.status = "Proses Penagihan", a.total = 
															(SELECT sum(b.total) 
																	FROM trans_transaksi_dn_detail_new b 
																	WHERE b.no_surat_jalan = a.no_surat_jalan)
									WHERE a.nid = ' . (int)$xcrud->get('primary');
        $query2 = 'UPDATE trans_transaksi_dn_detail_new a
									SET a.status_surat_jalan = "Proses Penagihan"
									WHERE a.no_surat_jalan = (select b.no_surat_jalan from trans_transaksi_invoices_detail_dn b
										WHERE b.nid = ' . (int)$xcrud->get('primary') . ')';
		
		$db->query($query);
        $db->query($query2);
        
        $sel = 'SELECT kode_transaksi from trans_transaksi_invoices_detail_dn where nid = ' . (int)$xcrud->get('primary');
		//die("sel : ".$sel);
		$db->query($sel);
		$kode_transaksi = $db->row()['kode_transaksi'];
		
		$query3 = 'UPDATE trans_transaksi_invoices_header a
									SET a.nominal = (SELECT sum(b.total) FROM trans_transaksi_invoices_detail_dn b 
									WHERE b.kode_transaksi = ' . $kode_transaksi . ' and b.status = "Proses Penagihan")
									WHERE a.kode_transaksi = ' . $kode_transaksi . '';
		$db->query($query3);
		
		//die("query1 : ".$query.", query2 : ".$query2);
        
    }
}
function update_balance($postdata,$xcrud)
{
	Xcrud_config::$dbname = 'bcspurchase_2015';
	Xcrud_config::$dbuser = 'root';
	Xcrud_config::$dbpass = 'c1l3g0nbcs321';
	Xcrud_config::$dbhost = '10.2.2.32';
	$db = Xcrud_db::get_instance();
	$po_item_id = "";
	$material_id = "";
	$user_group = "";
	$lpb_no = $postdata->get('lpb_no');
	$qty_lpb = $postdata->get('qty');
	$date_created = date('Y-m-d H:i:s');
	$last_updated = date('Y-m-d H:i:s');
	$mode = 'in'; //WRS menambah qty on hand (in)
	
	if($postdata->get('created_by')==true) $user = $postdata->get('created_by');
	else $user = "";
	 
	if($postdata->get('user_group')==true) $user_group = $postdata->get('user_group');
	
	
	if($postdata->get('po_item_id')==true){ //PR
		$po_item_id = $postdata->get('po_item_id');
		
		$a = "select a.material_id from m_description a, pr_detail b, po_item c where a.material_id=b.material_id and b.pr_id=c.pr_id and c.po_item_id='$po_item_id'";
		$db->query($a);
		$material_id = $db->row()['material_id'];
		
		$b = "select po_item.qty from po_item where po_item_id='".$po_item_id."'"; 
		$db->query($b);
		$qty_po = $db->row()['qty'];
		$balance =($qty_po -$qty_lpb);
		$db->query("UPDATE po_item SET lpb_balance ='$balance', modified_date='$last_updated' WHERE po_item_id='$po_item_id'");
		
		$c = "update lpb_detail set material_id='$material_id' where lpb_no='$lpb_no' and po_item_id='$po_item_id'";
		$db->query($c);
		
		$d = "select description from eproc_m_description where material_id='".$material_id."'";
		$db->query($d);
		$desc = $db->row()['description'];
	}
	else if($postdata->get('material_id')==true){ //non PR
		$po_item_id = "";
		$material_id = $postdata->get('material_id');
		$price = $postdata->get('price');
	}
	else{
		die("ID error");
	}
	
	$d = "INSERT INTO inventory_history (po_item_id,module_no,qty,material_id,user_group,created_by,date_created,mode,description) VALUES ('$po_item_id','$lpb_no','$qty_lpb','$material_id','$user_group','$user','$date_created','$mode','$desc')";			
	$db->query($d);
}
function update_on_hand($postdata,$xcrud)
{
	Xcrud_config::$dbname = 'ims';
	Xcrud_config::$dbuser = 'root';
	Xcrud_config::$dbpass = 'c1l3g0nbcs321';
	Xcrud_config::$dbhost = '10.2.2.32';
	$db = Xcrud_db::get_instance('ims');
	
	$count = 0;
	$sum = 0;
	$x=0;
	$query_update = "";
	$po_item_id = "";
	
	$qty = $postdata->get('qty');
	$min = $qty;
	$material_id = $postdata->get('material_id');
	
	if($postdata->get('ss_no')==true) $module_no = $postdata->get('ss_no');
	else if($postdata->get('dn_no')==true) $module_no = $postdata->get('dn_no');
	else if($postdata->get('iis_detail_iis_no')==true) $module_no = $postdata->get('iis_detail_iis_no');
	else if($postdata->get('its_detail_its_no')==true) $module_no = $postdata->get('its_detail_its_no');
	
	if($postdata->get('created_by')==true) $user = $postdata->get('created_by');
	else $user = $postdata->get('updated_by');
	
	$last_updated = date("Y-m-d H:i:s");
	$mode = 'out'; //good issue mengurangi qty on hand (out)
	
	//cari site alias user
	$query_user = "select site_alias, description
					from ims.groups a, ims.users b
					where a.id=b.default_group and b.id='$user'";
	//die($query_user);
	$exec = $db->query($query_user);
	$array = $db->result();
	$site_alias = $array[0]['site_alias'];
	$user_group = $array[0]['description'];
	//die("site alias :".$site_alias);
	
	//apakah kategori PR atau non PR
	$query_find = "select if(exists(select po_item_id from bcspurchase_2015.lpb_detail where material_id='$material_id'),'1','0') as result";
	//die('query_find :'.$query_find);
	$exec2 = $db->query($query_find);
	$result = $db->row()['result'];
	//if($result!=1){ //WRS non PR
		$sql = "select lpb_id, qty_on_hand
				from bcspurchase_2015.lpb_detail 
				where material_id='$material_id' and user_group ='$user_group' 
				order by lpb_id";
		$exec3 = $db->query($sql);
		
		//die("sql : ".$sql);
	//}
	//else{ //WRS PR
		//$sql2 = "select lpb_id, qty_on_hand
				//from bcspurchase_2015.lpb_detail a, bcspurchase_2015.po_item b, bcspurchase_2015.pr_detail c, bcspurchase_2015.po d, 
				//bcspurchase_2015.project e, bcspurchase_2015.m_description f
				//where e.project_code=d.project and d.po_no = b.po_no and a.po_item_id=b.po_item_id and b.pr_id=c.pr_id 
				//and c.material_id=f.material_id and e.site_alias='$site_alias' and f.material_id='$material_id'
				//order by lpb_id";
		//$exec4 = $db->query($sql2);
		
		////die("sql : ".$sql2);
	//}
	$arr = $db->result();
	
	foreach($arr as $num => $values){
		 $sum += $values[ 'qty_on_hand' ];
	}
	
	//if(($arr[0]['sum_qty'] - $qty) < 0){ //batalkan update jika qty pakai lebih besar dari qty on hand
		//die("Qty pakai lebih besar dari Qty on hand");
	//}
	
	if($sum!=0){ //kalau qty on hand ada
		while($min>0){ //kalau pengurang > 0
			$qty_on_hand = $arr[$x]['qty_on_hand'] - $min;
			if($qty_on_hand<0){
				$qty_on_hand = 0;
				$query_update = "update bcspurchase_2015.lpb_detail set qty_on_hand='$qty_on_hand', last_updated='$last_updated' where lpb_id='".$arr[$x]['lpb_id']."' ";
				//die("query_update : ".$query_update);
				$db->query($query_update);		
				$min = $min - $arr[$x]['qty_on_hand'];
			} 
			else{
				$qty_on_hand = $arr[$x]['qty_on_hand'] - $min;
				$query_update = "update bcspurchase_2015.lpb_detail set qty_on_hand='$qty_on_hand', last_updated='$last_updated' where lpb_id='".$arr[$x]['lpb_id']."' ";
				//die("query_update : ".$query_update);
				$db->query($query_update);		
				$min = 0;
			}
			$x++;
		}
		//die("query_update : ".$query_update);
		//die("qty on hand :".$arr[$x]['qty_on_hand']." qty : ".$qty);
		//die(print_r($arr));
	}
	else{ //kalau tidak ada qty on hand default 0
		$sum = 0;
	}
	
	//die("proses gagal");
	$a = "select po_item_id from bcspurchase_2015.po_item a, bcspurchase_2015.pr_detail b, bcspurchase_2015.m_description c 
			where a.pr_id=b.pr_id and b.material_id=c.material_id and c.material_id='$material_id' limit 1";			
	$result = $db->query($a);	
	if($result!='') $po_item_id = $db->row()['po_item_id'];
	else $po_item_id = "";	
	
	$b = "select description from bcspurchase_2015.eproc_m_description where material_id='$material_id'";
	$db->query($b);
	$desc = $db->row()['description'];
		
	$c = "INSERT INTO bcspurchase_2015.inventory_history (po_item_id,material_id,module_no,qty,qty_on_hand,user_group,created_by,date_created,mode,description) 
				VALUES ('$po_item_id','$material_id','$module_no','$qty','$sum','$user_group','$user','$last_updated','$mode','$desc')";			
	//die("b : ".$b);
	
	
	$db->query($c);		
}	
function update_material_id(){ //mengupdate field lpb_detail yang belum memiliki material_id (cukup dijalankan sekali)
	Xcrud_config::$dbname = 'bcspurchase_2015';
	Xcrud_config::$dbuser = 'root';
	Xcrud_config::$dbpass = 'c1l3g0nbcs321';
	Xcrud_config::$dbhost = '10.2.2.32';
	
	$db = Xcrud_db::get_instance();
	$select = "select lpb_id from lpb_detail";
	$db->query($select);
	$arr = $db->result();
	$count=0;
	
	//die("Arr :".$arr[0]['lpb_id']);
	foreach($arr as $ar){
		foreach($ar as $a){
			$count++;
		}
	}
	
	for($x=0;$x<$count;$x++){
		$query = "select po_item_id from lpb_detail where lpb_id='".$arr[$x]['lpb_id']."'";
		$db->query($query);
		$po_item_id = $db->row()['po_item_id'];	
		//die("po item id : ".$po_item_id);
		if($po_item_id!=''){
			$query2 = "select a.material_id from m_description a, pr_detail b, po_item c where a.material_id=b.material_id and b.pr_id = c.pr_id and c.po_item_id='$po_item_id'";
			$db->query($query2);
			$material_id = $db->row()['material_id'];	
			//die("material id : ".$material_id);
			$query3 = "update lpb_detail set material_id='$material_id' where lpb_id='".$arr[$x]['lpb_id']."'";
			$db->query($query3);
		}
	}
	
	die;
}
function update_price(){ //mengupdate field lpb_detail yang belum memiliki price HANYA UNTUK PR (cukup dijalankan sekali)
	Xcrud_config::$dbname = 'bcspurchase_2015';
	Xcrud_config::$dbuser = 'root';
	Xcrud_config::$dbpass = 'c1l3g0nbcs321';
	Xcrud_config::$dbhost = '10.2.2.32';
	
	$db = Xcrud_db::get_instance();
	$select = "select lpb_id from lpb_detail";
	$db->query($select);
	$arr = $db->result();
	$count=0;
	
	//die("Arr :".$arr[0]['lpb_id']);
	foreach($arr as $ar){
		foreach($ar as $a){
			$count++;
		}
	}
	
	for($x=0;$x<$count;$x++){
		$query = "select po_item_id from lpb_detail where lpb_id='".$arr[$x]['lpb_id']."'";
		$db->query($query);
		$po_item_id = $db->row()['po_item_id'];	
		//die("po item id : ".$po_item_id);
		if($po_item_id!=''){
			$query2 = "select price from po_item  where po_item_id='$po_item_id'";
			$db->query($query2);
			$price = $db->row()['price'];	
			//die("material id : ".$material_id);
			$query3 = "update lpb_detail set price='$price' where lpb_id='".$arr[$x]['lpb_id']."'";
			$db->query($query3);
		}
	}
	
	die;
}
// function update_suplier(){ //mengupdate field suplier (cukup dijalankan sekali)
	// Xcrud_config::$dbname = 'bcspurchase_2015';
	// Xcrud_config::$dbuser = 'root';
	// Xcrud_config::$dbpass = 'c1l3g0nbcs321';
	// Xcrud_config::$dbhost = '10.2.2.32';
	
	// $db = Xcrud_db::get_instance();
	// $select = "select po_no from lpb";
	// $db->query($select);
	// $arr = $db->result();
	// $count=0;
	
	// //die("Arr :".$arr[0]['lpb_id']);
	// foreach($arr as $ar){
		// foreach($ar as $a){
			// $count++;
		// }
	// }
	
	// for($x=0;$x<$count;$x++){
		// $query = "select po_no from lpb where po_no='".$arr[$x]['po_no']."'";
		// $db->query($query);
		// $po_no = $db->row()['po_no'];	
		// //die("po item id : ".$po_item_id);
		// if($po_no!=''){
			// $query2 = "SELECT po.po_no,vendor.vendor
						// FROM
						// po
						// LEFT JOIN vendor ON vendor.vendor_id = po.vendor
						// WHERE po.po_no='$po_no'";
			// $db->query($query2);
			// $vendor = $db->row()['vendor'];	
			// //die("material id : ".$material_id);
			// $query3 = "update lpb set suplier='$vendor' where po_no='".$arr[$x]['po_no']."'";
			// $db->query($query3);
		// }
	// }
	
	// die;
// }				
