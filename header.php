<?php ob_start(); ?>
<?php $this->fb->log(GROUPDESC); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Fleet Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->		
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/morris-0.4.3.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/js/bootstrap-datetimepicker/datertimepicker.css" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/datatables/media/css/jquery.dataTables.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/datatables/extensions/TableTools/css/dataTables.tableTools.css" rel="stylesheet" />
		
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
		function startTime() {
			var today=new Date();
			var h=today.getHours();
			var m=today.getMinutes();
			var s=today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('time').innerHTML = h+":"+m+":"+s;
			var t = setTimeout(function(){startTime()},500);
		}

		function checkTime(i) {
			if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
			return i;
		}
    </script>
  </head>

  <body  onload="startTime()">

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url();?>" class="logo"><b>Fleet Management System<?php echo " ( ".GROUPDESC." )";?></b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
					<li><button type="button" class="logout" data-toggle="dropdown">
						<?php echo USER_NAME;?> 
						<span class="caret"></span></button>
						  <ul class="dropdown-menu">
							<li>
								<a href="<?php echo base_url();?>auth/change_password">Change Password</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>auth/logout">Logout</a>
							</li>
						  </ul>
					</li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
			  <?php //include(dirname(__FILE__).'/menu.php') ?>
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="<?php echo base_url();?>profile"><img src="<?php echo base_url();?>uploads/<?php echo foto;?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo USER_NAME;?></h5>
              	  	
                  <li class=<?php echo ($activeMenu == "dashboard") ? "active" : ""; ?> >
					  <a href="<?php echo base_url();?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <?php if(auth_group =="legal" ){?>
					<li class=<?php echo ($activeMenu == "master") ? "active" : ""; ?>><a  href="<?php echo base_url();?>unit"> <i class="fa fa-desktop"></i>Master Unit</a></li>
					<li class=<?php echo ($activeTab == "expire_unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>home/expire_unit"><i class="fa fa-desktop"></i>Expired Unit Dokumen</a></li>
				 <?php }?>  
				   <?php if(auth_group =="accounting" ){?>
					 <li class="sub-menu">
					<a  class=<?php echo ($activeMenu == "laporan_maintenance") ? "active" : ""; ?> href="javascript:;" >
						<i class="fa fa-book"></i>
						<span>Laporan Maintenance</span> 
					</a> 
						
					<ul class="sub">
					
					<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_wrs_yearly_report" |$activeTab == "ss_summary_report_wrs_by_pr_detail" | $activeTab == "ss_wrs_nonpr_summary_report_detail" | $activeTab == "ss_wrs_nonpr_summary_report" |  $activeTab == "ss_sumary_report_wrs_by_pr" | $activeTab == "ss_summary_report_wrs_by_pr" |$activeTab == "ss_summary_report_wrs_by_pr" | $activeTab == "ss_summary_report_wrs_by_month" ) ? "active" : ""; ?>><span>Warehouse Receipt Slip Report</span></a>
								<ul class="sub">
										<li class=<?php echo ($activeTab == "ss_wrs_nonpr_summary_report") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wrs_nonpr_summary_report">WRS Non PR</a></li> 
										<li class=<?php echo ($activeTab == "ss_wrs_nonpr_summary_report_detail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wrs_nonpr_summary_report_detail">WRS Detail Non PR </a></li> 
									<li class=<?php echo ($activeTab == "ss_summary_report_wrs_by_pr") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_sumary_report_wrs_by_pr">WRS By PR</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_report_wrs_by_pr_detail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_report_wrs_by_pr_detail">WRS Detail By PR </a></li>
									<li class=<?php echo ($activeTab == "ss_wrs_yearly_report") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wrs_yearly_report">WRS Yearly Report </a></li>
								
								</ul>
					</li>	
					
					<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_wo_summary_report_detail" | $activeTab == "ss_wo_summary_report_by_project" | $activeTab == "ss_wo_summary_report_by_product_model" | $activeTab == "ss_wo_summary_report_by_mechanic_sold_hours") ? "active" : ""; ?>><span>Work Order Report</span></a>
								<ul class="sub">
									
									<li class=<?php echo ($activeTab == "ss_wo_summary_report_detail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wo_summary_report_detail">WO By Unit</a></li>						
									<li class=<?php echo ($activeTab == "ss_wo_summary_report_by_project") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wo_summary_report_by_project">WO By Project</a></li>						
									<li class=<?php echo ($activeTab == "ss_wo_summary_report_by_product_model") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wo_summary_report_by_product_model">WO By Product & Model</a></li>						
									<li class=<?php echo ($activeTab == "ss_wo_summary_report_by_mechanic_sold_hours") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wo_summary_report_by_mechanic_sold_hours">WO By Mechanic</a></li>						
									
								</ul>
					</li>		
					
					<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_iis_summary_report_detail" || $activeTab == "ss_iis_summary_report_remarks") ? "active" : ""; ?>><span>Internal Issue Slip</span></a>
								<ul class="sub">									
									<li class=<?php echo ($activeTab == "ss_iis_summary_report_detail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_iis_summary_report_detail">Internal Issue Slip Detail</a></li>
									<li class=<?php echo ($activeTab == "ss_iis_summary_report_remarks") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_iis_summary_report_remarks">IIS By Remarks</a></li>
							
								</ul>
						</li>	
					<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_summary_on_hand_rpt" || $activeTab == "ss_summary_by_unit_rpt" || $activeTab == "ss_summary_by_category_rpt" || $activeTab == "ss_summary_material_by_project" || $activeTab == "ss_summary_material_trans_cilegon" || $activeTab == "ss_summary_material_and_man_power_cost") ? "active" : ""; ?>><span>Summary Inquery</span></a>
								<ul class="sub">									
									<li class=<?php echo ($activeTab == "ss_summary_on_hand_rpt") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_on_hand_rpt">On Hand</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_by_category_rpt") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_by_category_rpt">By Category</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_material_by_project") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_material_by_project">By Project</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_by_unit_rpt") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_by_unit_rpt">By Unit Type</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_material_by_project") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_material_trans_cilegon">Project Trans Cilegon</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_material_and_man_power_cost") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_material_and_man_power_cost">Material & Man Power</a></li>
								</ul>
						</li>	
						<li class=<?php echo ($activeTab == "ss_dnss_monthly_project_by_category") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_dnss_monthly_project_by_category">DN & SS monthly</a></li>
						<li class=<?php echo ($activeTab == "ss_dnss_yearly") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_dnss_yearly">DN & SS Yearly</a></li>						
					<!--li class=<?php //echo ($activeTab == "maintenance_cost") ? "active" : ""; ?>> <a  href="<?php //echo base_url();?>maintenance_cost">  </i>Maintenance Cost</a></li--> 
					
					</ul> 
				  </li>
				  <?php }?>   
				  <?php if(auth_group =="hr" ){?>
					<li class=<?php echo ($activeMenu == "master") ? "active" : ""; ?>><a  href="<?php echo base_url();?>supir"> <i class="fa fa-desktop"></i>Master Personil</a></li>
				  <?php }?>  
				  <?php if(GROUPNAME =="finance"){?>						
						<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ujo_keluar_inq" || $activeTab == "ujo_rekap_inq" || $activeTab == "ujo_rekap_inq_acc" || $activeTab == "ujo_closing_per_hari_acc" || $activeTab == "ujo_kembali_acc" || $activeTab == "lpj" || $activeTab == "rpt_cash_opname") ? "active" : ""; ?> href="javascript:;" >
							  <i class="fa fa-desktop"></i>
							  <span>Inquery UJO</span> </a> 
								<ul class="sub">
								
									<li class=<?php echo ($activeTab == "ujo_keluar_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluar_inq">Kas Keluar</a></li>  
									<li class=<?php echo ($activeTab == "ujo_rekap_inq_acc") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_rekap_inq_acc">Rekap Mutasi Kas</a></li>
									<li class=<?php echo ($activeTab == "ujo_closing_per_hari_acc") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_closing_per_hari_acc">Closing Per Hari</a></li>									
									<li class=<?php echo ($activeTab == "ujo_kembali_acc") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_kembali_acc">UJO Kembali</a></li>										
									<li class=<?php echo ($activeTab == "lpj") ? "active" : ""; ?>><a  href="<?php echo base_url();?>lpj">LPJ Report</a></li>
									<li class=<?php echo ($activeTab == "rpt_cash_opname") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_cash_opname">Cash Opname</a></li>
									<li class="sub-menu">
										<a  class=<?php echo ($activeTab == "ujo_keluar_inq_acc" || $activeTab == "ujo_keluar_inq_acc_summary") ? "active" : ""; ?> href="javascript:;" ><span>LKU</span> </a> 
										<ul class="sub">
											<li class=<?php echo ($activeTab == "ujo_keluar_inq_acc") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluar_inq_acc">LKU Detail</a></li>	
											<li class=<?php echo ($activeTab == "ujo_keluar_inq_acc_summary") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluar_inq_acc_summary">LKU Summary</a></li>	
										</ul>	
									</li>
									
													
								</ul>
						</li>
				  <?php }?>
				  <?php if(GROUPNAME == "damtruck" || GROUPNAME == "transport"){ ?>

                  <li id="test" class="sub-menu">
                      <a class=<?php echo ($activeMenu == "master") ? "active" : ""; ?> href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Master</span>
                      </a>
                      <ul class="sub">
						  <?php if(GROUPNAME == "admin" ){ ?>																													
                          <li class=<?php echo ($activeTab == "users") ? "active" : ""; ?>><a  href="<?php echo base_url();?>auth">Manajemen Pengguna</a></li>
                         
						  <?php } ?>
						  <!--?php //if(access == "admin" ){ ?-->												
                          <li class=<?php echo ($activeTab == "kontrak") ? "active" : ""; ?>><a  href="<?php echo base_url();?>kontrak">Master Tarif</a></li>
						  <li class="sub-menu">
							<a  class=<?php echo ($activeTab == "tipe_unit" || $activeTab == "unit" || $activeTab == "training" || $activeTab == "supir" || $activeTab == "lokasi" || $activeTab == "route" ) ? "active" : ""; ?>><span>Kendaraan</span></a>
							<ul class="sub">											
								<!--li class=<?php echo ($activeTab == "tipe_unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>tipe_unit">Master Tipe Unit</a></li-->
								<li class=<?php echo ($activeTab == "unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>unit">Master Unit</a></li>
								<li class=<?php echo ($activeTab == "training") ? "active" : ""; ?>><a  href="<?php echo base_url();?>training">Master Training</a></li>
								<li class=<?php echo ($activeTab == "supir") ? "active" : ""; ?>><a  href="<?php echo base_url();?>supir">Master Personil</a></li>
								<li class=<?php echo ($activeTab == "lokasi") ? "active" : ""; ?>><a  href="<?php echo base_url();?>lokasi">Master Lokasi</a></li>                          
								<li class=<?php echo ($activeTab == "route") ? "active" : ""; ?>><a  href="<?php echo base_url();?>route">Master Route</a></li>                          
							</ul> 													
						  </li>					                            
						  <!--?php //} ?-->												
                          <li class=<?php echo ($activeTab == "kustomer") ? "active" : ""; ?>><a  href="<?php echo base_url();?>kustomer">Master Kustomer</a></li>
                          <li class=<?php echo ($activeTab == "produk") ? "active" : ""; ?>><a  href="<?php echo base_url();?>produk">Master Produk</a></li>
						  <li class=<?php echo ($activeTab == "owner") ? "active" : ""; ?>><a  href="<?php echo base_url();?>owner">Master Owner</a></li>
						  <li class=<?php echo ($activeTab == "kapal") ? "active" : ""; ?>><a  href="<?php echo base_url();?>kapal">Master Kapal</a></li>
						  <!--li class=<!--?php echo ($activeTab == "rekening") ? "active" : ""; ?>><a  href="<!--?php echo base_url();?>rekening">Kode Rekening</a></li-->
						  <li class=<?php echo ($activeTab == "vendor") ? "active" : ""; ?>><a  href="<?php echo base_url();?>vendor">Vendor</a></li>
						  <li class=<?php echo ($activeTab == "material_list") ? "active" : ""; ?>><a  href="<?php echo base_url();?>material_list">Material</a></li>
						  <li class=<?php echo ($activeTab == "st") ? "active" : ""; ?>><a  href="<?php echo base_url();?>st">Master ST</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu">
				      <a class=<?php echo ($activeMenu == "ujo") ? "active" : ""; ?> href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>UJO</span>
                      </a>
					  <ul class="sub"> 
                        <!--a  class=<!?php echo ($activeTab == "ujo_tujuan" || $activeTab == "ujo_estimasi" || $activeTab == "ujo_masuk" || $activeTab == "ujo_keluaran" || $activeTab == "ujo_surat_tugas") ? "active" : ""; ?> href="javascript:;"></a-->
						<li class=<?php echo ($activeTab == "ujo_tujuan") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_tujuan">Data Tujuan</a></li>	
						<li class=<?php echo ($activeTab == "ujo_estimasi") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_estimasi">Estimasi UJO</a></li>
						<li class=<?php echo ($activeTab == "ujo_masuk") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_masuk">Kas Masuk</a></li>						
						<li class=<?php echo ($activeTab == "ujo_keluaran") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluaran">Kas Keluar</a></li>							
						<li class=<?php echo ($activeTab == "ujo_kembali") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_kembali">Kas Kembali</a></li>	
						<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "rpt_cash_opname" ||$activeTab == "ujo_dn_belum_kembali"||$activeTab == "lpj"||$activeTab == "ujo_estimasi_inq" || $activeTab == "ujo_masuk_inq" || $activeTab == "ujo_keluar_inq" || $activeTab == "ujo_rekap_inq" || $activeTab == "ujo_vs_omset_inq" || $activeTab == "ujo_cek_saldo") ? "active" : ""; ?> href="javascript:;" >
							  <i class="fa fa-desktop"></i>
							  <span>Inquery UJO</span> </a> 
								<ul class="sub">
									<li class=<?php echo ($activeTab == "ujo_dn_belum_kembali") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_dn_belum_kembali">UJO Belum Kembali</a></li>	
									<li class=<?php echo ($activeTab == "ujo_estimasi_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_estimasi_inq">Estimasi UJO</a></li>	
                                    <li class=<?php echo ($activeTab == "ujo_cek_saldo") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_cek_saldo">Cek Saldo</a></li>									
								    <li class=<?php echo ($activeTab == "ujo_masuk_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_masuk_inq">Kas Masuk</a></li>
									<li class=<?php echo ($activeTab == "ujo_keluar_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluar_inq">Kas Keluar</a></li>                                    									
									<li class=<?php echo ($activeTab == "ujo_rekap_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_rekap_inq">Rekap Mutasi Kas</a></li>	
									<li class=<?php echo ($activeTab == "ujo_vs_omset_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_vs_omset_inq">UJO vs Omset</a></li>										
									
									<li class="sub-menu">
										<a  class=<?php echo ($activeTab == "ujo_keluar_inq_acc" || $activeTab == "ujo_keluar_inq_acc_summary") ? "active" : ""; ?> href="javascript:;" ><span>LKU</span> </a> 
										<ul class="sub">
											<li class=<?php echo ($activeTab == "ujo_keluar_inq_acc") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluar_inq_acc">LKU Detail</a></li>	
											<li class=<?php echo ($activeTab == "ujo_keluar_inq_acc_summary") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluar_inq_acc_summary">LKU Summary</a></li>	
										</ul>	
									</li>
									<li class=<?php echo ($activeTab == "lpj") ? "active" : ""; ?>><a  href="<?php echo base_url();?>lpj">LPJ Report</a></li>									
									<li class=<?php echo ($activeTab == "rpt_cash_opname") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_cash_opname">Cash Opname</a></li>	
													
								</ul>
						</li>
						<li class="sub-menu"> 
							<a  class=<?php echo ($activeTab == "ujo_closing_kas" || $activeTab == "ujo_closing_per_hari" || $activeTab == "ujo_rekap_inq" ) ? "active" : ""; ?> href="javascript:;" ><span>Proses Closing</span> </a> 
							    <ul class="sub">
									<li class=<?php echo ($activeTab == "ujo_closing_per_hari") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_closing_per_hari">Closing Per Hari</a></li>
									<li class=<?php echo ($activeTab == "ujo_rekap_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_rekap_inq">Rekap Mutasi Kas</a></li>										
								</ul>	
						</li>
					  </ul>					
			     </li>	


                  <li class="sub-menu">
                      <a class=<?php echo ($activeMenu == "transportation") ? "active" : ""; ?> href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Transportation</span>
                      </a>
                      <ul class="sub">
						  <li class="sub-menu">
								<a  class=<?php echo ($activeTab == "dns" || $activeTab == "invoices" || $activeTab == "ujo_realisasi_dn" ) ? "active" : ""; ?>><span>Kontrak</span></a>
								<ul class="sub">											
									<li class=<?php echo ($activeTab == "dns") ? "active" : ""; ?>><a  href="<?php echo base_url();?>dns">Delivery Notes</a></li>										
									<li class=<?php echo ($activeTab == "invoices") ? "active" : ""; ?>><a  href="<?php echo base_url();?>invoices">Invoices</a></li>									
								</ul> 													
						  </li>	
						  
						  <li class="sub-menu">
								<a  class=<?php echo ($activeTab == "ujo_realisasi_dn" || $activeTab == "ujo_realisasi_dn_invoice" ) ? "active" : ""; ?>><span>Realisasi DN</span></a>
								<ul class="sub">											
									<li class=<?php echo ($activeTab == "ujo_realisasi_dn") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_realisasi_dn">Versi UJO</a></li>										
									<li class=<?php echo ($activeTab == "ujo_realisasi_dn_invoice") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_realisasi_dn_invoice">Versi INVOICE</a></li>										
								</ul> 													
						  </li>							  
						  
						  <li class="sub-menu">
								<a  class=<?php echo ($activeTab == "retail" || $activeTab == "retail_invoice" || $activeTab == "retail_invoice_inq") ? "active" : ""; ?>><span>Tanpa Kontrak</span></a>
								<ul class="sub">
									<li class=<?php echo ($activeTab == "retail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>retail">Data Pekerjaan</a></li>
									<li class=<?php echo ($activeTab == "retail_invoice") ? "active" : ""; ?>><a  href="<?php echo base_url();?>retail_invoice">Proses Invoice</a></li>
									<li class=<?php echo ($activeTab == "retail_invoice_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>retail_invoice_inq">Cek Jatuh Tempo</a></li>
								</ul> 													
						  </li>					                            
                            <!-- <li class="sub-menu">
								<a  class=<?php //echo ($activeTab == "outstanding" || $activeTab == "utilitas" || $activeTab == "pendapatan" || $activeTab == "invoice_inquiry") ? "active" : ""; ?>><span>Inquiry</span></a>
								<ul class="sub">
									<li class=<?php //echo ($activeTab == "outstanding") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>inquiry/outstanding" >Outstanding</a></li>
									<li class=<?php //echo ($activeTab == "utilitas") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>inquiry/utilitas">Utilitas</a></li>  
									<li class=<?php //echo ($activeTab == "pendapatan") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>inquiry/pendapatan">Pendapatan</a></li>  
									<li class=<?php //echo ($activeTab == "invoice_inquiry") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>inquiry/invoice">Invoice</a></li>  
								</ul> 													
						  </li> --> 
                      </ul>
                  </li>
				   
				   <li class="sub-menu">
                      <a class=<?php echo ($activeMenu == "laporan") ? "active" : ""; ?> href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Laporan</span>
                      </a>
						<ul class="sub">
							<li class="sub-menu">
								<a  class=<?php echo ($activeTab == "inv_open_status_inq" ||$activeTab == "rpt_utilities"|| $activeTab == "trans_inquery_rekap_dn_invoice"|| $activeTab == "rpt_komisi"||$activeTab == "expire_supir"||$activeTab == "expire_unit"||$activeTab == "berita_acara_ks_delta"||$activeTab == "rpt_utilities"||$activeTab == "invoice_report" ||$activeTab == "rpt_rekap_invoice"||$activeTab == "rpt_rekap_dn_omset"||$activeTab == "laporan_transport" ||$activeTab == "rpt_rekap_dn") ? "active" : ""; ?> href="javascript:;" ><span>Laporan Transport</span> </a> 
								<ul class="sub">
									<!--li class=<?php //echo ($activeTab == "status_proses_invoice") ? "active" : ""; ?>><a  href="<?php // base_url();?>status_proses_invoice" >Status Proses Invoice</a></li-->
									<li class=<?php echo ($activeTab == "inv_open_status_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>inv_open_status_inq">Status Open DN</a></li>												
									<li class=<?php echo ($activeTab == "rpt_rekap_dn") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_rekap_dn">DN Report</a></li>												
									<li class=<?php echo ($activeTab == "rpt_rekap_dn_omset") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_rekap_dn_omset">Omzet Report</a></li>				
									<!--<li class=<?php echo ($activeTab == "rpt_rekap_invoice") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_rekap_invoice">Rekap Invoice (XLS)</a></li>-->
									<li class=<?php echo ($activeTab == "trans_inquery_rekap_dn_invoice") ? "active" : ""; ?>><a  href="<?php echo base_url();?>trans_inquery_rekap_dn_invoice">Inquery By Date</a></li>

									<li class="sub-menu">	
                                      <a  class=<?php echo ($activeTab == "jspr_comm_invoice_cabot" ||$activeTab == "jspr_comm_invoice_impor" ||$activeTab == "jspr_comm_invoice_posco" ||$activeTab == "jspr_comm_invoice_delta"|| $activeTab == "jspr_comm_invoice_air_liquide" || $activeTab == "jspr_comm_invoice_latinusa" || $activeTab == "jspr_comm_invoice_bahari" ||$activeTab == "jspr_comm_invoice_lbk" ||$activeTab == "jspr_comm_invoice_kengine" || $activeTab == "jspr_comm_invoice_khi" || $activeTab == "jspr_summary_invoice_customer") ? "active" : ""; ?> href="javascript:;" ><span>Commercial Invoice</span> </a> 									
									  <ul class="sub">									    
									    <li class=<?php echo ($activeTab == "jspr_comm_invoice_cabot") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_cabot">Cabot</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_air_liquide") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_air_liquide">Air Liquide</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_latinusa") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_latinusa">Latinusa</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_bahari") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_bahari">Bahari</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_lbk") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_lbk">LBK</a></li>	
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_kengine") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_kengine">K.Engineering</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_khi") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_khi">KHI</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_delta") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_delta">KS-Delta</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_posco") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_posco">KS-Posco</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_impor") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_impor">KS-Impor</a></li>										
									  </ul>
									</li>									
									<li class="sub-menu">	
                                      <a  class=<?php echo ($activeTab == "jspr_rekap_dn_posco" || $activeTab == "jspr_rekap_dn_impor" || $activeTab == "berita_acara_ks_delta") ? "active" : ""; ?> href="javascript:;" ><span>Rekap DN (KS)</span> </a> 									
									  <ul class="sub">									    
									    <li class=<?php echo ($activeTab == "jspr_rekap_dn_posco") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_rekap_dn_posco">KS-POSCO</a></li>
										<li class=<?php echo ($activeTab == "jspr_rekap_dn_impor") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_rekap_dn_impor">KS-IMPOR</a></li>
										<li class=<?php echo ($activeTab == "berita_acara_ks_delta") ? "active" : ""; ?>><a  href="<?php echo base_url();?>reports/berita_acara_ks_delta">Berita Acara KS Delta</a></li>
									  </ul>
									</li>										
									
									<!--li class=<!--?php// echo ($activeTab == "berita_acara_ks_delta") ? "active" : ""; ?>><a  href="<!--?php// echo base_url();?>reports/berita_acara_ks_delta"></a></li-->
									<li class=<?php echo ($activeTab == "expire_unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>home/expire_unit">Expired Unit Dokumen</a></li>
									<li class=<?php echo ($activeTab == "expire_supir") ? "active" : ""; ?>><a  href="<?php echo base_url();?>home/expire_supir">Expired Supir Dokumen</a></li>
								</ul> 
							</li>
						<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "laporan_ujo_dn_per_unit"||$activeTab == "rpt_komisi" || $activeTab == "jspr_summary_invoice_customer" || $activeTab == "rpt_utilities") ? "active" : ""; ?> href="javascript:;" ><span>Laporan Bulanan</span> </a> 
							<ul class="sub">
									<!--li class=<?php //echo ($activeTab == "status_proses_invoice") ? "active" : ""; ?>><a  href="<?php // base_url();?>status_proses_invoice" >Status Proses Invoice</a></li-->
									<li class=<?php echo ($activeTab == "laporan_ujo_dn_per_unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>laporan_ujo_dn_per_unit">Per Unit</a></li>	
									<li class=<?php echo ($activeTab == "rpt_komisi") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_komisi">Komisi</a></li>
									<li class=<?php echo ($activeTab == "jspr_summary_invoice_customer") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_summary_invoice_customer">Summary Invoice</a></li>
									<li class=<?php echo ($activeTab == "rpt_utilities") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_utilities">Utilities</a></li>												

							</ul> 
						</li>							
						<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "lpj"||$activeTab == "laporan_ujo" || $activeTab == "invoice_report") ? "active" : ""; ?> href="javascript:;" ><span>Laporan Ujo</span> </a> 
							<ul class="sub">
									<!--li class=<?php //echo ($activeTab == "status_proses_invoice") ? "active" : ""; ?>><a  href="<?php // base_url();?>status_proses_invoice" >Status Proses Invoice</a></li-->
									<li class=<?php echo ($activeTab == "lpj") ? "active" : ""; ?>><a  href="<?php echo base_url();?>lpj">LPJ Report</a></li>	
							</ul> 
						</li>
                      </ul>
                  </li>
				  <?php }?>	
				  
				  <?php if(GROUPNAME == "Maintenance_Cilegon" || GROUPNAME == "Maintenance_Narogong"){ ?>
				  <li class="sub-menu">
						<a  class=<?php echo ($activeTab == "vendor" ||$activeTab == "material_list" ||$activeTab == "tipe_unit" || $activeTab == "unit" || $activeTab == "training" || $activeTab == "supir" || $activeTab == "lokasi" || $activeTab == "route" ||$activeTab == "st" ) ? "active" : ""; ?>><i class="fa fa-cogs"></i><span> Master Data</span></a>
						<ul class="sub">											
							<!--li class=<?php echo ($activeTab == "tipe_unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>tipe_unit">Master Tipe Unit</a></li-->
							<li class=<?php echo ($activeTab == "unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>unit">Master Unit</a></li>
							<li class=<?php echo ($activeTab == "supir") ? "active" : ""; ?>><a  href="<?php echo base_url();?>supir">Master Personil</a></li>
							<li class=<?php echo ($activeTab == "vendor") ? "active" : ""; ?>><a  href="<?php echo base_url();?>vendor">Vendor</a></li>
							<li class=<?php echo ($activeTab == "material_list") ? "active" : ""; ?>><a  href="<?php echo base_url();?>material_list">Material</a></li>
							<li class=<?php echo ($activeTab == "st") ? "active" : ""; ?>><a  href="<?php echo base_url();?>st">Master ST</a></li>                       
						</ul> 													
				  </li>
				  
				  <li class="sub-menu">
                      <a class=<?php echo ($activeMenu == "maintenance") ? "active" : ""; ?> href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Maintenance</span>
                      </a>
                      <ul class="sub">
						<li class=<?php echo ($activeTab == "inventory") ? "active" : ""; ?>><a  href="<?php echo base_url();?>inventory_on_hand">Inventory</a></li>
						<li class=<?php echo ($activeTab == "trans_purchase") ? "active" : ""; ?>><a  href="<?php echo base_url();?>trans_purchase">Purchase Requisition</a></li>
						<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "grn" || $activeTab == "grn_non_pr" ) ? "active" : ""; ?>><span>Warehouse Receipt Slip</span></a>
							<ul class="sub">
								<li class=<?php echo ($activeTab == "grn") ? "active" : ""; ?>><a  href="<?php echo base_url();?>grn">WRS(PR)</a></li>
								<li class=<?php echo ($activeTab == "grn_non_pr") ? "active" : ""; ?>><a  href="<?php echo base_url();?>grn_non_pr">WRS(Non PR)</a></li>
							</ul>
						</li>
						<li class=<?php echo ($activeTab == "trans_internal_transfer_slip") ? "active" : ""; ?>><a  href="<?php echo base_url();?>trans_internal_transfer_slip">Internal Transfer Slip</a></li>
						<li class=<?php echo ($activeTab == "trans_internal_issue_slip") ? "active" : ""; ?>><a  href="<?php echo base_url();?>trans_internal_issue_slip">Internal Issue Slip</a></li>
						<!--<li class=<?php //echo ($activeTab == "trans_material_return") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>trans_material_return">Material Return</a></li>-->
						<li class=<?php echo ($activeTab == "deliverynote") ? "active" : ""; ?>><a  href="<?php echo base_url();?>maintenance_dn">Delivery Note</a></li>
						<li class=<?php echo ($activeTab == "ss") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss">Suply Slip</a></li>
						<li class=<?php echo ($activeTab == "wo") ? "active" : ""; ?>><a  href="<?php echo base_url();?>wo">Work Order</a></li>
						<li class=<?php echo ($activeTab == "stock_opname") ? "active" : ""; ?>><a  href="<?php echo base_url();?>stock_opname">Stock Opname</a></li>
						<!--<li class=<?php //echo ($activeTab == "wo") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>">Invoice</a></li>-->
				                                                      
                      </ul>
                  </li>
                  <li class="sub-menu">
					<a  class=<?php echo ($activeMenu == "laporan_maintenance") ? "active" : ""; ?> href="javascript:;" >
						<i class="fa fa-book"></i>
						<span>Laporan Maintenance</span> 
					</a> 
						
					<ul class="sub">
					
					<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_wrs_yearly_report" |$activeTab == "ss_summary_report_wrs_by_pr_detail" | $activeTab == "ss_wrs_nonpr_summary_report_detail" | $activeTab == "ss_wrs_nonpr_summary_report" |  $activeTab == "ss_sumary_report_wrs_by_pr" | $activeTab == "ss_summary_report_wrs_by_pr" |$activeTab == "ss_summary_report_wrs_by_pr" | $activeTab == "ss_summary_report_wrs_by_month" ) ? "active" : ""; ?>><span>Warehouse Receipt Slip Report</span></a>
								<ul class="sub">
										<li class=<?php echo ($activeTab == "ss_wrs_nonpr_summary_report") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wrs_nonpr_summary_report">WRS Non PR</a></li> 
										<li class=<?php echo ($activeTab == "ss_wrs_nonpr_summary_report_detail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wrs_nonpr_summary_report_detail">WRS Detail Non PR </a></li> 
									<li class=<?php echo ($activeTab == "ss_summary_report_wrs_by_pr") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_sumary_report_wrs_by_pr">WRS By PR</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_report_wrs_by_pr_detail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_report_wrs_by_pr_detail">WRS Detail By PR </a></li>
									<li class=<?php echo ($activeTab == "ss_wrs_yearly_report") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wrs_yearly_report">WRS Yearly Report </a></li>
								
								</ul>
					</li>	
					
					<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_wo_summary_report_detail" | $activeTab == "ss_wo_summary_report_by_project" | $activeTab == "ss_wo_summary_report_by_product_model" | $activeTab == "ss_wo_summary_report_by_mechanic_sold_hours") ? "active" : ""; ?>><span>Work Order Report</span></a>
								<ul class="sub">
									
									<li class=<?php echo ($activeTab == "ss_wo_summary_report_detail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wo_summary_report_detail">WO By Unit</a></li>						
									<li class=<?php echo ($activeTab == "ss_wo_summary_report_by_project") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wo_summary_report_by_project">WO By Project</a></li>						
									<li class=<?php echo ($activeTab == "ss_wo_summary_report_by_product_model") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wo_summary_report_by_product_model">WO By Product & Model</a></li>						
									<li class=<?php echo ($activeTab == "ss_wo_summary_report_by_mechanic_sold_hours") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_wo_summary_report_by_mechanic_sold_hours">WO By Mechanic</a></li>						
									
								</ul>
					</li>		
					
					<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_iis_summary_report_detail" || $activeTab == "ss_iis_summary_report_remarks") ? "active" : ""; ?>><span>Internal Issue Slip</span></a>
								<ul class="sub">									
									<li class=<?php echo ($activeTab == "ss_iis_summary_report_detail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_iis_summary_report_detail">Internal Issue Slip Detail</a></li>
									<li class=<?php echo ($activeTab == "ss_iis_summary_report_remarks") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_iis_summary_report_remarks">IIS By Remarks</a></li>
							
								</ul>
						</li>	
					
					<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_dnss_monthly_project_by_category" || $activeTab == "ss_dnss_monthly_vehicle") ? "active" : ""; ?>><span>Maintenance Cost Monthly</span></a>
								<ul class="sub">									
										<li class=<?php echo ($activeTab == "ss_dnss_monthly_project_by_category") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_dnss_monthly_project_by_category">By Project</a></li>
										<li class=<?php echo ($activeTab == "ss_dnss_monthly_vehicle") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_dnss_monthly_vehicle">By Vehicle</a></li>
									</ul>
						</li>							
					<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_dnss_yearly_report_by_project1" || $activeTab == "ss_dnss_by_unit_yearly" || $activeTab == "ss_dnss_yearly_report_by_project1" || $activeTab == "ss_summary_material_trans_cilegon" || $activeTab == "ss_dnss_yearly") ? "active" : ""; ?>><span>Maintenance Cost Yearly</span></a>
								<ul class="sub">									
										<li class=<?php echo ($activeTab == "ss_dnss_yearly") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_dnss_yearly">Yearly by Category</a></li>		
										<li class=<?php echo ($activeTab == "ss_dnss_yearly_report_by_project1") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_dnss_yearly_report_by_project1">Yearly by Project</a></li>		
										<li class=<?php echo ($activeTab == "ss_dnss_by_unit_yearly") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_dnss_by_unit_yearly">Yearly by Unit Average</a></li>		
									</ul>
						</li>
										
					<!--li class=<?php //echo ($activeTab == "maintenance_cost") ? "active" : ""; ?>> <a  href="<?php //echo base_url();?>maintenance_cost">  </i>Maintenance Cost</a></li--> 
					
					</ul> 
				  </li>
				  <?php if(auth_group == "view_wo" ){?>
					<li class=<?php echo ($activeTab == "dashboard") ? "active" : ""; ?>> <a  href="<?php echo base_url();?>wo_user">     <i class="fa fa-cogs"></i>Work Order</a></li> 
				  <?php }?> 
				 	 	  
				  <?php }?>
				  
				  <?php if(GROUPNAME == "admin"){ ?>				
				  
				  <li id="test" class="sub-menu">
                      <a class=<?php echo ($activeMenu == "master") ? "active" : ""; ?> href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Master</span>
                      </a>
                      <ul class="sub">																													
                          <li class=<?php echo ($activeTab == "users") ? "active" : ""; ?>><a  href="<?php echo base_url();?>auth">Manajemen Pengguna</a></li>											
                          <li class=<?php echo ($activeTab == "kontrak") ? "active" : ""; ?>><a  href="<?php echo base_url();?>kontrak">Master Tarif</a></li>
						  <li class="sub-menu">
							<a  class=<?php echo ($activeTab == "tipe_unit" || $activeTab == "unit" || $activeTab == "training" || $activeTab == "supir" || $activeTab == "lokasi" || $activeTab == "route" ) ? "active" : ""; ?>><span>Kendaraan</span></a>
							<ul class="sub">											
								<!--li class=<?php echo ($activeTab == "tipe_unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>tipe_unit">Master Tipe Unit</a></li-->
								<li class=<?php echo ($activeTab == "unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>unit">Master Unit</a></li>
								<li class=<?php echo ($activeTab == "training") ? "active" : ""; ?>><a  href="<?php echo base_url();?>training">Master Training</a></li>
								<li class=<?php echo ($activeTab == "supir") ? "active" : ""; ?>><a  href="<?php echo base_url();?>supir">Master Personil</a></li>
								<li class=<?php echo ($activeTab == "lokasi") ? "active" : ""; ?>><a  href="<?php echo base_url();?>lokasi">Master Lokasi</a></li>                          
								<li class=<?php echo ($activeTab == "route") ? "active" : ""; ?>><a  href="<?php echo base_url();?>route">Master Route</a></li>                          
							</ul> 													
						  </li>															
                          <li class=<?php echo ($activeTab == "kustomer") ? "active" : ""; ?>><a  href="<?php echo base_url();?>kustomer">Master Kustomer</a></li>
                          <li class=<?php echo ($activeTab == "produk") ? "active" : ""; ?>><a  href="<?php echo base_url();?>produk">Master Produk</a></li>
						  <li class=<?php echo ($activeTab == "owner") ? "active" : ""; ?>><a  href="<?php echo base_url();?>owner">Master Owner</a></li>
						  <li class=<?php echo ($activeTab == "kapal") ? "active" : ""; ?>><a  href="<?php echo base_url();?>kapal">Master Kapal</a></li>
						  <!--li class=<!--?php echo ($activeTab == "rekening") ? "active" : ""; ?>><a  href="<!--?php echo base_url();?>rekening">Kode Rekening</a></li-->
						  <li class=<?php echo ($activeTab == "vendor") ? "active" : ""; ?>><a  href="<?php echo base_url();?>vendor">Vendor</a></li>
						  <li class=<?php echo ($activeTab == "material_list") ? "active" : ""; ?>><a  href="<?php echo base_url();?>material_list">Material</a></li>
						  <li class=<?php echo ($activeTab == "st") ? "active" : ""; ?>><a  href="<?php echo base_url();?>st">Master ST</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu">
				      <a class=<?php echo ($activeMenu == "ujo") ? "active" : ""; ?> href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>UJO</span>
                      </a>
					  <ul class="sub"> 
                        <!--a  class=<!?php echo ($activeTab == "ujo_tujuan" || $activeTab == "ujo_estimasi" || $activeTab == "ujo_masuk" || $activeTab == "ujo_keluaran" || $activeTab == "ujo_surat_tugas") ? "active" : ""; ?> href="javascript:;"></a-->
						<li class=<?php echo ($activeTab == "ujo_tujuan") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_tujuan">Data Tujuan</a></li>	
						<li class=<?php echo ($activeTab == "ujo_estimasi") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_estimasi">Estimasi UJO</a></li>
						<li class=<?php echo ($activeTab == "ujo_masuk") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_masuk">Kas Masuk</a></li>						
						<li class=<?php echo ($activeTab == "ujo_keluaran") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluaran">Kas Keluar</a></li>							
						<li class=<?php echo ($activeTab == "ujo_kembali") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_kembali">Kas Kembali</a></li>							
						<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "rpt_cash_opname" || $activeTab == "ujo_dn_belum_kembali"||$activeTab == "rpt_cash_opname" ||$activeTab == "ujo_estimasi_inq" || $activeTab == "ujo_masuk_inq" || $activeTab == "ujo_keluar_inq" || $activeTab == "ujo_rekap_inq" || $activeTab == "ujo_vs_omset_inq" || $activeTab == "ujo_cek_saldo") ? "active" : ""; ?> href="javascript:;" ><span>Inquery UJO</span> </a> 
								<ul class="sub">
								    <li class=<?php echo ($activeTab == "ujo_dn_belum_kembali") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_dn_belum_kembali">UJO Belum Kembali</a></li>
									<li class=<?php echo ($activeTab == "ujo_estimasi_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_estimasi_inq">Estimasi UJO</a></li>	
                                    <li class=<?php echo ($activeTab == "ujo_cek_saldo") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_cek_saldo">Cek Saldo</a></li>									
								    <li class=<?php echo ($activeTab == "ujo_masuk_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_masuk_inq">Kas Masuk</a></li>
									<li class=<?php echo ($activeTab == "ujo_keluar_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluar_inq">Kas Keluar</a></li>                                    									
									<li class=<?php echo ($activeTab == "ujo_rekap_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_rekap_inq">Rekap Mutasi Kas</a></li>	
									<li class=<?php echo ($activeTab == "ujo_vs_omset_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_vs_omset_inq">UJO vs Omset</a></li>																												
									<li class="sub-menu">
										<a  class=<?php echo ($activeTab == "ujo_keluar_inq_acc" || $activeTab == "ujo_keluar_inq_acc_summary") ? "active" : ""; ?> href="javascript:;" ><span>LKU</span> </a> 
										<ul class="sub">
											<li class=<?php echo ($activeTab == "ujo_keluar_inq_acc") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluar_inq_acc">LKU Detail</a></li>	
											<li class=<?php echo ($activeTab == "ujo_keluar_inq_acc_summary") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_keluar_inq_acc_summary">LKU Summary</a></li>	
										</ul>	
									</li>
									<li class=<?php echo ($activeTab == "lpj1") ? "active" : ""; ?>><a  href="<?php echo base_url();?>lpj">LPJ Report</a></li>	
									<li class=<?php echo ($activeTab == "rpt_cash_opname") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_cash_opname">Cash Opname</a></li>	
													
								</ul>
						</li>
						<li class="sub-menu"> 
							<a  class=<?php echo ($activeTab == "ujo_closing_per_hari" || $activeTab == "ujo_rekap_inq" ) ? "active" : ""; ?> href="javascript:;" ><span>Proses Closing</span> </a> 
							    <ul class="sub">
									<li class=<?php echo ($activeTab == "ujo_closing_per_hari") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_closing_per_hari">Closing Per Hari</a></li>
									<li class=<?php echo ($activeTab == "ujo_rekap_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_rekap_inq">Rekap Mutasi Kas</a></li>	
									<!--<li class=<?php //echo ($activeTab == "ujo_closing_kas") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>ujo_closing_kas">Closing Per Bulan</a></li>-->									
								</ul>	
						</li>
					  </ul>					
			     </li>	


                  <li class="sub-menu">
                      <a class=<?php echo ($activeMenu == "transportation") ? "active" : ""; ?> href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Transportation</span>
                      </a>
                      <ul class="sub">
						  <li class="sub-menu">
								<a  class=<?php echo ($activeTab == "dns" || $activeTab == "invoices" ) ? "active" : ""; ?>><span>Kontrak</span></a>
								<ul class="sub">											
									<li class=<?php echo ($activeTab == "dns") ? "active" : ""; ?>><a  href="<?php echo base_url();?>dns">Delivery Notes</a></li>										
									<li class=<?php echo ($activeTab == "invoices") ? "active" : ""; ?>><a  href="<?php echo base_url();?>invoices">Invoices</a></li>
								</ul> 													
						  </li>		
						  <li class="sub-menu">
								<a  class=<?php echo ($activeTab == "ujo_realisasi_dn" || $activeTab == "ujo_realisasi_dn_invoice"  ) ? "active" : ""; ?>><span>Realisasi DN</span></a>
								<ul class="sub">											
									<li class=<?php echo ($activeTab == "ujo_realisasi_dn") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_realisasi_dn">Versi UJO</a></li>										
									<li class=<?php echo ($activeTab == "ujo_realisasi_dn_invoice") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_realisasi_dn_invoice">Versi INVOICE</a></li>										
								</ul> 													
						  </li>								  
						  <li class="sub-menu">
								<a  class=<?php echo ($activeTab == "retail" || $activeTab == "retail_invoice" || $activeTab == "retail_invoice_inq") ? "active" : ""; ?>><span>Tanpa Kontrak</span></a>
								<ul class="sub">
									<li class=<?php echo ($activeTab == "retail") ? "active" : ""; ?>><a  href="<?php echo base_url();?>retail">Data Pekerjaan</a></li>
									<li class=<?php echo ($activeTab == "retail_invoice") ? "active" : ""; ?>><a  href="<?php echo base_url();?>retail_invoice">Proses Invoice</a></li>
									<li class=<?php echo ($activeTab == "retail_invoice_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>retail_invoice_inq">Cek Jatuh Tempo</a></li>
								</ul> 													
						  </li>					                            
                          <!--li class="sub-menu">
								<a  class=<?php// echo ($activeTab == "outstanding" || $activeTab == "utilitas" || $activeTab == "pendapatan" || $activeTab == "invoice_inquiry") ? "active" : ""; ?>><span>Inquiry</span></a>
								<ul class="sub">
									<li class=<?php// echo ($activeTab == "outstanding") ? "active" : ""; ?>><a  href="<?php// echo base_url();?>inquiry/outstanding" >Outstanding</a></li>
									<li class=<?php// echo ($activeTab == "utilitas") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>inquiry/utilitas">Utilitas</a></li>  
									<li class=<?php //echo ($activeTab == "pendapatan") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>inquiry/pendapatan">Pendapatan</a></li>  
									<li class=<?php //echo ($activeTab == "invoice_inquiry") ? "active" : ""; ?>><a  href="<?php //echo base_url();?>inquiry/invoice">Invoice</a></li>  
								</ul> 													
						  </li-->
                      </ul>
                  </li>
				   <li class="sub-menu">
						<a class=<?php echo ($activeMenu == "maintenance") ? "active" : ""; ?> href="javascript:;" >
							<i class="fa fa-cogs"></i>
							<span>Maintenance</span>
						</a>
						<ul class="sub">
							<li class=<?php echo ($activeTab == "inventory") ? "active" : ""; ?>><a  href="<?php echo base_url();?>inventory_on_hand">Inventory</a></li>
							<li class=<?php echo ($activeTab == "trans_purchase") ? "active" : ""; ?>><a  href="<?php echo base_url();?>trans_purchase">Purchase Requisition</a></li>
							<li class="sub-menu">
								<a  class=<?php echo ($activeTab == "grn" || $activeTab == "grn_non_pr" ) ? "active" : ""; ?>><span>Warehouse Receipt Slip</span></a>
								<ul class="sub">
									<li class=<?php echo ($activeTab == "grn") ? "active" : ""; ?>><a  href="<?php echo base_url();?>grn">WRS(PR)</a></li>
									<li class=<?php echo ($activeTab == "grn_non_pr") ? "active" : ""; ?>><a  href="<?php echo base_url();?>grn_non_pr">WRS(Non PR)</a></li>
								</ul>
							</li>
							<li class=<?php echo ($activeTab == "trans_internal_transfer_slip") ? "active" : ""; ?>><a  href="<?php echo base_url();?>trans_internal_transfer_slip">Internal Transfer Slip</a></li>
							<li class=<?php echo ($activeTab == "trans_internal_issue_slip") ? "active" : ""; ?>><a  href="<?php echo base_url();?>trans_internal_issue_slip">Internal Issue Slip</a></li>
							<li class=<?php echo ($activeTab == "trans_material_return") ? "active" : ""; ?>><a  href="<?php echo base_url();?>trans_material_return">Material Return</a></li>
							<li class=<?php echo ($activeTab == "deliverynote") ? "active" : ""; ?>><a  href="<?php echo base_url();?>maintenance_dn">Delivery Note</a></li>
							<li class=<?php echo ($activeTab == "ss") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss">Suply Slip</a></li>
							<li class=<?php echo ($activeTab == "wo") ? "active" : ""; ?>><a  href="<?php echo base_url();?>wo">Work Order</a></li>
							<li class=<?php //echo ($activeTab == "wo") ? "active" : ""; ?>><a  href="<?php echo base_url();?>">Invoice</a></li>																		  
						</ul>
                   </li>
				   <li class="sub-menu">
                      <a class=<?php echo ($activeMenu == "laporan") ? "active" : ""; ?> href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Laporan</span>
                      </a>
						<ul class="sub">
							<li class="sub-menu">
								<a  class=<?php echo ($activeTab == "rpt_utilities" ||$activeTab == "inv_open_status_inq" ||$activeTab == "trans_inquery_rekap_dn_invoice"||$activeTab == "rpt_komisi"||$activeTab == "expire_supir"||$activeTab == "expire_unit"||$activeTab == "berita_acara_ks_delta"||$activeTab == "rpt_utilities"||$activeTab == "invoice_report" ||$activeTab == "rpt_rekap_invoice"||$activeTab == "rpt_rekap_dn_omset"||$activeTab == "laporan_transport" ||$activeTab == "rpt_rekap_dn") ? "active" : ""; ?> href="javascript:;" ><span>Laporan Transport</span> </a> 
								<ul class="sub">
								    <li class=<?php echo ($activeTab == "inv_open_status_inq") ? "active" : ""; ?>><a  href="<?php echo base_url();?>inv_open_status_inq">Status Open DN</a></li>
									<!--li class=<?php //echo ($activeTab == "status_proses_invoice") ? "active" : ""; ?>><a  href="<?php // base_url();?>status_proses_invoice" >Status Proses Invoice</a></li-->
									<li class=<?php echo ($activeTab == "rpt_rekap_dn") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_rekap_dn">DN Report</a></li>												
									<li class=<?php echo ($activeTab == "rpt_rekap_dn_omset") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_rekap_dn_omset">Omzet Report</a></li>				
									<!--<li class=<?php echo ($activeTab == "rpt_rekap_invoice") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_rekap_invoice">Rekap Invoice (XLS)</a></li>-->
									<li class=<?php echo ($activeTab == "trans_inquery_rekap_dn_invoice") ? "active" : ""; ?>><a  href="<?php echo base_url();?>trans_inquery_rekap_dn_invoice">Inquery By Date</a></li>
									<li class="sub-menu">	
                                      <a  class=<?php echo ($activeTab == "jspr_comm_invoice_cabot" ||$activeTab == "jspr_comm_invoice_impor"||$activeTab == "jspr_comm_invoice_posco" || $activeTab == "jspr_comm_invoice_air_liquide"||$activeTab == "jspr_comm_invoice_delta" || $activeTab == "jspr_comm_invoice_latinusa" || $activeTab == "jspr_comm_invoice_bahari" || $activeTab == "jspr_comm_invoice_lbk" || $activeTab == "jspr_comm_invoice_kengine" || $activeTab == "jspr_comm_invoice_khi" || $activeTab == "jspr_summary_invoice_customer") ? "active" : ""; ?> href="javascript:;" ><span>Commercial Invoice</span> </a> 									
									  <ul class="sub">									    
									    <li class=<?php echo ($activeTab == "jspr_comm_invoice_cabot") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_cabot">Cabot</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_air_liquide") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_air_liquide">Air Liquide</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_latinusa") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_latinusa">Latinusa</a></li>	
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_bahari") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_bahari">Bahari</a></li>	
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_lbk") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_lbk">LBK</a></li>											
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_kengine") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_kengine">K.Engineering</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_khi") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_khi">KHI</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_delta") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_delta">KS-Delta</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_posco") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_posco">KS-Posco</a></li>
										<li class=<?php echo ($activeTab == "jspr_comm_invoice_impor") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_comm_invoice_impor">KS-Impor</a></li>
										
									  </ul>
									</li>	

									<li class="sub-menu">	
                                      <a  class=<?php echo ($activeTab == "jspr_rekap_dn_posco" || $activeTab == "jspr_rekap_dn_impor" || $activeTab == "berita_acara_ks_delta") ? "active" : ""; ?> href="javascript:;" ><span>Rekap DN (KS)</span> </a> 									
									  <ul class="sub">									    
									    <li class=<?php echo ($activeTab == "jspr_rekap_dn_posco") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_rekap_dn_posco">KS-POSCO</a></li>
										<li class=<?php echo ($activeTab == "jspr_rekap_dn_impor") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_rekap_dn_impor">KS-IMPOR</a></li>
										<li class=<?php echo ($activeTab == "berita_acara_ks_delta") ? "active" : ""; ?>><a  href="<?php echo base_url();?>reports/berita_acara_ks_delta">Berita Acara KS Delta</a></li>
									  </ul>
									</li>										
																		
									<li class=<?php echo ($activeTab == "expire_unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>home/expire_unit">Expired Unit Dokumen</a></li>
									<li class=<?php echo ($activeTab == "expire_supir") ? "active" : ""; ?>><a  href="<?php echo base_url();?>home/expire_supir">Expired Supir Dokumen</a></li>																												
						
								</ul>
								<li class="sub-menu">
									<a  class=<?php echo ($activeTab == "laporan_ujo_dn_per_unit"||$activeTab == "jspr_summary_invoice_customer" ||$activeTab == "rpt_utilities") ? "active" : ""; ?> href="javascript:;" ><span>Laporan Bulanan</span> </a> 
									<ul class="sub">										
										<li class=<?php echo ($activeTab == "laporan_ujo_dn_per_unit") ? "active" : ""; ?>><a  href="<?php echo base_url();?>laporan_ujo_dn_per_unit">Per Unit</a></li>	
										<li class=<?php echo ($activeTab == "jspr_summary_invoice_customer") ? "active" : ""; ?>><a  href="<?php echo base_url();?>jspr_summary_invoice_customer">Summary Invoice</a></li>
										<li class=<?php echo ($activeTab == "rpt_komisi") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_komisi">Komisi</a></li>
										<li class=<?php echo ($activeTab == "rpt_utilities") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_utilities">Utilities</a></li>		
									</ul> 
								</li>
									
							</li>
						<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "lpj"||$activeTab == "laporan_ujo" || $activeTab == "invoice_report") ? "active" : ""; ?> href="javascript:;" ><span>Laporan Ujo</span> </a> 
							<ul class="sub">
									<!--li class=<?php //echo ($activeTab == "status_proses_invoice") ? "active" : ""; ?>><a  href="<?php // base_url();?>status_proses_invoice" >Status Proses Invoice</a></li-->
									<li class=<?php echo ($activeTab == "lpj") ? "active" : ""; ?>><a  href="<?php echo base_url();?>lpj">LPJ Report</a></li>	
							</ul> 
						</li>
						<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "rpt_rekap_dn" | $activeTab == "ss_dn_report_detail_by_project_category_transport") ? "active" : ""; ?> href="javascript:;" ><span>Laporan Maintenance</span> </a> 
							<ul class="sub">
								<li class=<?php echo ($activeTab == "rpt_rekap_dn") ? "active" : ""; ?>><a  href="<?php echo base_url();?>rpt_rekap_dn">DN Report</a></li>												
								<li class=<?php echo ($activeTab == "ss_dn_report_detail_by_project_category_transport") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_dn_report_detail_by_project_category_transport">DN Rpt Maintenance</a></li>												
								<li class="sub-menu">
							<a  class=<?php echo ($activeTab == "ss_summary_on_hand_rpt" || $activeTab == "ss_summary_by_unit_rpt" || $activeTab == "ss_summary_by_category_rpt" || $activeTab == "ss_summary_material_by_project" || $activeTab == "ss_summary_material_trans_cilegon") ? "active" : ""; ?>><span>Summary Inquery</span></a>
								<ul class="sub">									
									<li class=<?php echo ($activeTab == "ss_summary_on_hand_rpt") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_on_hand_rpt">On Hand</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_by_category_rpt") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_by_category_rpt">By Category</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_material_by_project") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_material_by_project">By Project</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_by_unit_rpt") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_by_unit_rpt">By Unit Type</a></li>
									<li class=<?php echo ($activeTab == "ss_summary_material_by_project") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ss_summary_material_trans_cilegon">Project Trans Cilegon</a></li>
								</ul>
						</li>	
						
							</ul> 
						</li>
						
					
						
												
                      </ul>
                  </li>	
                  <li class="sub-menu">
						<a class=<?php echo ($activeMenu == "chart") ? "active" : ""; ?> href="javascript:;" >
							<i class="fa fa-cogs"></i>
							<span>Chart</span>
						</a>
						<ul class="sub">
							<li class=<?php echo ($activeTab == "ujo_vs_omset_chart") ? "active" : ""; ?>><a  href="<?php echo base_url();?>ujo_vs_omset_chart">UJO vs Omset</a></li>
						</ul>
                   </li>				                           
					
				  <li class=<?php echo ($activeTab == "dashboard") ? "active" : ""; ?>> <a  href="<?php echo base_url();?>wo_user">     <i class="fa fa-cogs"></i>Work Order</a></li> 
				  <?php }?> 
              </ul>			  
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
