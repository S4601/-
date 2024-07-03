<?php
class PerPage {
	public $perpage;
	
	function __construct() {
		$this->perpage = 3;
	}
	
	function getAllPageLinks($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
         

		if($pages>1) {            
			if($_GET["page"] == 1) 
				$output = $output . '<li class="page-item disabled">
						<a class="page-link">
							<i class="bi bi-caret-left-fill"></i>
						</a>				
					</li>
					<li class="page-item disabled">
						<a class="page-link">
							<i class="bi bi-caret-left"></i>
						</a>
					</li>';
			else	
				$output = $output . '<li class="page-item">						
						<a class="page-link pagination  btn rounded-0" onclick="getresult(\'' . $href . (1) . '\'); ScrollToTop();">
							<i class="bi bi-caret-left-fill"></i>
						</a>
					</li>
					<li class="page-item">						
						<a class="page-link pagination  btn rounded-0" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\'); ScrollToTop();">
							<i class="bi bi-caret-left"></i>
						</a>
					</li>';
			
			
			if(($_GET["page"]-3)>0) {
				if($_GET["page"] == 1)
					$output = $output . '<li class="page-item">						
							<a class="page-link pagination btn rounded-0">1</a>
						</li>';
				else				
					$output = $output . '<li class="page-item" onclick="getresult(\'' . $href . '1\'); ScrollToTop();">						
							<a class="page-link pagination btn rounded-0">1</a>
						</li>';
			}
			if(($_GET["page"]-3)>1) {
					$output = $output . '<li class="page-item">						
							<a class="page-link pagination">...</a>
						</li>';
			}
			
			for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{
				if($i<1) continue;
				if($i>$pages) break;
				if($_GET["page"] == $i)
					$output = $output . '<li class="page-item active">						
							<a class="page-link paginationActive btn rounded-0">'.$i.'</a>
						</li>';
				else				
					$output = $output . '<li class="page-item">						
							<a class="page-link pagination btn rounded-0" onclick="getresult(\'' . $href . $i . '\'); ScrollToTop();">'.$i.'</a>
						</li>';
					/*
					echo "<br>";
					echo 'page:'.$_GET["page"].'';
					echo "i$i";
					*/
			}
			
			if(($pages-($_GET["page"]+2))>1) {
				$output = $output . '<li class="page-item">						
						<a class="page-link pagination">...</a>
					</li>';
			}
			if(($pages-($_GET["page"]+2))>0) {
				if($_GET["page"] == $pages)
					$output = $output . '<li class="page-item">						
							<a class="page-link pagination btn rounded-0">'.$pages.'</a>
						</li>';
				else				
					$output = $output . '<li class="page-item">						
							<a class="page-link pagination btn rounded-0" onclick="getresult(\'' . $href .  ($pages) .'\'); ScrollToTop();">'.$pages.'</a>
						</li>';
			}
			
			if($_GET["page"] < $pages)
				$output = $output . '<li class="page-item">						
						<a class="page-link pagination btn rounded-0" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\'); ScrollToTop();"><i class="bi bi-caret-right"></i></a>
					</li>
					<li class="page-item">						
						<a class="page-link pagination btn rounded-0" onclick="getresult(\'' . $href . ($pages) . '\'); ScrollToTop();"><i class="bi bi-caret-right-fill"></i></a>
					</li>';
			else				
				$output = $output . '<li class="page-item disabled">
						<a class="page-link">
							<i class="bi bi-caret-right"></i>
						</a>
					</li>
					<li class="page-item disabled">
						<a class="page-link">
						<i class="bi bi-caret-right-fill"></i>
						</a>
					</li>';
			
			
		}

		/*
		if($pages>1) {            
			if($_GET["page"] == 1) 
				$output = $output . '<span class="link first disabled">&#8810;</span><span class="link disabled">&#60;</span>';
			else	
				$output = $output . '<a class="link first" onclick="getresult(\'' . $href . (1) . '\'); ScrollToTop();" >&#8810;</a><a class="link" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\'); ScrollToTop();" >&#60;</a>';
			
			
			if(($_GET["page"]-3)>0) {
				if($_GET["page"] == 1)
					$output = $output . '<span id=1 class="link current">1</span>';
				else				
					$output = $output . '<a class="link" onclick="getresult(\'' . $href . '1\'); ScrollToTop();" >1</a>';
			}
			if(($_GET["page"]-3)>1) {
					$output = $output . '<span class="dot">...</span>';
			}
			
			for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{
				if($i<1) continue;
				if($i>$pages) break;
				if($_GET["page"] == $i)
					$output = $output . '<span id='.$i.' class="link current">'.$i.'</span>';
				else				
					$output = $output . '<a class="link" onclick="getresult(\'' . $href . $i . '\'); ScrollToTop();" >'.$i.'</a>';
					/*
					echo "<br>";
					echo 'page:'.$_GET["page"].'';
					echo "i$i";
					*//*
			}
			
			if(($pages-($_GET["page"]+2))>1) {
				$output = $output . '<span class="dot">...</span>';
			}
			if(($pages-($_GET["page"]+2))>0) {
				if($_GET["page"] == $pages)
					$output = $output . '<span id=' . ($pages) .' class="link current">' . ($pages) .'</span>';
				else				
					$output = $output . '<a class="link" onclick="getresult(\'' . $href .  ($pages) .'\'); ScrollToTop();" >' . ($pages) .'</a>';
			}
			
			if($_GET["page"] < $pages)
				$output = $output . '<a  class="link" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\'); ScrollToTop();" >></a><a  class="link" onclick="getresult(\'' . $href . ($pages) . '\'); ScrollToTop();" >&#8811;</a>';
			else				
				$output = $output . '<span class="link disabled">></span><span class="link disabled">&#8811;</span>';
			
			
		}*/
		return $output;
	}	
}
?>