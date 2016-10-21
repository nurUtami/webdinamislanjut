
<?php
	include "Database.php";
	class Products{
		
		private $tablename;
		public $db;
		
		public function __construct(){
			$this->tablename= "products";
			$this->db = Database::getInstance()->getConnection();
		}
		public function lisProduk(){			 					
			$result = $this->db->query("SELECT * FROM ".$this->tablename);			
			return $result;
		}	
	}
	
	$produk = new Products();	
	$data='<h3>Data Products</h3>';	
	$result=$produk->lisProduk();
	echo '<table border = 2 width = 1000>
	<tr>
		<th>No</th>
		<th>ProductName</th>
		<th>SupplierID</th>
		<th>CategoryID</th>
		<th>QuantityPerUnit</th>
		<th>UnitPrice</th>
		<th>UnitsOnOrder</th>
		<th>ReorderLevel</th>
		<th>Discontinued</th>
	</tr>';
	$no = 1;
	while($row = $result->fetch_object()){

		$data .= '<tr><td>'.$no++.'</td>';
		$data .= '<td>'.$row->ProductName.'</td>';
		$data .= '<td>'.$row->SupplierID.'</td>';
		$data .= '<td>'.$row->CategoryID.'</td>';
		$data .= '<td>'.$row->QuantityPerUnit.'</td>';
		$data .= '<td>'.$row->UnitPrice.'</td>';
		$data .= '<td>'.$row->UnitsOnOrder.'</td>';
		$data .= '<td>'.$row->ReorderLevel.'</td>';
		$data .= '<td>'.$row->Discontinued.'</td>';


	}
	echo $data;
	echo '</tr></table>';
?>